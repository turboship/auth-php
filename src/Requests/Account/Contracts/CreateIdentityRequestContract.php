<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface CreateIdentityRequestContract
{
    public function getUserId();
    public function setUserId($userId);
    public function getProductId();
    public function setProductId($productId);
    public function jsonSerialize();
    public function validate();
}