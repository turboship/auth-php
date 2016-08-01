<?php

namespace TurboShip\Auth;


use TurboShip\Api\ApiClient;
use TurboShip\Auth\Api\AccountApi;
use TurboShip\Auth\Api\ProductApi;

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
    
    
    public function __construct($apiConfiguration)
    {
        $apiClient          = new ApiClient($apiConfiguration);
        
        $this->accountApi   = new AccountApi($apiClient);
        $this->productApi   = new ProductApi($apiClient);
    }
}