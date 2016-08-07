<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Base\BaseProduct;

class Product extends BaseProduct
{
    
    /**
     * Product constructor.
     * @param   array   $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->name                     = AU::get($data['name']);
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;

        return $object;
    }
    
}