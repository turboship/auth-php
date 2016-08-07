<?php

namespace TurboShip\Auth\Responses\Product;


use TurboShip\Auth\Models\Product;
use TurboShip\Auth\Responses\Base\BasePaginatedResults;

class GetProductsResult extends BasePaginatedResults
{

    public function __construct($data = null)
    {
        parent::__construct($data);
    }

    /**
     * @return Product()[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        if (is_array($data))
        {
            foreach ($data AS $item)
            {
                $this->data[]   = new Product($item);
            }
        }
    }
    
}