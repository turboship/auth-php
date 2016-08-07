<?php

namespace TurboShip\Auth\Requests\Account;


use TurboShip\Auth\Requests\Account\Base\BaseCreateAccountRequest;
use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Validatable;

class CreateAccountRequest extends BaseCreateAccountRequest implements Validatable
{

    /**
     * CreateAccountRequest constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        $this->identities               = [];
        
        if (is_array($data))
        {
            $this->firstName            = AU::get($data['firstName']);
            $this->lastName             = AU::get($data['lastName']);
            $this->email                = AU::get($data['email']);
            $this->password             = AU::get($data['password']);
            $this->accountTypeId        = AU::get($data['accountTypeId'], 1);
            $this->organizationId       = AU::get($data['organizationId']);
            
            $identities                 = AU::get($data['identities']);
            if (is_array($identities))
            {
                foreach ($identities AS $item)
                {
                    $this->addIdentity($item);
                }
            }
        }
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['firstName']            = $this->firstName;
        $object['lastName']             = $this->lastName;
        $object['email']                = $this->email;
        $object['password']             = $this->password;
        $object['accountTypeId']        = $this->accountTypeId;
        $object['organizationId']       = $this->organizationId;

        $object['identities']           = [];
        foreach ($this->identities AS $identity)
        {
            $object['identities'][]     = $identity->jsonSerialize();
        }
        
        return $object;
    }

    public function validate()
    {

    }

}