<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class TestNoTag extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/test-exception';
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
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagBadRequestException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagNotFoundException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagBadRequestException($serializer->deserialize((string) $body, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Message', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagNotFoundException($response);
        }
        if (500 === $status) {
            throw new \Jane\Component\OpenApi3\Tests\Expected\Exception\TestNoTagInternalServerErrorException($response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}