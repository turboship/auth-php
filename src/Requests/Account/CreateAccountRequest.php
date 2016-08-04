<?php

namespace TurboShip\Auth\Requests\Account;


use TurboShip\Auth\Requests\Account\Contracts\CreateAccountRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Validatable;

class CreateAccountRequest implements CreateAccountRequestContract, Validatable
{

    /**
     * @SWG\Property(example="John")
     * @var     string
     */
    protected $firstName;

    /**
     * @SWG\Property(example="Doe")
     * @var     string
     */
    protected $lastName;

    /**
     * @SWG\Property(example="john.doe@domain.com")
     * @var     string
     */
    protected $email;

    /**
     * @SWG\Property(example="23asdfhj3rsd")
     * @var     string
     */
    protected $password;

    /**
     * @SWG\Property(example="1")
     * @var     integer
     */
    protected $accountTypeId;

    /**
     * The Organization this Account belongs to. Null will default it to your Organization
     * @var     int|null
     */
    protected $organizationId;

    /**
     * @SWG\Property()
     * @var     CreateIdentityRequest[]
     */
    protected $identities;


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
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getAccountTypeId()
    {
        return $this->accountTypeId;
    }

    /**
     * @param int $accountTypeId
     */
    public function setAccountTypeId($accountTypeId)
    {
        $this->accountTypeId = $accountTypeId;
    }

    /**
     * @return  int|null
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }

    /**
     * @param   int $organizationId
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId   = $organizationId;
    }

    /**
     * @return CreateIdentityRequest[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @param CreateIdentityRequest $identity
     */
    public function addIdentity($identity)
    {
        if ($identity instanceof CreateIdentityRequest)
            $this->identities[] = $identity;
        else
            $this->identities[] = new CreateIdentityRequest($identity);
    }
    
    
}