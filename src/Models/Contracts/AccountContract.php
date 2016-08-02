<?php

namespace TurboShip\Auth\Models\Contracts;


interface AccountContract
{
    public function getId();
    public function setId($id);
    public function getFirstName();
    public function setFirstName($firstName);
    public function getLastName();
    public function setLastName($lastName);
    public function getEmail();
    public function setEmail($email);
    public function getAccountType();
    public function setAccountType($accountType);
    public function getOrganization();
    public function setOrganization($organization);
    public function getIdentities();
    public function addIdentity($identity);
    public function getPostageIdentity();
    public function getLocationsIdentity();
    public function getPostageIdentityUserId();
    public function getLocationsIdentityUserId();
}