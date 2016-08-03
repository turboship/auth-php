<?php

namespace TurboShip\Auth\Models\Contracts;


interface OrganizationContract
{
    public function getId();
    public function setId($id);
    public function getName();
    public function setName($name);
    public function jsonSerialize();
}