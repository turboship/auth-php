<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Contracts\AccountContract;
use TurboShip\Auth\Utilities\Data\ProductDataUtil;

class Account implements AccountContract, \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;
    
    /**
     * @var string
     */
    protected $email;

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
        $this->identities               = [];
        
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->firstName            = AU::get($data['firstName']);
            $this->lastName             = AU::get($data['lastName']);
            $this->email                = AU::get($data['email']);
            $this->accountType          = AU::get($data['accountType']);
            
            if (!is_null($this->accountType))
                $this->accountType      = new AccountType($this->accountType);

            $this->organization         = AU::get($data['organization']);
            if (!is_null($this->organization))
                $this->organization     = new Organization($this->organization);
            
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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * @return bool
     */
    public function hasPostageIdentity()
    {
        foreach ($this->identities AS $identity)
        {
            if ($identity->getProduct()->getId() == ProductDataUtil::getPostageId())
                return true;
        }
        
        return false;
    }

    /**
     * @return bool
     */
    public function hasLocationsIdentity()
    {
        foreach ($this->identities AS $identity)
        {
            if ($identity->getProduct()->getId() == ProductDataUtil::getLocationsId())
                return true;
        }

        return false;
    }
    
}