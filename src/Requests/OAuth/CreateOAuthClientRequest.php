<?php

namespace TurboShip\Auth\Requests\OAuth;


use TurboShip\Auth\Requests\Account\Contracts\CreateOAuthClientRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Validatable;
use TurboShip\Auth\Utilities\Data\OAuthScopeDataUtil;

class CreateOAuthClientRequest implements CreateOAuthClientRequestContract, Validatable
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
     * CreateOAuthClientRequest constructor.
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->accountId            = AU::get($data['accountId']);
            $this->oAuthScopeIds        = AU::get($data['oAuthScopeIds']);

        }
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $object['accountId']            = $this->accountId;
        $object['oAuthScopeIds']        = $this->oAuthScopeIds;
        
        return $object;
    }
    
    function validate()
    {
        
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
     * @param   string  $oAuthScopeId
     */
    public function addOAuthScopeId($oAuthScopeId)
    {
        $this->oAuthScopeIds    = is_null($this->oAuthScopeIds) ? $oAuthScopeId : $this->oAuthScopeIds . ',' . $oAuthScopeId;
    }

    /**
     * Add the Postage OAuthScope
     */
    public function addPostageOAuthScopeId()
    {
        $this->addOAuthScopeId(OAuthScopeDataUtil::getPostageId());
    }

    /**
     * Add the Locations OAuthScope
     */
    public function addLocationsOAuthScopeId()
    {
        $this->addOAuthScopeId(OAuthScopeDataUtil::getLocationsId());
    }

    /**
     * @param string $oAuthScopeIds
     */
    public function setOAuthScopeIds($oAuthScopeIds)
    {
        $this->oAuthScopeIds    = null;
        
        $scopes                 = explode(',', $oAuthScopeIds);
        foreach ($scopes AS $item)
        {
            $this->addOAuthScopeId($item);
        }
    }
    
    
}