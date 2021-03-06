<?php

namespace TurboShip\Auth\Requests\OAuth;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\OAuth\Base\BaseCreateOAuthClientRequest;
use TurboShip\Auth\Requests\Validatable;

class CreateOAuthClientRequest extends BaseCreateOAuthClientRequest implements Validatable
{

    /**
     * CreateOAuthClientRequest constructor.
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->secret               = AU::get($data['secret']);
            $this->accountId            = AU::get($data['accountId']);
            $this->oAuthScopeIds        = AU::get($data['oAuthScopeIds']);
        }
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['secret']               = $this->secret;
        $object['accountId']            = $this->accountId;
        $object['oAuthScopeIds']        = $this->oAuthScopeIds;
        
        return $object;
    }
    
    function validate()
    {
        
    }
    
}