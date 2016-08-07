<?php

namespace TurboShip\Auth\Models\Contracts;


interface OAuthClient extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getName();
    function setName($name);
    function getSecret();
    function setSecret($secret);
    function getOAuthClientScopes();
    function addOAuthClientScope($oAuthClientScope);
    function setOAuthClientScopes($oAuthClientScopes);
}