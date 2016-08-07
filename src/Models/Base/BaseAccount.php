<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\Account AS AccountContract;
use TurboShip\Auth\Utilities\Data\ProductDataUtil;

abstract class BaseAccount implements AccountContract
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
     * @var BaseAccountType
     */
    protected $accountType;

    /**
     * @var BaseOrganization
     */
    protected $organization;

    /**
     * @var BaseIdentity[]
     */
    protected $identities;


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
     * @return BaseAccountType
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param BaseAccountType $accountType
     */
    public function setAccountType($accountType)
    {
        $this->accountType  = $accountType;
    }

    /**
     * @return BaseOrganization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param BaseOrganization $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return BaseIdentity[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @param BaseIdentity $identity
     */
    public function addIdentity($identity)
    {
        $this->identities[] = $identity;
    }

    /**
     * @return BaseIdentity|null
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
     * @return BaseIdentity|null
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