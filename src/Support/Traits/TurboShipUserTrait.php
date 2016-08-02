<?php

namespace TurboShip\Auth\Support\Traits;


use TurboShip\Auth\Models\Contracts\AccountContract;

trait TurboShipUserTrait
{

    /**
     * @var AccountContract
     */
    protected $turboShipAccount;


    /**
     * @return AccountContract
     */
    public function getTurboShipAccount()
    {
        return $this->turboShipAccount;
    }

    /**
     * @param   AccountContract     $account
     * @throws  \Exception
     */
    public function setTurboShipAccount($account)
    {
        if (! $account instanceof AccountContract)
            throw new \Exception('account must implement AccountContract');

        $this->turboShipAccount     = $account;
    }

}