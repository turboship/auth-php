<?php

namespace TurboShip\Auth\Requests\OAuth\Contracts;


interface CreateOAuthClientRequest extends \JsonSerializable
{
    function getAccountId();
    function setAccountId($accountId);
    function getOAuthScopeIds();
    function setOAuthScopeIds($oAuthScopeIds);
}