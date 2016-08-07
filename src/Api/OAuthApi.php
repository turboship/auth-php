<?php

namespace TurboShip\Auth\Api;


use TurboShip\Auth\Models\OAuthClient;
use TurboShip\Auth\Requests\OAuth\CreateOAuthClientRequest;

class OAuthApi extends BaseApi
{

    /**
     * @param   CreateOAuthClientRequest|array    $request
     * @return  OAuthClient
     */
    public function store($request = [])
    {
        $this->tryValidation($request);
        
        $data                   = ($request instanceof CreateOAuthClientRequest) ? $request->jsonSerialize() : $request;
        $result                 = $this->apiClient->post('oauth', $data);
        
        $oAuthClient            = new OAuthClient($result);
        return $oAuthClient;
    }
}