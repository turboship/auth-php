<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\OAuthClientScope AS OAuthClientScopeContract;

abstract class BaseOAuthClientScope implements OAuthClientScopeContract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var BaseOAuthScope
     */
    protected $oAuthScope;

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
     * @return BaseOAuthScope
     */
    public function getOAuthScope()
    {
        return $this->oAuthScope;
    }

    /**
     * @param BaseOAuthScope    $oAuthScope
     */
    public function setOAuthScope($oAuthScope)
    {
        $this->oAuthScope   = $oAuthScope;
    }
    
}