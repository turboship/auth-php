<?php

namespace TurboShip\Auth\Requests\Account\Base;


use TurboShip\Auth\Requests\Account\Contracts\CreateIdentityRequest AS CreateIdentityRequestContract;

abstract class BaseCreateIdentityRequest implements CreateIdentityRequestContract
{

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $productId;


    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    
}