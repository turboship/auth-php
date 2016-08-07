<?php

namespace TurboShip\Auth\Requests\Account\Base;


use TurboShip\Auth\Requests\Account\Contracts\CreateAccountRequest AS CreateAccountRequestContract;

abstract class BaseCreateAccountRequest implements CreateAccountRequestContract
{

    /**
     * @var     string
     */
    protected $firstName;

    /**
     * @var     string
     */
    protected $lastName;

    /**
     * @var     string
     */
    protected $email;

    /**
     * @var     string
     */
    protected $password;

    /**
     * @var     integer
     */
    protected $accountTypeId;

    /**
     * The Organization this Account belongs to. 
     * Null will default it to your Organization
     * @var     int|null
     */
    protected $organizationId;

    /**
     * @var     BaseCreateIdentityRequest[]
     */
    protected $identities;


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
     * @return BaseCreateIdentityRequest[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @param BaseCreateIdentityRequest $identity
     */
    public function addIdentity($identity)
    {
        $this->identities[]     = $identity;
    }
    
}