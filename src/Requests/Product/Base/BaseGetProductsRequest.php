<?php

namespace TurboShip\Auth\Requests\Product\Base;


use TurboShip\Auth\Requests\Product\Contracts\GetProductsRequest AS GetProductsRequestContract;

abstract class BaseGetProductsRequest implements GetProductsRequestContract
{

    /**
     * @var string|null
     */
    protected $ids;

    /**
     * @var string|null
     */
    protected $names;


    /**
     * @return null|string
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param null|string $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return null|string
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param null|string $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }
    
}