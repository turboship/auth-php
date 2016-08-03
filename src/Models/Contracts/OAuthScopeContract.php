<?php

namespace TurboShip\Auth\Models\Contracts;


interface OAuthScopeContract
{
    function jsonSerialize();
    function getId();
    function setId($id);
    function getDescription();
    function setDescription($description);
}