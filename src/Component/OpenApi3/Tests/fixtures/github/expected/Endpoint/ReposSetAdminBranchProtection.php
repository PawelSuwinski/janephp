<?php

namespace Github\Endpoint;

class ReposSetAdminBranchProtection extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $owner;
    protected $repo;
    protected $branch;
    /**
    * Protected branches are available in public repositories with GitHub Free and GitHub Free for organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's products](https://help.github.com/github/getting-started-with-github/githubs-products) in the GitHub Help documentation.
    
    Adding admin enforcement requires admin or owner permissions to the repository and branch protection to be enabled.
    *
    * @param string $owner 
    * @param string $repo 
    * @param string $branch branch+ parameter
    */
    public function __construct(string $owner, string $repo, string $branch)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->branch = $branch;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{owner}', '{repo}', '{branch}'), array($this->owner, $this->repo, $this->branch), '/repos/{owner}/{repo}/branches/{branch}/protection/enforce_admins');
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
     *
     * @return null|\Github\Model\ProtectedBranchAdminEnforced
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Github\\Model\\ProtectedBranchAdminEnforced', 'json');
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}