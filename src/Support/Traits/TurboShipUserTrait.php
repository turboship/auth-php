<?php

namespace TurboShip\Auth\Support\Traits;


use TurboShip\Auth\Models\Account;

trait TurboShipUserTrait
{

    /**
     * @var int
     */
    private $turboShipAccountId;

    /**
     * @var Account
     */
    protected $turboShipAccount;


    /**
     * @return Account
     */
    public function getTurboShipAccount()
    {
        return $this->turboShipAccount;
    }

    /**
     * @param Account $account
     */
    public function setTurboShipAccount(Account $account)
    {
        $this->turboShipAccountId   = $account->getId();
        $this->turboShipAccount     = $account;
    }

}