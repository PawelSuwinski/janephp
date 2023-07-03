<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class TestPathParameters extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    protected $testString;
    protected $testInteger;
    protected $testFloat;
    /**
     * 
     *
     * @param string $testString 
     * @param int $testInteger 
     * @param float $testFloat 
     */
    public function __construct(string $testString, int $testInteger, float $testFloat)
    {
        $this->testString = $testString;
        $this->testInteger = $testInteger;
        $this->testFloat = $testFloat;
    }
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{testString}', '{testInteger}', '{testFloat}'), array($this->testString, $this->testInteger, $this->testFloat), '/test-path/{testString}/{testInteger}/{testFloat}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
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
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}