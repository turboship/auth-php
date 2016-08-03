<?php

namespace TurboShip\Auth\Support\Services;


use TurboShip\Auth\AuthClient;
use TurboShip\Auth\Models\Account;
use TurboShip\Auth\Requests\Account\CreateAccountRequest;
use TurboShip\Auth\Requests\Account\CreateIdentityRequest;
use TurboShip\Auth\Support\Contracts\TurboShipUserContract;
use TurboShip\Auth\Utilities\Data\ProductDataUtil;

class TurboShipAuthService
{

    /**
     * @var AuthClient
     */
    public $authClient;


    public function __construct($config)
    {
        $this->authClient       = new AuthClient($config);
    }

    /**
     * @param   string      $access_token
     * @return  \TurboShip\Auth\Models\Account
     */
    public function getMyAccount($access_token)
    {
        $account                = $this->authClient->accountApi->getMyAccount($access_token);
        return $account;
    }

    /**
     * @param   TurboShipUserContract   $user
     * @param   int                     $accountTypeId          1=User  2=Service
     * @param   bool                    $locationsIdentity
     * @param   bool                    $postageIdentity
     * @return  Account
     * @throws  \Exception
     */
    public function createAuthAccount($user, $accountTypeId = 1, $locationsIdentity = false, $postageIdentity = false)
    {
        if (!$user instanceof TurboShipUserContract)
            throw new \Exception('user must be instance of TurboShipUserContract');

        $request                = new CreateAccountRequest();
        $request->setFirstName($user->getFirstName());
        $request->setLastName($user->getLastName());
        $request->setEmail($user->getEmail());
        $request->setPassword($user->getPassword());
        $request->setAccountTypeId($accountTypeId);

        if ($locationsIdentity)
        {
            $identity           = new CreateIdentityRequest();
            $identity->setUserId($user->getId());
            $identity->setProductId(ProductDataUtil::getLocationsId());
            $request->addIdentity($identity);
        }

        if ($postageIdentity)
        {
            $identity           = new CreateIdentityRequest();
            $identity->setUserId($user->getId());
            $identity->setProductId(ProductDataUtil::getPostageId());
            $request->addIdentity($identity);
        }

        $account                = $this->authClient->accountApi->store($request);
        return $account;
    }

}