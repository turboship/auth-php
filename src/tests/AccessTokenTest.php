<?php

namespace TurboShip\Auth\tests;

use TurboShip\Auth\AuthClient;

class AccessTokenTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param   bool $test
     * @return  AuthClient
     */
    public function testENVInstantiation($test = true)
    {
        $authClient             = new AuthClient('./');

        if ($test)
            $this->assertInstanceOf('TurboShip\Auth\AuthClient', $authClient);

        return $authClient;
    }
    
}