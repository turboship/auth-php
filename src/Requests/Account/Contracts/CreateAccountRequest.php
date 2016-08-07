<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateAccountRequest extends \JsonSerializable
{
    function getFirstName();
    function setFirstName($firstName);
    function getLastName();
    function setLastName($lastName);
    function getEmail();
    function setEmail($email);
    function getPassword();
    function setPassword($password);
    function getAccountTypeId();
    function setAccountTypeId($accountTypeId);
    function getOrganizationId();
    function setOrganizationId($organizationId);
    function getIdentities();
    function addIdentity($identity);
}