<?php

namespace TurboShip\Auth\Models\Base;


use TurboShip\Auth\Models\Contracts\OAuthScope AS OAuthScopeContract;

abstract class BaseOAuthScope implements OAuthScopeContract
{
    
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
}