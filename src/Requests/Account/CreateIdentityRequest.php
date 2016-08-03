<?php

namespace TurboShip\Auth\Requests\Account;


use TurboShip\Auth\Requests\Account\Contracts\CreateIdentityRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CreateIdentityRequest implements CreateIdentityRequestContract
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
     * CreateIdentityRequest constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->userId               = AU::get($data['userId']);
            $this->productId            = AU::get($data['productId']);
        }
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['userId']           = $this->userId;
        $object['productId']        = $this->productId;
        
        return $object;
    }

    public function validate()
    {

    }

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