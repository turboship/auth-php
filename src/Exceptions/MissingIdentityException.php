<?php

namespace TurboShip\Auth\Exceptions;


class MissingIdentityException extends \Exception
{

    /**
     * MissingIdentityException constructor.
     * @param   string  $product
     * @param   \Exception|null $previous
     */
    public function __construct($product, \Exception $previous = null)
    {
        $message            = $product . ' identity is required';

        parent::__construct($message, 400, $previous);
    }
}