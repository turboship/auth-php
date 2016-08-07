<?php

namespace TurboShip\Auth\Requests\Account\Base;


use TurboShip\Auth\Requests\Account\Contracts\GetAccountsRequest AS GetAccountsRequestContract;

abstract class BaseGetAccountsRequest implements GetAccountsRequestContract
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
     * @var string|null
     */
    protected $organizationIds;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int|null
     */
    protected $page;


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
     * @return null|string
     */
    public function getOrganizationIds()
    {
        return $this->organizationIds;
    }

    /**
     * @param null|string $organizationIds
     */
    public function setOrganizationIds($organizationIds)
    {
        $this->organizationIds = $organizationIds;
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