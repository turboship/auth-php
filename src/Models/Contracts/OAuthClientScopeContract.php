<?php

namespace TurboShip\Auth\Models\Contracts;


interface OAuthClientScopeContract
{
    function jsonSerialize();
    function getId();
    function setId($id);
    function getOAuthScope();
    function setOAuthScope($oAuthScope);
}