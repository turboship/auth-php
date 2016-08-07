<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Base\BaseAccount;

class Account extends BaseAccount
{

    /**
     * Account constructor.
     * @param   array   $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->firstName                = AU::get($data['firstName']);
        $this->lastName                 = AU::get($data['lastName']);
        $this->email                    = AU::get($data['email']);
        $this->accountType              = new AccountType(AU::get($data['accountType']));
        $this->organization             = new Organization(AU::get($data['organization']));

        $this->identities               = [];
        $identities                     = AU::get($data['identities'], []);
        foreach ($identities AS $item)
        {
            $this->addIdentity(new Identity($item));
        }
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['firstName']            = $this->firstName;
        $object['lastName']             = $this->lastName;
        $object['email']                = $this->email;
        $object['accountType']          = $this->accountType->jsonSerialize();
        $object['organization']         = $this->organization->jsonSerialize();
        $object['identities']           = [];
        
        foreach ($this->identities AS $item)
        {
            $object['identities'][]     = $item->jsonSerialize();
        }
        
        return $object;
    }
    
}