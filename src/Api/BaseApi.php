<?php

namespace TurboShip\Auth\Api;


use TurboShip\Api\ApiClient;

class BaseApi
{

    /**
     * @var ApiClient
     */
    protected $apiClient;
    
    
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient        = $apiClient;
        $apiConfiguration       = $this->apiClient->getApiConfiguration();
        $apiConfiguration->setDefaultEndPoint($apiConfiguration->getAuthEndpoint());
        $this->apiClient->setApiConfiguration($apiConfiguration);
    }
}