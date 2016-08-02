<?php

namespace TurboShip\Auth\Support\Contracts;


interface TurboShipUserContract
{
    public function getId();
    public function getTurboShipAuthAccount();
    public function setTurboShipAuthAccount($account);
}