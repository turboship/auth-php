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
     * @param   GetAccountsRequest|array $request
     * @return  GetAccountsResponse
     */
    public function index($request = [])
    {
        $this->tryValidation($request);
        
        $data                   = ($request instanceof GetAccountsRequest) ? $request->jsonSerialize() : $request;
        $result                 = $this->apiClient->get('accounts', $data);
        
        $getAccountsResponse    = new GetAccountsResponse($result);
        return $getAccountsResponse;
    }

    /**
     * Get the Account associated with the provided access_token
     * @param  string   $access_token
     * @return Account
     */
    public function getMyAccount($access_token)
    {
        $result                 = $this->apiClient->getAccountForAccessToken($access_token);
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
     * @param   string      $email
     * @return  Account|null
     */
    public function getOneByEmail($email)
    {
        $getAccountsRequest = new GetAccountsRequest();
        $getAccountsRequest->setEmails($email);
        
        $result             = $this->index($getAccountsRequest);
        
        if ($result->getTotal() == 1)
            return $result->getData()[0];
        else
            return null;
    }

    /**
     * @param CreateAccountRequest|array $request
     * @return  Account
     */
    public function store($request = [])
    {
        $this->tryValidation($request);
        
        $data               = ($request instanceof CreateAccountRequest) ? $request->jsonSerialize() : $request;
        $response           = $this->apiClient->post('accounts', $data);
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
        $this->tryValidation($createIdentityRequests);
        
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