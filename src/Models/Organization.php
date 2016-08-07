<?php

namespace TurboShip\Auth\Models;


use TurboShip\Auth\Models\Base\BaseOrganization;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Organization extends BaseOrganization
{
    
    /**
     * Organization constructor.
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