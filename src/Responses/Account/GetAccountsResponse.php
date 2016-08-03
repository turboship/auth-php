<?php

namespace TurboShip\Auth\Responses\Account;


use TurboShip\Auth\Models\Account;
use TurboShip\Auth\Responses\PaginatedResults;
use TurboShip\Auth\Responses\PaginatedResultsContract;

class GetAccountsResponse extends PaginatedResults implements PaginatedResultsContract
{

    public function __construct($data = null)
    {
        parent::__construct($data);
    }

    /**
     * @return Account[]
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
                $this->data[]   = new Account($item);
            }
        }
    }
}