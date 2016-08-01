<?php

namespace TurboShip\Auth\Models;

use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Contracts\AccountContract;

class Account implements AccountContract, \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var AccountType
     */
    protected $accountType;

    /**
     * @var Organization
     */
    protected $organization;

    /**
     * @var Identity[]
     */
    protected $identities;


    /**
     * Account constructor.
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->accountType          = AU::get($data['accountType']);
            
            if (!is_null($this->accountType))
                $this->accountType      = new AccountType($this->accountType);

            $this->organization         = AU::get($data['organization']);
            if (!is_null($this->organization))
                $this->organization     = new Organization($this->organization);

            $this->identities           = [];
            $identities                 = AU::get($data['identities']);
            
            foreach ($identities AS $item)
            {
                $this->identities[] = new Identity($item);
            }
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['accountType']          = $this->accountType->jsonSerialize();
        $object['organization']         = $this->organization->jsonSerialize();
        $object['identities']           = [];
        
        foreach ($this->identities AS $item)
        {
            $object['identities'][]     = $item->jsonSerialize();
        }
        
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
     * @return AccountType
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param AccountType $accountType
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * @return Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param Organization $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return Identity[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @param Identity $identity
     */
    public function addIdentity($identity)
    {
        $this->identities[] = $identity;
    }
    
}