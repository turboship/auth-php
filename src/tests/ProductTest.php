<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 8/1/16
 * Time: 2:34 PM
 */

namespace TurboShip\Auth\tests;


use TurboShip\Auth\AuthClient;

class ProductTest extends AccessTokenTest
{
    
    public function testGetProduct()
    {
        $authClient             = new AuthClient('./');
        $product                = $authClient->productApi->show(1);
        $this->assertInstanceOf('TurboShip\Auth\Models\Product', $product);
    }

    public function testGetProducts()
    {
        $authClient             = new AuthClient('./');
        $getProductsResponse    = $authClient->productApi->index();
        
        $this->assertInstanceOf('TurboShip\Auth\Responses\Product\GetProductsResult', $getProductsResponse);
    }
}