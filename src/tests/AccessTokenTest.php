<?php

namespace TurboShip\Auth\tests;

use TurboShip\Auth\AuthClient;

class AccessTokenTest extends \PHPUnit_Framework_TestCase
{
    
    public function testENVInstantiation()
    {
        $authClient             = new AuthClient('./');

        $this->assertInstanceOf('TurboShip\Auth\AuthClient', $authClient);
    }
    
}