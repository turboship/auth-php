<?php

namespace TurboShip\Auth\Api;


use TurboShip\Auth\Models\OAuthClient;
use TurboShip\Auth\Requests\Account\Contracts\CreateOAuthClientRequestContract;

class OAuthApi extends BaseApi
{

    /**
     * @param   CreateOAuthClientRequestContract|array    $request
     * @return  OAuthClient
     */
    public function store($request = [])
    {
        $data                   = ($request instanceof CreateOAuthClientRequestContract) ? $request->jsonSerialize() : $request;
        $result                 = $this->apiClient->post('oauth', $data);
        
        $oAuthClient            = new OAuthClient($result);
        return $oAuthClient;
    }
}