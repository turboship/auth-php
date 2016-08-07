<?php

namespace TurboShip\Auth\Api;


use TurboShip\Api\ApiClient;
use TurboShip\Auth\Requests\Validatable;

class BaseApi
{

    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var bool
     */
    protected $validateRequests;
    
    
    public function __construct(ApiClient $apiClient, $validateRequests = true)
    {
        $this->apiClient        = $apiClient;
        $this->validateRequests = $validateRequests;
        
        $apiConfiguration       = $this->apiClient->getApiConfiguration();
        $apiConfiguration->setDefaultEndPoint($apiConfiguration->getAuthEndpoint());
        $this->apiClient->setApiConfiguration($apiConfiguration);
    }
    
    
    protected function tryValidation($request)
    {
        if ($request instanceof Validatable)
        {
            $request->validate();
        }
    }
}