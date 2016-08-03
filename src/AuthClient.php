<?php

namespace TurboShip\Auth;


use TurboShip\Api\ApiClient;
use TurboShip\Auth\Api\AccountApi;
use TurboShip\Auth\Api\ProductApi;
use TurboShip\Auth\Support\Services\TurboShipAuthService;

class AuthClient
{

    /**
     * @var AccountApi
     */
    public $accountApi;

    /**
     * @var ProductApi
     */
    public $productApi;

    /**
     * @var ApiClient
     */
    public $apiClient;

    /**
     * @var TurboShipAuthService
     */
    public $service;
    
    
    public function __construct($apiConfiguration)
    {
        $this->apiClient    = new ApiClient($apiConfiguration);
        
        $this->accountApi   = new AccountApi($this->apiClient);
        $this->productApi   = new ProductApi($this->apiClient);
        
        $this->service      = new TurboShipAuthService($this->apiClient);
    }

    /**
     * @param   string      $access_token
     * @return  \TurboShip\Auth\Models\Account
     */
    public function getMyAccount($access_token)
    {
        $account                = $this->apiClient->getAccountForAccessToken($access_token);
        return $account;
    }
}