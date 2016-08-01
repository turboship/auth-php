<?php

namespace TurboShip\Auth\Models\Contracts;


interface AccountContract
{
    public function getId();
    public function setId($id);
    public function getAccountType();
    public function setAccountType($accountType);
    public function getOrganization();
    public function setOrganization($organization);
    public function getIdentities();
    public function addIdentity($identity);
    
}