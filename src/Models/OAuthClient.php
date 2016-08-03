<?php

namespace TurboShip\Auth\Models;


use TurboShip\Auth\Models\Contracts\OAuthClientContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class OAuthClient implements OAuthClientContract, \JsonSerializable
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
     * @var OAuthClientScope[]
     */
    protected $oAuthClientScopes;


    /**
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        $this->oAuthClientScopes        = [];

        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->name                 = AU::get($data['name']);
            $this->secret               = AU::get($data['secret']);
            
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['secret']               = $this->secret;

        $object['oAuthClientScopes']    = [];
        foreach ($this->oAuthClientScopes AS $item)
        {
            $object['oAuthClientScopes'][] = $item->jsonSerialize();
        }

        return $object;
    }

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
     * @return OAuthClientScope[]
     */
    public function getOAuthClientScopes()
    {
        return $this->oAuthClientScopes;
    }

    /**
     * @param   OAuthClientScope|array  $oAuthClientScope
     */
    public function addOAuthClientScope($oAuthClientScope)
    {
        if ($oAuthClientScope instanceof OAuthClientScope)
            $this->oAuthClientScopes[]  = $oAuthClientScope;
        else
            $this->oAuthClientScopes[]  = new OAuthClientScope($oAuthClientScope);
    }

    /**
     * @param  array    $oAuthClientScopes
     */
    public function setOAuthClientScopes($oAuthClientScopes)
    {
        $this->oAuthClientScopes    = [];

        foreach ($oAuthClientScopes AS $item)
        {
            $this->addOAuthClientScope($item);
        }

    }
    
}