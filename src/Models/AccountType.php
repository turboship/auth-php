<?php

namespace TurboShip\Auth\Models;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Models\Base\BaseAccountType;

class AccountType extends BaseAccountType
{

    /**
     * AccountType constructor.
     * @param array     $data
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
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
        ];
    }
    
}