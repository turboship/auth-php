<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\Identity AS IdentityContract;

abstract class BaseIdentity implements IdentityContract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var BaseProduct
     */
    protected $product;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return BaseProduct
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param   BaseProduct     $product
     */
    public function setProduct($product)
    {
        $this->product      = $product;
    }
    
}