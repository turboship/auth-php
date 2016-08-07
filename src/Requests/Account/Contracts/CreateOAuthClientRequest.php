<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateOAuthClientRequest extends \JsonSerializable
{
    function getAccountId();
    function setAccountId($accountId);
    function getOAuthScopeIds();
    function addOAuthScopeId($oAuthScopeId);
    function addPostageOAuthScopeId();
    function addLocationsOAuthScopeId();
    function setOAuthScopeIds($oAuthScopeIds);
}