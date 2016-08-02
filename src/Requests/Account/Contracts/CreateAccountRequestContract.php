<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateAccountRequestContract
{

    public function getFirstName();
    public function setFirstName($firstName);
    public function getLastName();
    public function setLastName($lastName);
    public function getEmail();
    public function setEmail($email);
    public function getPassword();
    public function setPassword($password);
    public function getAccountTypeId();
    public function setAccountTypeId($accountTypeId);
    public function getIdentities();
    public function addIdentity($identity);
}