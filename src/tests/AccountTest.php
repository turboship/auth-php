<?php

namespace TurboShip\Auth\tests;


use TurboShip\Auth\Requests\Account\CreateAccountRequest;
use TurboShip\Auth\Utilities\Generators\AccountGenerator;

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
        $accessToken            = $authClient->apiClient->getApiConfiguration()->getAccessToken();
        $account                = $authClient->accountApi->getMyAccount($accessToken);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }

    public function testCreateAccount()
    {
        $authClient             = $this->testENVInstantiation(false);
        $data                   = AccountGenerator::getUserSuccessAccountA();
        $request                = new CreateAccountRequest($data);
        $account                = $authClient->accountApi->store($request);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }
    
    public function testGetOneByEmail()
    {
        $authClient             = $this->testENVInstantiation(false);
        $email                  = $authClient->apiClient->getApiConfiguration()->getUsername();
        
        $result                 = $authClient->accountApi->getOneByEmail($email);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $result);
    }
    
    
}