<?php

namespace TurboShip\Auth\Requests\OAuth\Base;


use TurboShip\Auth\Requests\OAuth\Contracts\CreateOAuthClientRequest AS CreateOAuthClientRequestContract;

abstract class BaseCreateOAuthClientRequest implements CreateOAuthClientRequestContract
{
    
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $secret;
    
    /**
     * @var int
     */
    protected $accountId;

    /**
     * Comma separated OAuthScope ids
     * @var string
     */
    protected $oAuthScopeIds;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }
    
    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getOAuthScopeIds()
    {
        return $this->oAuthScopeIds;
    }

    /**
     * @param string $oAuthScopeIds
     */
    public function setOAuthScopeIds($oAuthScopeIds)
    {
        $this->oAuthScopeIds    = $oAuthScopeIds;
    }
    
}