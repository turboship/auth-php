<?php

namespace TurboShip\Auth\Requests\Product;


use TurboShip\Auth\Requests\Product\Base\BaseGetProductsRequest;
use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Validatable;

class GetProductsRequest extends BaseGetProductsRequest implements Validatable
{

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
    
}