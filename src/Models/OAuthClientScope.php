<?php

namespace TurboShip\Auth\Models;

use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Contracts\OAuthClientScopeContract;

class OAuthClientScope implements OAuthClientScopeContract, \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var OAuthScope
     */
    protected $oAuthScope;


    /**
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->setOAuthScope(AU::get($data['oAuthScope']));
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['oAuthScope']           = $this->oAuthScope->jsonSerialize();
        
        return $object;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return OAuthScope
     */
    public function getOAuthScope()
    {
        return $this->oAuthScope;
    }

    /**
     * @param OAuthScope|array $oAuthScope
     */
    public function setOAuthScope($oAuthScope)
    {
        if (is_null($oAuthScope))
            return;
        else if ($oAuthScope instanceof OAuthScope)
            $this->oAuthScope = $oAuthScope;
        else
            $this->oAuthScope = new OAuthScope($oAuthScope);
    }
    
}