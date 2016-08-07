<?php

namespace TurboShip\Auth\tests;


use TurboShip\Auth\AuthClient;
use TurboShip\Auth\Requests\Account\CreateAccountRequest;
use TurboShip\Auth\Utilities\Generators\AccountGenerator;

class AccountTest extends \PHPUnit_Framework_TestCase
{

    public function testShow()
    {
        $authClient             = new AuthClient('./');
        $account                = $authClient->accountApi->show(1);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }
    
    public function testIndex()
    {
        $authClient             = new AuthClient('./');
        $getAccountsResponse    = $authClient->accountApi->index();
        $this->assertInstanceOf('TurboShip\Auth\Responses\Account\GetAccountsResponse', $getAccountsResponse);
        
        foreach ($getAccountsResponse->getData() AS $item)
        {
            $this->assertInstanceOf('TurboShip\Auth\Models\Account', $item);
        }
    }
    
    public function testGetMyAccount()
    {
        $authClient             = new AuthClient('./');
        $response               = $authClient->apiClient->refreshAccessToken();
        $account                = $authClient->getMyAccount($response->getAccessToken());
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
    }

    public function testStore()
    {
        /**
        $authClient             = new AuthClient('./');
        $data                   = AccountGenerator::getUserSuccessAccountA();
        $request                = new CreateAccountRequest($data);
        $account                = $authClient->accountApi->store($request);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $account);
         */
    }
    
    public function testGetOneByEmail()
    {
        $authClient             = new AuthClient('./');
        $email                  = $authClient->apiClient->getApiConfiguration()->getUsername();
        $result                 = $authClient->accountApi->getOneByEmail($email);
        $this->assertInstanceOf('TurboShip\Auth\Models\Account', $result);
    }
    
    
}