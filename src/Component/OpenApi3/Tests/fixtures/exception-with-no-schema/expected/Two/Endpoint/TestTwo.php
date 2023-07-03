<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Two\Endpoint;

class TestTwo extends \Jane\Component\OpenApi3\Tests\Expected\Two\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Two\Runtime\Client\Endpoint
{
    use \Jane\Component\OpenApi3\Tests\Expected\Two\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/test-two';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Two\Exception\TestTwoNotFoundException
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
            throw new \Jane\Component\OpenApi3\Tests\Expected\Two\Exception\TestTwoNotFoundException($response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}