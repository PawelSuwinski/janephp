<?php

namespace Docker\Api\Endpoint;

class ConfigInspect extends \Docker\Api\Runtime\Client\BaseEndpoint implements \Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID of the config
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/configs/{id}');
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
     * @throws \Docker\Api\Exception\ConfigInspectNotFoundException
     * @throws \Docker\Api\Exception\ConfigInspectInternalServerErrorException
     * @throws \Docker\Api\Exception\ConfigInspectServiceUnavailableException
     *
     * @return null|\Docker\Api\Model\Config
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize((string) $body, 'Docker\\Api\\Model\\Config', 'json');
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\ConfigInspectNotFoundException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\ConfigInspectInternalServerErrorException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (503 === $status) {
            throw new \Docker\Api\Exception\ConfigInspectServiceUnavailableException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}