<?php

namespace TurboShip\Auth;


use TurboShip\Api\ApiClient;
use TurboShip\Auth\Api\AccountApi;
use TurboShip\Auth\Api\OAuthApi;
use TurboShip\Auth\Api\ProductApi;

class AuthClient
{

    /**
     * @var AccountApi
     */
    public $accountApi;

    /**
     * @var OAuthApi
     */
    public $oAuthApi;
    
    /**
     * @var ProductApi
     */
    public $productApi;

    /**
     * @var ApiClient
     */
    public $apiClient;
    
    
    public function __construct($apiConfiguration, $validateRequests = true)
    {
        $this->apiClient    = new ApiClient($apiConfiguration);
        
        $this->accountApi   = new AccountApi($this->apiClient, $validateRequests);
        $this->oAuthApi     = new OAuthApi($this->apiClient, $validateRequests);
        $this->productApi   = new ProductApi($this->apiClient, $validateRequests);
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