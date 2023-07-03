<?php

namespace Docker\Api\Endpoint;

class ContainerExec extends \Docker\Api\Runtime\Client\BaseEndpoint implements \Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Run a command inside a running container.
     *
     * @param string $id ID or name of container
     * @param \Docker\Api\Model\ContainersIdExecPostBody $execConfig Exec configuration
     */
    public function __construct(string $id, \Docker\Api\Model\ContainersIdExecPostBody $execConfig)
    {
        $this->id = $id;
        $this->body = $execConfig;
    }
    use \Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/exec');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\Api\Exception\ContainerExecNotFoundException
     * @throws \Docker\Api\Exception\ContainerExecConflictException
     * @throws \Docker\Api\Exception\ContainerExecInternalServerErrorException
     *
     * @return null|\Docker\Api\Model\IdResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (201 === $status) {
            return $serializer->deserialize((string) $body, 'Docker\\Api\\Model\\IdResponse', 'json');
        }
        if (404 === $status) {
            throw new \Docker\Api\Exception\ContainerExecNotFoundException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (409 === $status) {
            throw new \Docker\Api\Exception\ContainerExecConflictException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Docker\Api\Exception\ContainerExecInternalServerErrorException($serializer->deserialize((string) $body, 'Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}