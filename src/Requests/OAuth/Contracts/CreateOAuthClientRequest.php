<?php

namespace TurboShip\Auth\Requests\OAuth\Contracts;


interface CreateOAuthClientRequest extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getSecret();
    function setSecret($secret);
    function getAccountId();
    function setAccountId($accountId);
    function getOAuthScopeIds();
    function setOAuthScopeIds($oAuthScopeIds);
}