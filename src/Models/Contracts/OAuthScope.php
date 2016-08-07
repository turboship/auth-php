<?php

namespace TurboShip\Auth\Models\Contracts;


interface OAuthScope extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getDescription();
    function setDescription($description);
}