<?php

namespace TurboShip\Auth\Requests\Account;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Account\Base\BaseCreateIdentityRequest;
use TurboShip\Auth\Requests\Validatable;

class CreateIdentityRequest extends BaseCreateIdentityRequest implements Validatable
{

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
    
}