<?php

namespace TurboShip\Auth\Requests\Account;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Account\Base\BaseGetAccountsRequest;
use TurboShip\Auth\Requests\Validatable;

class GetAccountsRequest extends BaseGetAccountsRequest implements Validatable
{

    /**
     * GetAccountsRequest constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->ids                  = AU::get($data['ids']);
            $this->firstNames           = AU::get($data['firstNames']);
            $this->lastNames            = AU::get($data['lastNames']);
            $this->emails               = AU::get($data['emails']);
            $this->organizationIds      = AU::get($data['organizationIds']);
            $this->limit                = AU::get($data['limit']);
            $this->page                 = AU::get($data['page']);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['ids']                  = $this->ids;
        $object['firstNames']           = $this->firstNames;
        $object['lastNames']            = $this->lastNames;
        $object['emails']               = $this->emails;
        $object['organizationIds']      = $this->organizationIds;
        $object['limit']                = $this->limit;
        $object['page']                 = $this->page;
        
        return $object;
    }
    
    
    public function validate()
    {
        
    }
    
}