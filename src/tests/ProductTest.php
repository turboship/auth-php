<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 8/1/16
 * Time: 2:34 PM
 */

namespace TurboShip\Auth\tests;


class ProductTest extends AccessTokenTest
{
    
    public function testGetProduct()
    {
        $authClient             = $this->testENVInstantiation(false);
        $product                = $authClient->productApi->show(1);

        $this->assertInstanceOf('TurboShip\Auth\Models\Product', $product);
    }

    public function testGetProducts()
    {
        $authClient             = $this->testENVInstantiation(false);
        $getProductsResponse    = $authClient->productApi->index();
        $this->assertInstanceOf('TurboShip\Auth\Responses\Product\GetProductsResult', $getProductsResponse);
    }
}