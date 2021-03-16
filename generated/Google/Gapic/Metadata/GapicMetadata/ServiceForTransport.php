<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gapic/metadata/gapic_metadata.proto

namespace Google\Gapic\Metadata\GapicMetadata;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A map from a transport name to ServiceAsClient, which allows
 * listing information about the client objects that implement the
 * parent RPC service for the specified transport.
 * The key name is the transport, lower-cased with no separators
 * (e.g. "grpc", "rest").
 *
 * Generated from protobuf message <code>google.gapic.metadata.GapicMetadata.ServiceForTransport</code>
 */
class ServiceForTransport extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.ServiceAsClient> clients = 1;</code>
     */
    private $clients;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array|\Google\Protobuf\Internal\MapField $clients
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Gapic\Metadata\GapicMetadata::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.ServiceAsClient> clients = 1;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.ServiceAsClient> clients = 1;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setClients($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Gapic\Metadata\GapicMetadata\ServiceAsClient::class);
        $this->clients = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceForTransport::class, \Google\Gapic\Metadata\GapicMetadata_ServiceForTransport::class);
