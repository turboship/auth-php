<?php

namespace TurboShip\Auth\Models\Contracts;


interface Identity extends \JsonSerializable
{
    function getId();
    function setId($id);
    function getUserId();
    function setUserId($userId);
    function getProduct();
    function setProduct($product);
}