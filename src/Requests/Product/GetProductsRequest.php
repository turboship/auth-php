<?php

namespace TurboShip\Auth\Requests\Product;


use TurboShip\Auth\Requests\Product\Contracts\GetProductsRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Validatable;

class GetProductsRequest implements GetProductsRequestContract, Validatable
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
     * GetProductsRequest constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->ids                  = AU::get($data['ids']);
            $this->names                = AU::get($data['names']);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['ids']                  = $this->ids;
        $object['names']                = $this->names;

        return $object;
    }
    
    public function validate()
    {
        
    }

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