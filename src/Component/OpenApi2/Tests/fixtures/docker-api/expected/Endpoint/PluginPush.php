<?php

namespace Docker\Api\Endpoint;

class PluginPush extends \Docker\Api\Runtime\Client\BaseEndpoint implements \Docker\Api\Runtime\Client\Endpoint
{
    protected $name;
    /**
     * Push a plugin to the registry.
    *
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    use \Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/plugins/{name}/push');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\Api\Exception\PluginPushNotFoundException
     * @throws \Docker\Api\Exception\PluginPushInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\StreamInterface
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (200 === $status) {
            return $body;
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\PluginPushNotFoundException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\PluginPushInternalServerErrorException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}