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

    /**
     * @var ApiClient
     */
    public $apiClient;
    
    
    public function __construct($apiConfiguration)
    {
        $this->apiClient    = new ApiClient($apiConfiguration);
        
        $this->accountApi   = new AccountApi($this->apiClient);
        $this->productApi   = new ProductApi($this->apiClient);
    }
}