<?php

namespace TurboShip\Auth\Requests\OAuth\Base;


use TurboShip\Auth\Requests\OAuth\Contracts\CreateOAuthClientRequest AS CreateOAuthClientRequestContract;

abstract class BaseCreateOAuthClientRequest implements CreateOAuthClientRequestContract
{
    
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