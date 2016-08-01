<?php

namespace TurboShip\Auth\Models\Contracts;


interface ProductContract
{
    public function getId();
    public function setId($id);
    public function getName();
    public function setName($name);
}