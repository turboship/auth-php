<?php

namespace TurboShip\Auth\Models\Contracts;


interface Account extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getFirstName();
    function setFirstName($firstName);
    function getLastName();
    function setLastName($lastName);
    function getEmail();
    function setEmail($email);
    function getAccountType();
    function setAccountType($accountType);
    function getOrganization();
    function setOrganization($organization);
    function getIdentities();
    function addIdentity($identity);
    function getPostageIdentity();
    function getLocationsIdentity();
    function getPostageIdentityUserId();
    function getLocationsIdentityUserId();
}