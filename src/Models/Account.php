<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Contracts\AccountContract;
use TurboShip\Auth\Models\Contracts\AccountTypeContract;
use TurboShip\Auth\Models\Contracts\IdentityContract;
use TurboShip\Auth\Models\Contracts\OrganizationContract;
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
            
            $this->setAccountType(AU::get($data['accountType']));
            $this->setOrganization(AU::get($data['organization']));
            
            foreach (AU::get($data['identities']) AS $item)
            {
                $this->addIdentity($item);
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
     * @param AccountTypeContract|array $accountType
     */
    public function setAccountType($accountType)
    {
        if ($accountType instanceof AccountTypeContract)
            $this->accountType  = $accountType;
        else
            $this->accountType  = new AccountType($accountType);
    }

    /**
     * @return Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param OrganizationContract|array $organization
     */
    public function setOrganization($organization)
    {
        if ($organization instanceof OrganizationContract)
            $this->organization = $organization;
        else
            $this->organization = new Organization($organization);
    }

    /**
     * @return Identity[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @param IdentityContract|array $identity
     */
    public function addIdentity($identity)
    {
        if ($identity instanceof IdentityContract)
            $this->identities[] = $identity;
        else
            $this->identities[] = new Identity($identity);
    }

    /**
     * @return Identity|null
     */
    public function getPostageIdentity()
    {
        foreach ($this->identities AS $identity)
        {
            if ($identity->getProduct()->getId() == ProductDataUtil::getPostageId())
                return $identity;
        }
        
        return null;
    }

    /**
     * @return Identity|null
     */
    public function getLocationsIdentity()
    {
        foreach ($this->identities AS $identity)
        {
            if ($identity->getProduct()->getId() == ProductDataUtil::getLocationsId())
                return $identity;
        }

        return null;
    }

    /**
     * @return int|null
     */
    public function getPostageIdentityUserId()
    {
        $identity               = $this->getPostageIdentity();
        if (is_null($identity))
            return null;
        else
            return $identity->getUserId();
    }

    /**
     * @return int|null
     */
    public function getLocationsIdentityUserId()
    {
        $identity               = $this->getLocationsIdentity();
        if (is_null($identity))
            return null;
        else
            return $identity->getUserId();
    }
    
}