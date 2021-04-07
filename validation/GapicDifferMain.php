<?php
/*
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
declare(strict_types=1);

namespace Google\Generator\Validation;

use Google\Generator\Tests\Tools\JsonComparer;
use Google\Generator\Tests\Tools\PhpClassComparer;
use Google\Generator\Tests\Tools\PhpConfigComparer;

require __DIR__ . '/../vendor/autoload.php';
error_reporting(E_ALL);

/**
 * A self-contained semantic differ for PHP or JSON files.
 * Usage:
 *   php GapicDifferMain.php /path/to/originalMonoLibrary /path/to/newMicrogenLibrary
 */

if (!compareLibraries($argv)) {
    print("FAIL - Differences found\n\n");
    exit(1);
}
print("\nPASS\n\n");

/**
 * Compares the files in the two directories. Assumes the LHS one is the original
 * (i.e. generated by the monolith) and the RHS one is new (i.e. produced by the
 * microgenerator).
 */
function compareLibraries($argv): bool
{
    if (count($argv) < 3) {
        print("Insufficient arguments\nUsage example: php PhpDifferMain.php /path/to/originalMonoLibrary /path/to/newMicrogenLibrary\n\n");
        exit(1);
    }

    $monoDir = $argv[1];
    $microDir = $argv[2];
    if (!is_dir($monoDir) || !is_dir($microDir)) {
        print("Either the mono path $monoDir or micro path $microDir is not a directory\n");
        exit(1);
    }

    $srcFilepaths = [];
    getDirContents("src", "$microDir/src", $srcFilepaths);

    $testFilepaths = [];
    getDirContents("tests/Unit", "$microDir/tests/Unit", $testFilepaths);
    $microFilesRelativePaths = array_merge($srcFilepaths, $testFilepaths);

    $diffFindings = [];
    $clientsSame = true;
    $gapicMetadataFileName = "gapic_metadata.json";
    foreach ($microFilesRelativePaths as $file) {
        // Ignore the gapic_metadata.json file.
        if (substr($file, -strlen($gapicMetadataFileName)) == $gapicMetadataFileName) {
            continue;
        }

        $monoFile = realpath($monoDir . DIRECTORY_SEPARATOR . $file);
        $microFile = realpath($microDir . DIRECTORY_SEPARATOR . $file);
        print("Comparing $file\n");

        if (!$monoFile) {
            $diffFindings[] = "Mono does not have $file";
            continue;
        }
        if (!$microFile) {
            $diffFindings[] = "Micro does not have $file";
            continue;
        }

        // Read files.
        $configFileEnding = "_config.php";
        $isConfig = substr($file, -strlen($configFileEnding)) === $configFileEnding;
        $monoFileContents = $isConfig ? require($monoFile) : file_get_contents($monoFile);
        $microFileContents = $isConfig ? require($microFile) : file_get_contents($microFile);

        $fileFindings = [];
        $isJson = substr($file, -5) === '.json';
        if ($isJson) {
            $clientsSame &= JsonComparer::compareMonoMicroClientConfig($monoFileContents, $microFileContents);
        } elseif ($isConfig) {
            recurKsort($monoFileContents);
            recurKsort($microFileContents);
            $clientsSame &= PhpConfigComparer::compare($monoFileContents, $microFileContents);
        } else {
            $monoPhpFileContents = processMonoPhpFile($monoFileContents, $file);
            $microPhpFileContents = processMicroPhpFile($microFileContents, $file);
            $clientsSame &= PhpClassComparer::compare($monoPhpFileContents, $microPhpFileContents);
        }
    }

    if (!empty($diffFindings) || !$clientsSame) {
        print(sizeof($diffFindings) . " differences found: ");
        print(implode("\n", $diffFindings) . "\n");
        return false;
    }
    return true;
}

function getDirContents(string $prefixPath, string $dir, &$results): void
{
    $subpaths = scandir($dir);
    foreach ($subpaths as $subpath) {
        $actualPath = realpath($dir . DIRECTORY_SEPARATOR . $subpath);
        if (!is_dir($actualPath)) {
            $results[] = "$prefixPath/$subpath";
        } elseif ($subpath !== "." && $subpath !== "..") {
            getDirContents("$prefixPath/$subpath", $actualPath, $results);
        }
    }
}

function processMonoPhpFile(string $monoFileContents, string $relativeFile): string
{
    $gapicClientFileEnding = "GapicClient.php";
    if (substr($relativeFile, -strlen($gapicClientFileEnding)) !== $gapicClientFileEnding) {
        return $monoFileContents;
    }

    // Remove any line that assigns a value to $optionalArgs['headers'],
    // or contains RequestParamsHeaderDescriptor.
    $newFileContents = $monoFileContents;
    $replaceTerms = [
      "optionalArgs\['headers'\] =",
      "new RequestParamsHeaderDescriptor"
    ];
    foreach ($replaceTerms as $term) {
        $newFileContents = preg_replace("/.*$term(.|\n)*?;\n/", '', $newFileContents);
    }

    return $newFileContents;
}

function processMicroPhpFile(string $microFileContents, string $relativeFile): string
{
    $gapicClientFileEnding = "GapicClient.php";
    if (substr($relativeFile, -strlen($gapicClientFileEnding)) !== $gapicClientFileEnding) {
        return $microFileContents;
    }

    // Flip arguments in `if (self::$someField == null) {`.
    $unwantedWords = "if \((self::.*) == null\) \{";
    $replaceMatch = '/' . $unwantedWords . '.*/';
    $newFileContents = preg_replace($replaceMatch, 'if (null == $1) {', $microFileContents);

    // Remove any line that assigns a value to $optionalArgs['headers'],
    // contains requestParamHeaders, or contains RequestParamsHeaderDescriptor.
    $replaceTerms = [
        "requestParamHeaders.*=",
        "optionalArgs\['headers'\] =",
        "new RequestParamsHeaderDescriptor"
    ];
    foreach ($replaceTerms as $term) {
        $newFileContents = preg_replace("/.*$term(.|\n)*?;\n/", '', $newFileContents);
    }

    return $newFileContents;
}

function recurKsort(array &$ra)
{
    foreach ($ra as &$val) {
        if (is_array($val)) {
            recurKsort($val);
        }
    }
    ksort($ra);
}
