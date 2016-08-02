<?php

namespace TurboShip\Auth\Utilities\Generators;


class AccountGenerator
{

    /**
     * @return array
     */
    public static function getUserSuccessAccountA()
    {
        $object['firstName']        = 'john';
        $object['lastName']         = 'doe';
        $object['email']            = 'johnyboy@whateverz.com';
        $object['password']         = 'asdfasdfasdf';
        $object['accountTypeId']    = 1;
        
        return $object;
    }
}