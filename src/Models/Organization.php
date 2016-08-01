<?php

namespace TurboShip\Auth\Models;


use TurboShip\Auth\Models\Contracts\OrganizationContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Organization implements OrganizationContract, \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;


    /**
     * Organization constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->name                 = AU::get($data['name']);
        }
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
}