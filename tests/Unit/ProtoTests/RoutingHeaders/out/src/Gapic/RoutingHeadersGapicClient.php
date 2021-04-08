<?php
/*
 * Copyright 2020 Google LLC
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
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/tests/Unit/ProtoTests/RoutingHeaders/routing-headers.proto
 * and updates to that file get reflected here through a refresh process.
 */

declare(strict_types=1);

namespace Testing\RoutingHeaders\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;

use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Testing\RoutingHeaders\NestedRequest;
use Testing\RoutingHeaders\NestedRequest\Inner1;
use Testing\RoutingHeaders\OrderRequest;
use Testing\RoutingHeaders\Response;
use Testing\RoutingHeaders\SimpleRequest;

/**
 * Service Description:
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $routingHeadersClient = new RoutingHeadersClient();
 * try {
 *     $response = $routingHeadersClient->deleteMethod();
 * } finally {
 *     $routingHeadersClient->close();
 * }
 * ```
 */
class RoutingHeadersGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'testing.routingheaders.RoutingHeaders';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'routingheaders.example.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/routing_headers_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/routing_headers_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/routing_headers_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/routing_headers_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'routingheaders.example.com:443'.
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
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->deleteMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('DeleteMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->getMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function getMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->getNoPlaceholdersMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function getNoPlaceholdersMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        return $this->startCall('GetNoPlaceholdersMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->getNoTemplateMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function getNoTemplateMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetNoTemplateMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $anotherName = 'another_name';
     *     $response = $routingHeadersClient->nestedMethod($anotherName);
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param string $anotherName
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type Inner1 $nest1
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function nestedMethod($anotherName, array $optionalArgs = [])
    {
        $request = new NestedRequest();
        $requestParamHeaders = [];
        $request->setAnotherName($anotherName);
        if (isset($optionalArgs['nest1'])) {
            $request->setNest1($optionalArgs['nest1']);
        }

        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('NestedMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $anotherName = 'another_name';
     *     $response = $routingHeadersClient->nestedMultiMethod($anotherName);
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param string $anotherName
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type Inner1 $nest1
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function nestedMultiMethod($anotherName, array $optionalArgs = [])
    {
        $request = new NestedRequest();
        $requestParamHeaders = [];
        $request->setAnotherName($anotherName);
        $requestParamHeaders['another_name'] = $anotherName;
        if (isset($optionalArgs['nest1'])) {
            $request->setNest1($optionalArgs['nest1']);
        }

        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('NestedMultiMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $a = 'a';
     *     $b = 'b';
     *     $d = 'd';
     *     $c = 'c';
     *     $e = 'e';
     *     $response = $routingHeadersClient->orderingMethod($a, $b, $d, $c, $e);
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param string $a
     * @param string $b
     * @param string $d
     * @param string $c
     * @param string $e
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type string $aId
     *     @type string $bId
     *     @type string $aa
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function orderingMethod($a, $b, $d, $c, $e, array $optionalArgs = [])
    {
        $request = new OrderRequest();
        $requestParamHeaders = [];
        $request->setA($a);
        $request->setB($b);
        $request->setD($d);
        $request->setC($c);
        $request->setE($e);
        $requestParamHeaders['a'] = $a;
        $requestParamHeaders['c'] = $b;
        $requestParamHeaders['b'] = $d;
        $requestParamHeaders['d'] = $c;
        $requestParamHeaders['e'] = $e;
        if (isset($optionalArgs['aId'])) {
            $request->setAId($optionalArgs['aId']);
            $requestParamHeaders['a_id'] = $optionalArgs['aId'];
        }

        if (isset($optionalArgs['bId'])) {
            $request->setBId($optionalArgs['bId']);
            $requestParamHeaders['b_id'] = $optionalArgs['bId'];
        }

        if (isset($optionalArgs['aa'])) {
            $request->setAa($optionalArgs['aa']);
            $requestParamHeaders['aa'] = $optionalArgs['aa'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('OrderingMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->patchMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function patchMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('PatchMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->postMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function postMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('PostMethod', Response::class, $optionalArgs, $request)->wait();
    }

    /**
     *
     * Sample code:
     * ```
     * $routingHeadersClient = new RoutingHeadersClient();
     * try {
     *     $response = $routingHeadersClient->putMethod();
     * } finally {
     *     $routingHeadersClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $name
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Testing\RoutingHeaders\Response
     *
     * @throws ApiException if the remote call fails
     */
    public function putMethod(array $optionalArgs = [])
    {
        $request = new SimpleRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['name'])) {
            $request->setName($optionalArgs['name']);
            $requestParamHeaders['name'] = $optionalArgs['name'];
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('PutMethod', Response::class, $optionalArgs, $request)->wait();
    }
}