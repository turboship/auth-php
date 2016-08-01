<?php

namespace TurboShip\Auth\Models;


use TurboShip\Auth\Models\Contracts\IdentityContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Identity implements IdentityContract, \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $userId;


    /**
     * Identity constructor.
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->id                   = AU::get($data['id']);
            $this->userId               = AU::get($data['userId']);
        }
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'        => $this->id,
            'userId'    => $this->userId,
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
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    
}