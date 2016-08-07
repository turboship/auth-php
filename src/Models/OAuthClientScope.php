<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Base\BaseOAuthClientScope;

class OAuthClientScope extends BaseOAuthClientScope
{

    /**
     * @param   array   $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->oAuthScope               = new OAuthScope(AU::get($data['oAuthScope']));
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
    
}