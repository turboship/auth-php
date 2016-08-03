<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 8/3/16
 * Time: 5:50 PM
 */

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateOAuthClientRequestContract
{
    function jsonSerialize();
    function validate();
    function getAccountId();
    function setAccountId($accountId);
    function getOAuthScopeIds();
    function addOAuthScopeId($oAuthScopeId);
    function addPostageOAuthScopeId();
    function addLocationsOAuthScopeId();
    function setOAuthScopeIds($oAuthScopeIds);
}