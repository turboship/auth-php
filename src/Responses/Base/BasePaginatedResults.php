<?php

namespace TurboShip\Auth\Responses\Base;

use jamesvweston\Utilities\ArrayUtil AS AU;
use TurboShip\Auth\Responses\Contracts\PaginatedResults AS PaginatedResultsContract;

abstract class BasePaginatedResults implements PaginatedResultsContract
{

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var int
     */
    protected $current_page;

    /**
     * @var int
     */
    protected $last_page;

    /**
     * @var string|null
     */
    protected $next_page_url;

    /**
     * @var string|null
     */
    protected $prev_page_url;

    /**
     * @var int|null
     */
    protected $from;

    /**
     * @var int|null
     */
    protected $to;

    /**
     * @var array
     */
    protected $data;

    /**
     * PaginatedResults constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->total                = AU::get($data['total']);
            $this->per_page             = AU::get($data['per_page']);
            $this->current_page         = AU::get($data['current_page']);
            $this->last_page            = AU::get($data['last_page']);
            $this->next_page_url        = AU::get($data['next_page_url']);
            $this->prev_page_url        = AU::get($data['prev_page_url']);
            $this->from                 = AU::get($data['from']);
            $this->to                   = AU::get($data['to']);
            $this->setData(AU::get($data['data']));
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['total']                = $this->total;
        $object['per_page']             = $this->per_page;
        $object['current_page']         = $this->current_page;
        $object['last_page']            = $this->last_page;
        $object['next_page_url']        = $this->next_page_url;
        $object['from']                 = $this->from;
        $object['to']                   = $this->to;
        $object['total']                = $this->total;

        $object['data']                 = [];

        foreach ($this->data AS $item)
        {
            $object['data'][]           = $item->jsonSerialize();
        }

        return $object;
    }


    abstract function getData();

    abstract function setData($data);
    
    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->current_page;
    }

    /**
     * @param int $current_page
     */
    public function setCurrentPage($current_page)
    {
        $this->current_page = $current_page;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        return $this->last_page;
    }

    /**
     * @param int $last_page
     */
    public function setLastPage($last_page)
    {
        $this->last_page = $last_page;
    }

    /**
     * @return null|string
     */
    public function getNextPageUrl()
    {
        return $this->next_page_url;
    }

    /**
     * @param null|string $next_page_url
     */
    public function setNextPageUrl($next_page_url)
    {
        $this->next_page_url = $next_page_url;
    }

    /**
     * @return null|string
     */
    public function getPrevPageUrl()
    {
        return $this->prev_page_url;
    }

    /**
     * @param null|string $prev_page_url
     */
    public function setPrevPageUrl($prev_page_url)
    {
        $this->prev_page_url = $prev_page_url;
    }

    /**
     * @return int|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param int|null $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return int|null
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param int|null $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
    
}