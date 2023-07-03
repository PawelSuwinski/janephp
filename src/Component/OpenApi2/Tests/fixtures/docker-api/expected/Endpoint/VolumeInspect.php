<?php

namespace Docker\Api\Endpoint;

class VolumeInspect extends \Docker\Api\Runtime\Client\BaseEndpoint implements \Docker\Api\Runtime\Client\Endpoint
{
    protected $name;
    /**
     * 
     *
     * @param string $name Volume name or ID
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    use \Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/volumes/{name}');
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
     * @throws \Docker\Api\Exception\VolumeInspectNotFoundException
     * @throws \Docker\Api\Exception\VolumeInspectInternalServerErrorException
     *
     * @return null|\Docker\Api\Model\Volume
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize((string) $body, 'Docker\\Api\\Model\\Volume', 'json');
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\VolumeInspectNotFoundException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\VolumeInspectInternalServerErrorException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}