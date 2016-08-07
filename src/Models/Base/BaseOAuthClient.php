<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\OAuthClient AS OAuthClientContract;

abstract class BaseOAuthClient implements OAuthClientContract
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var BaseOAuthClientScope[]
     */
    protected $oAuthClientScopes;


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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return BaseOAuthClientScope[]
     */
    public function getOAuthClientScopes()
    {
        return $this->oAuthClientScopes;
    }

    /**
     * @param   BaseOAuthClientScope    $oAuthClientScope
     */
    public function addOAuthClientScope($oAuthClientScope)
    {
        $this->oAuthClientScopes[]  = $oAuthClientScope;
    }

    /**
     * @param  BaseOAuthClientScope[]   $oAuthClientScopes
     */
    public function setOAuthClientScopes($oAuthClientScopes)
    {
        $this->oAuthClientScopes    = $oAuthClientScopes;
    }
    
}