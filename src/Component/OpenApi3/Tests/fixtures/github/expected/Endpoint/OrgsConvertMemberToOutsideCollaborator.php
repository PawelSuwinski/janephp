<?php

namespace Github\Endpoint;

class OrgsConvertMemberToOutsideCollaborator extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $org;
    protected $username;
    /**
     * When an organization member is converted to an outside collaborator, they'll only have access to the repositories that their current team membership allows. The user will no longer be a member of the organization. For more information, see "[Converting an organization member to an outside collaborator](https://help.github.com/articles/converting-an-organization-member-to-an-outside-collaborator/)".
     *
     * @param string $org 
     * @param string $username 
     */
    public function __construct(string $org, string $username)
    {
        $this->org = $org;
        $this->username = $username;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'PUT';
    }
    public function getUri() : string
    {
        return str_replace(array('{org}', '{username}'), array($this->org, $this->username), '/orgs/{org}/outside_collaborators/{username}');
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
     * @throws \Github\Exception\OrgsConvertMemberToOutsideCollaboratorForbiddenException
     * @throws \Github\Exception\OrgsConvertMemberToOutsideCollaboratorNotFoundException
     *
     * @return null|\Psr\Http\Message\StreamInterface
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getBody();
        if (202 === $status) {
            return $body;
        }
        if (204 === $status) {
            return $body;
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\OrgsConvertMemberToOutsideCollaboratorForbiddenException($serializer->deserialize((string) $body, 'Github\\Model\\OrgsOrgOutsideCollaboratorsUsernamePutResponse403', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\OrgsConvertMemberToOutsideCollaboratorNotFoundException($serializer->deserialize((string) $body, 'Github\\Model\\BasicError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}