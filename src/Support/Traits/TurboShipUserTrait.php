<?php

namespace TurboShip\Auth\Support\Traits;


use TurboShip\Auth\Models\Contracts\Account AS TurboShipAccountContract;

trait TurboShipUserTrait
{

    /**
     * @var TurboShipAccountContract
     */
    protected $turboShipAccount;


    /**
     * @return TurboShipAccountContract
     */
    public function getTurboShipAccount()
    {
        return $this->turboShipAccount;
    }

    /**
     * @param   TurboShipAccountContract     $account
     * @throws  \Exception
     */
    public function setTurboShipAccount($account)
    {
        if (! $account instanceof TurboShipAccountContract)
            throw new \Exception('account must TurboShip\Auth\Models\Contracts\Account');

        $this->turboShipAccount     = $account;
    }

}