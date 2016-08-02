<?php

namespace TurboShip\Auth\Support\Contracts;


interface TurboShipUserContract
{
    public function getId();
    public function getFirstName();
    public function getLastName();
    public function getEmail();
    public function getPassword();
    public function getTurboShipAccount();
    public function setTurboShipAccount($account);
}