<?php

namespace TurboShip\Auth\Models\Contracts;


interface IdentityContract
{
    public function getId();
    public function setId($id);
    public function getUserId();
    public function setUserId($userId);
}