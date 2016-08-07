<?php

namespace TurboShip\Auth\Models\Contracts;


interface Product extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getName();
    function setName($name);
}