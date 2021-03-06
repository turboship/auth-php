<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\AccountType AS AccountTypeContract;

abstract class BaseAccountType implements AccountTypeContract
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