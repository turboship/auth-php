<?php

namespace TurboShip\Auth\Requests\Account;


use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Requests\Account\Contracts\GetAccountsRequestContract;

class GetAccountsRequest implements GetAccountsRequestContract, \JsonSerializable
{

    /**
     * @var string|null
     */
    protected $ids;

    /**
     * @var string|null
     */
    protected $firstNames;

    /**
     * @var string|null
     */
    protected $lastNames;

    /**
     * @var string|null
     */
    protected $emails;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int|null
     */
    protected $page;


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
        $object['limit']                = $this->limit;
        $object['page']                 = $this->page;
        
        return $object;
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
    public function getFirstNames()
    {
        return $this->firstNames;
    }

    /**
     * @param null|string $firstNames
     */
    public function setFirstNames($firstNames)
    {
        $this->firstNames = $firstNames;
    }

    /**
     * @return null|string
     */
    public function getLastNames()
    {
        return $this->lastNames;
    }

    /**
     * @param null|string $lastNames
     */
    public function setLastNames($lastNames)
    {
        $this->lastNames = $lastNames;
    }

    /**
     * @return null|string
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param null|string $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return int|null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int|null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }
    
    
    
}