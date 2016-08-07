<?php

namespace TurboShip\Auth\Models\Contracts;


interface OAuthClientScope extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getOAuthScope();
    function setOAuthScope($oAuthScope);
}