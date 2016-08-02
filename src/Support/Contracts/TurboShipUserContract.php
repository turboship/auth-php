<?php

namespace TurboShip\Auth\Support\Contracts;


interface TurboShipUserContract
{
    public function getId();
    public function getTurboShipAccount();
    public function setTurboShipAccount($account);
}