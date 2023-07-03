<?php

namespace Github\Endpoint;

class UsersList extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    /**
    * Lists all users, in the order that they signed up on GitHub. This list includes personal user accounts and organization accounts.
    
    Note: Pagination is powered exclusively by the `since` parameter. Use the [Link header](https://developer.github.com/v3/#link-header) to get the URL for the next page of users.
    *
    * @param array $queryParameters {
    *     @var string $since Only show notifications updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
    *     @var int $per_page Results per page (max 100)
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/users';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('since', 'per_page'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('per_page' => 30));
        $optionsResolver->addAllowedTypes('since', array('string'));
        $optionsResolver->addAllowedTypes('per_page', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Github\Model\SimpleUser[]|\Psr\Http\Message\StreamInterface
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize((string) $body, 'Github\\Model\\SimpleUser[]', 'json');
        }
        if (304 === $status) {
            return $body;
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}