<?php

namespace TurboShip\Auth\Api;


use TurboShip\Auth\Requests\Account\CreateAccountRequest;
use TurboShip\Auth\Requests\Account\CreateIdentityRequest;
use TurboShip\Auth\Requests\Account\GetAccountsRequest;
use TurboShip\Auth\Models\Account;
use TurboShip\Auth\Responses\Account\GetAccountsResponse;

class AccountApi extends BaseApi
{

    /**
     * @param   GetAccountsRequest|array $getAccountsRequest
     * @return  GetAccountsResponse
     */
    public function index($getAccountsRequest = [])
    {
        $data                   = ($getAccountsRequest instanceof GetAccountsRequest) ? $getAccountsRequest->jsonSerialize() : $getAccountsRequest;
        $result                 = $this->apiClient->get('accounts', $data);
        
        $getAccountsResponse    = new GetAccountsResponse($result);
        return $getAccountsResponse;
    }

    /**
     * Get the Account associated with the provided access_token
     * @return Account
     */
    public function getMyAccount()
    {
        $result                 = $this->apiClient->getAccountForAccessToken();
        $account                = new Account($result);
        return $account;
    }

    /**
     * @param   int       $id
     * @return  Account
     */
    public function show($id)
    {
        $result         = $this->apiClient->get('accounts/' . $id);
        $account        = new Account($result);

        return $account;
    }

    /**
     * @param CreateAccountRequest|array $createAccountRequest
     * @return  Account
     */
    public function store($createAccountRequest = [])
    {
        $response           =   $this->apiClient->post('accounts', $createAccountRequest->jsonSerialize());
        $account            = new Account($response);

        return $account;
    }

    /**
     * @param   int                         $accountId
     * @param   CreateIdentityRequest[]     $createIdentityRequests
     * @return  Account
     */
    public function addIdentities($accountId, $createIdentityRequests)
    {
        $identities         = [];
        foreach ($createIdentityRequests AS $identityRequest)
        {
            $identities[]   = $identityRequest->jsonSerialize();
        }
        $response           = $this->apiClient->post('accounts/' . $accountId, $identities);
        $account            = new Account($response);
        
        return $account;
    }
    
    
    
}