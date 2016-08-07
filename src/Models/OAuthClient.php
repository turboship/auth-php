<?php

namespace TurboShip\Auth\Models;


use TurboShip\Auth\Models\Base\BaseOAuthClient;
use jamesvweston\Utilities\ArrayUtil AS AU;

class OAuthClient extends BaseOAuthClient
{

    /**
     * @param   array   $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->name                     = AU::get($data['name']);
        $this->secret                   = AU::get($data['secret']);

        $this->oAuthClientScopes        = [];
        $oAuthClientScopes              = AU::get($data['oAuthClientScopes'], []);
        foreach ($oAuthClientScopes AS $item)
        {
            $this->addOAuthClientScope(new OAuthClientScope($item));
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
    
}