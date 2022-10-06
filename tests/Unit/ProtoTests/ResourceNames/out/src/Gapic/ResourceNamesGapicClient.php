<?php
/*
 * Copyright 2022 Google LLC
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

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/tests/Unit/ProtoTests/ResourceNames/resource-names.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Testing\ResourceNames\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Testing\ResourceNames\FileLevelChildTypeRefRequest;
use Testing\ResourceNames\FileLevelTypeRefRequest;
use Testing\ResourceNames\MultiPatternRequest;
use Testing\ResourceNames\PlaceholderResponse;
use Testing\ResourceNames\SinglePatternRequest;
use Testing\ResourceNames\WildcardChildReferenceRequest;
use Testing\ResourceNames\WildcardMultiPatternRequest;
use Testing\ResourceNames\WildcardPatternRequest;
use Testing\ResourceNames\WildcardReferenceRequest;

/**
 * Service Description:
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $resourceNamesClient = new ResourceNamesClient();
 * try {
 *     $formattedReqFolderName = $resourceNamesClient->folderName('[FOLDER_ID]');
 *     $formattedReqFolderMultiName = $resourceNamesClient->folder1Name('[FOLDER1_ID]');
 *     $formattedReqFolderMultiNameHistory = $resourceNamesClient->folder1Name('[FOLDER1_ID]');
 *     $formattedReqOrderTest1 = $resourceNamesClient->order2Name('[ORDER2_ID]');
 *     $formattedReqOrderTest2 = $resourceNamesClient->order2Name('[ORDER2_ID]');
 *     $response = $resourceNamesClient->fileLevelChildTypeRefMethod($formattedReqFolderName, $formattedReqFolderMultiName, $formattedReqFolderMultiNameHistory, $formattedReqOrderTest1, $formattedReqOrderTest2);
 * } finally {
 *     $resourceNamesClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 */
class ResourceNamesGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'testing.resourcenames.ResourceNames';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'resourcenames.example.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [];

    private static $fileResDefNameTemplate;

    private static $folderNameTemplate;

    private static $folder1NameTemplate;

    private static $folder2NameTemplate;

    private static $item1IdNameTemplate;

    private static $item1IdItem2IdNameTemplate;

    private static $item2IdNameTemplate;

    private static $item3IdNameTemplate;

    private static $item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate;

    private static $multiPatternNameTemplate;

    private static $order1NameTemplate;

    private static $order2NameTemplate;

    private static $order3NameTemplate;

    private static $singlePatternNameTemplate;

    private static $wildcardMultiPatternNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/resource_names_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/resource_names_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/resource_names_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/resource_names_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getFileResDefNameTemplate()
    {
        if (self::$fileResDefNameTemplate == null) {
            self::$fileResDefNameTemplate = new PathTemplate('items1/{item1_id}');
        }

        return self::$fileResDefNameTemplate;
    }

    private static function getFolderNameTemplate()
    {
        if (self::$folderNameTemplate == null) {
            self::$folderNameTemplate = new PathTemplate('folders/{folder_id}');
        }

        return self::$folderNameTemplate;
    }

    private static function getFolder1NameTemplate()
    {
        if (self::$folder1NameTemplate == null) {
            self::$folder1NameTemplate = new PathTemplate('folders1/{folder1_id}');
        }

        return self::$folder1NameTemplate;
    }

    private static function getFolder2NameTemplate()
    {
        if (self::$folder2NameTemplate == null) {
            self::$folder2NameTemplate = new PathTemplate('folders2/{folder2_id}');
        }

        return self::$folder2NameTemplate;
    }

    private static function getItem1IdNameTemplate()
    {
        if (self::$item1IdNameTemplate == null) {
            self::$item1IdNameTemplate = new PathTemplate('items1/{item1_id}');
        }

        return self::$item1IdNameTemplate;
    }

    private static function getItem1IdItem2IdNameTemplate()
    {
        if (self::$item1IdItem2IdNameTemplate == null) {
            self::$item1IdItem2IdNameTemplate = new PathTemplate('items1/{item1_id}/items2/{item2_id}');
        }

        return self::$item1IdItem2IdNameTemplate;
    }

    private static function getItem2IdNameTemplate()
    {
        if (self::$item2IdNameTemplate == null) {
            self::$item2IdNameTemplate = new PathTemplate('items2/{item2_id}');
        }

        return self::$item2IdNameTemplate;
    }

    private static function getItem3IdNameTemplate()
    {
        if (self::$item3IdNameTemplate == null) {
            self::$item3IdNameTemplate = new PathTemplate('items3/{item3_id}');
        }

        return self::$item3IdNameTemplate;
    }

    private static function getItem4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate()
    {
        if (self::$item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate == null) {
            self::$item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate = new PathTemplate('items4/{item4_id}/items5/{item5a_id}_{item5b_id}-{item5c_id}.{item5d_id}~{item5e_id}/items6/{item6_id}');
        }

        return self::$item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate;
    }

    private static function getMultiPatternNameTemplate()
    {
        if (self::$multiPatternNameTemplate == null) {
            self::$multiPatternNameTemplate = new PathTemplate('items1/{item1_id}/items2/{item2_id}');
        }

        return self::$multiPatternNameTemplate;
    }

    private static function getOrder1NameTemplate()
    {
        if (self::$order1NameTemplate == null) {
            self::$order1NameTemplate = new PathTemplate('orders1/{order1_id}');
        }

        return self::$order1NameTemplate;
    }

    private static function getOrder2NameTemplate()
    {
        if (self::$order2NameTemplate == null) {
            self::$order2NameTemplate = new PathTemplate('orders2/{order2_id}');
        }

        return self::$order2NameTemplate;
    }

    private static function getOrder3NameTemplate()
    {
        if (self::$order3NameTemplate == null) {
            self::$order3NameTemplate = new PathTemplate('orders3/{order3_id}');
        }

        return self::$order3NameTemplate;
    }

    private static function getSinglePatternNameTemplate()
    {
        if (self::$singlePatternNameTemplate == null) {
            self::$singlePatternNameTemplate = new PathTemplate('items1/{item1_id}/items2/{item2_id}');
        }

        return self::$singlePatternNameTemplate;
    }

    private static function getWildcardMultiPatternNameTemplate()
    {
        if (self::$wildcardMultiPatternNameTemplate == null) {
            self::$wildcardMultiPatternNameTemplate = new PathTemplate('items1/{item1_id}');
        }

        return self::$wildcardMultiPatternNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'fileResDef' => self::getFileResDefNameTemplate(),
                'folder' => self::getFolderNameTemplate(),
                'folder1' => self::getFolder1NameTemplate(),
                'folder2' => self::getFolder2NameTemplate(),
                'item1Id' => self::getItem1IdNameTemplate(),
                'item1IdItem2Id' => self::getItem1IdItem2IdNameTemplate(),
                'item2Id' => self::getItem2IdNameTemplate(),
                'item3Id' => self::getItem3IdNameTemplate(),
                'item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6Id' => self::getItem4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate(),
                'multiPattern' => self::getMultiPatternNameTemplate(),
                'order1' => self::getOrder1NameTemplate(),
                'order2' => self::getOrder2NameTemplate(),
                'order3' => self::getOrder3NameTemplate(),
                'singlePattern' => self::getSinglePatternNameTemplate(),
                'wildcardMultiPattern' => self::getWildcardMultiPatternNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a file_res_def
     * resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted file_res_def resource.
     */
    public static function fileResDefName($item1Id)
    {
        return self::getFileResDefNameTemplate()->render([
            'item1_id' => $item1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder
     * resource.
     *
     * @param string $folderId
     *
     * @return string The formatted folder resource.
     */
    public static function folderName($folderId)
    {
        return self::getFolderNameTemplate()->render([
            'folder_id' => $folderId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder1
     * resource.
     *
     * @param string $folder1Id
     *
     * @return string The formatted folder1 resource.
     */
    public static function folder1Name($folder1Id)
    {
        return self::getFolder1NameTemplate()->render([
            'folder1_id' => $folder1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder2
     * resource.
     *
     * @param string $folder2Id
     *
     * @return string The formatted folder2 resource.
     */
    public static function folder2Name($folder2Id)
    {
        return self::getFolder2NameTemplate()->render([
            'folder2_id' => $folder2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item1_id
     * resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted item1_id resource.
     */
    public static function item1IdName($item1Id)
    {
        return self::getItem1IdNameTemplate()->render([
            'item1_id' => $item1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * item1_id_item2_id resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted item1_id_item2_id resource.
     */
    public static function item1IdItem2IdName($item1Id, $item2Id)
    {
        return self::getItem1IdItem2IdNameTemplate()->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item2_id
     * resource.
     *
     * @param string $item2Id
     *
     * @return string The formatted item2_id resource.
     */
    public static function item2IdName($item2Id)
    {
        return self::getItem2IdNameTemplate()->render([
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a item3_id
     * resource.
     *
     * @param string $item3Id
     *
     * @return string The formatted item3_id resource.
     */
    public static function item3IdName($item3Id)
    {
        return self::getItem3IdNameTemplate()->render([
            'item3_id' => $item3Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * item4_id_item5a_id_item5b_id_item5c_id_item5d_id_item5e_id_item6_id resource.
     *
     * @param string $item4Id
     * @param string $item5aId
     * @param string $item5bId
     * @param string $item5cId
     * @param string $item5dId
     * @param string $item5eId
     * @param string $item6Id
     *
     * @return string The formatted item4_id_item5a_id_item5b_id_item5c_id_item5d_id_item5e_id_item6_id resource.
     */
    public static function item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdName($item4Id, $item5aId, $item5bId, $item5cId, $item5dId, $item5eId, $item6Id)
    {
        return self::getItem4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6IdNameTemplate()->render([
            'item4_id' => $item4Id,
            'item5a_id' => $item5aId,
            'item5b_id' => $item5bId,
            'item5c_id' => $item5cId,
            'item5d_id' => $item5dId,
            'item5e_id' => $item5eId,
            'item6_id' => $item6Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * multi_pattern resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted multi_pattern resource.
     */
    public static function multiPatternName($item1Id, $item2Id)
    {
        return self::getMultiPatternNameTemplate()->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order1
     * resource.
     *
     * @param string $order1Id
     *
     * @return string The formatted order1 resource.
     */
    public static function order1Name($order1Id)
    {
        return self::getOrder1NameTemplate()->render([
            'order1_id' => $order1Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order2
     * resource.
     *
     * @param string $order2Id
     *
     * @return string The formatted order2 resource.
     */
    public static function order2Name($order2Id)
    {
        return self::getOrder2NameTemplate()->render([
            'order2_id' => $order2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a order3
     * resource.
     *
     * @param string $order3Id
     *
     * @return string The formatted order3 resource.
     */
    public static function order3Name($order3Id)
    {
        return self::getOrder3NameTemplate()->render([
            'order3_id' => $order3Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * single_pattern resource.
     *
     * @param string $item1Id
     * @param string $item2Id
     *
     * @return string The formatted single_pattern resource.
     */
    public static function singlePatternName($item1Id, $item2Id)
    {
        return self::getSinglePatternNameTemplate()->render([
            'item1_id' => $item1Id,
            'item2_id' => $item2Id,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * wildcard_multi_pattern resource.
     *
     * @param string $item1Id
     *
     * @return string The formatted wildcard_multi_pattern resource.
     */
    public static function wildcardMultiPatternName($item1Id)
    {
        return self::getWildcardMultiPatternNameTemplate()->render([
            'item1_id' => $item1Id,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - fileResDef: items1/{item1_id}
     * - folder: folders/{folder_id}
     * - folder1: folders1/{folder1_id}
     * - folder2: folders2/{folder2_id}
     * - item1Id: items1/{item1_id}
     * - item1IdItem2Id: items1/{item1_id}/items2/{item2_id}
     * - item2Id: items2/{item2_id}
     * - item3Id: items3/{item3_id}
     * - item4IdItem5aIdItem5bIdItem5cIdItem5dIdItem5eIdItem6Id: items4/{item4_id}/items5/{item5a_id}_{item5b_id}-{item5c_id}.{item5d_id}~{item5e_id}/items6/{item6_id}
     * - multiPattern: items1/{item1_id}/items2/{item2_id}
     * - order1: orders1/{order1_id}
     * - order2: orders2/{order2_id}
     * - order3: orders3/{order3_id}
     * - singlePattern: items1/{item1_id}/items2/{item2_id}
     * - wildcardMultiPattern: items1/{item1_id}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();
        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }

        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'resourcenames.example.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $formattedReqFolderName = $resourceNamesClient->folderName('[FOLDER_ID]');
     *     $formattedReqFolderMultiName = $resourceNamesClient->folder1Name('[FOLDER1_ID]');
     *     $formattedReqFolderMultiNameHistory = $resourceNamesClient->folder1Name('[FOLDER1_ID]');
     *     $formattedReqOrderTest1 = $resourceNamesClient->order2Name('[ORDER2_ID]');
     *     $formattedReqOrderTest2 = $resourceNamesClient->order2Name('[ORDER2_ID]');
     *     $response = $resourceNamesClient->fileLevelChildTypeRefMethod($formattedReqFolderName, $formattedReqFolderMultiName, $formattedReqFolderMultiNameHistory, $formattedReqOrderTest1, $formattedReqOrderTest2);
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param string $reqFolderName
     * @param string $reqFolderMultiName
     * @param string $reqFolderMultiNameHistory
     * @param string $reqOrderTest1
     * @param string $reqOrderTest2
     * @param array  $optionalArgs              {
     *     Optional.
     *
     *     @type string $folderName
     *     @type string $folderMultiName
     *     @type string $folderMultiWildcardName
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function fileLevelChildTypeRefMethod($reqFolderName, $reqFolderMultiName, $reqFolderMultiNameHistory, $reqOrderTest1, $reqOrderTest2, array $optionalArgs = [])
    {
        $request = new FileLevelChildTypeRefRequest();
        $request->setReqFolderName($reqFolderName);
        $request->setReqFolderMultiName($reqFolderMultiName);
        $request->setReqFolderMultiNameHistory($reqFolderMultiNameHistory);
        $request->setReqOrderTest1($reqOrderTest1);
        $request->setReqOrderTest2($reqOrderTest2);
        if (isset($optionalArgs['folderName'])) {
            $request->setFolderName($optionalArgs['folderName']);
        }

        if (isset($optionalArgs['folderMultiName'])) {
            $request->setFolderMultiName($optionalArgs['folderMultiName']);
        }

        if (isset($optionalArgs['folderMultiWildcardName'])) {
            $request->setFolderMultiWildcardName($optionalArgs['folderMultiWildcardName']);
        }

        return $this->startCall('FileLevelChildTypeRefMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->fileLevelTypeRefMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $fileName
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function fileLevelTypeRefMethod(array $optionalArgs = [])
    {
        $request = new FileLevelTypeRefRequest();
        if (isset($optionalArgs['fileName'])) {
            $request->setFileName($optionalArgs['fileName']);
        }

        return $this->startCall('FileLevelTypeRefMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->multiPatternMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function multiPatternMethod(array $optionalArgs = [])
    {
        $request = new MultiPatternRequest();
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        return $this->startCall('MultiPatternMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->singlePatternMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $realName
     *           Test non-standard field name.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function singlePatternMethod(array $optionalArgs = [])
    {
        $request = new SinglePatternRequest();
        if (isset($optionalArgs['realName'])) {
            $request->setRealName($optionalArgs['realName']);
        }

        return $this->startCall('SinglePatternMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->wildcardChildReferenceMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $parent
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function wildcardChildReferenceMethod(array $optionalArgs = [])
    {
        $request = new WildcardChildReferenceRequest();
        if (isset($optionalArgs['parent'])) {
            $request->setParent($optionalArgs['parent']);
        }

        return $this->startCall('WildcardChildReferenceMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->wildcardMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function wildcardMethod(array $optionalArgs = [])
    {
        $request = new WildcardPatternRequest();
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        return $this->startCall('WildcardMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->wildcardMultiMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function wildcardMultiMethod(array $optionalArgs = [])
    {
        $request = new WildcardMultiPatternRequest();
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        return $this->startCall('WildcardMultiMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $resourceNamesClient = new ResourceNamesClient();
     * try {
     *     $response = $resourceNamesClient->wildcardReferenceMethod();
     * } finally {
     *     $resourceNamesClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Testing\ResourceNames\PlaceholderResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function wildcardReferenceMethod(array $optionalArgs = [])
    {
        $request = new WildcardReferenceRequest();
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        return $this->startCall('WildcardReferenceMethod', PlaceholderResponse::class, $optionalArgs, $request)->wait();
    }
}
