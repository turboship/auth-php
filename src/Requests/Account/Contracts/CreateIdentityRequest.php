<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateIdentityRequest extends \JsonSerializable
{
    public function getUserId();
    public function setUserId($userId);
    public function getProductId();
    public function setProductId($productId);
}