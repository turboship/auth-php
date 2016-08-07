<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Base\BaseIdentity;

class Identity extends BaseIdentity
{
    
    /**
     * Identity constructor.
     * @param array|null $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->userId                   = AU::get($data['userId']);
        $this->product                  = new Product(AU::get($data['product']));
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'        => $this->id,
            'userId'    => $this->userId,
            'product'   => $this->product->jsonSerialize(),
        ];
    }

    

}