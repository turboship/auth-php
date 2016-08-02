<?php

namespace TurboShip\Auth\tests;


class AccountTest extends AccessTokenTest
{

    public function testShowAccount()
    {
        $authClient             = $this->testENVInstantiation(false);
        $account                = $authClient->accountApi->show(1);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }
    
    public function testIndex()
    {
        $authClient             = $this->testENVInstantiation(false);
        $getAccountsResponse    = $authClient->accountApi->index();
        $this->assertInstanceOf('TurboShip\Auth\Responses\Account\GetAccountsResponse', $getAccountsResponse);
    }
    
    public function testGetMyAccount()
    {
        $authClient             = $this->testENVInstantiation(false);
        $account                = $authClient->accountApi->getMyAccount();
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }
}