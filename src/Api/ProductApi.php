<?php

namespace TurboShip\Auth\Api;


use TurboShip\Auth\Requests\Product\GetProductsRequest;
use TurboShip\Auth\Models\Product;
use TurboShip\Auth\Responses\Product\GetProductsResult;

class ProductApi extends BaseApi
{

    /**
     * @param   GetProductsRequest|array  $request
     * @return  GetProductsResult
     */
    public function index($request = [])
    {
        $this->tryValidation($request);

        $data                   = ($request instanceof GetProductsRequest) ? $request->jsonSerialize() : $request;
        $result                 = $this->apiClient->get('products', $data);
        
        $getProductsResult      = new GetProductsResult($result);
        return $getProductsResult;
    }

    /**
     * @param   int       $id
     * @return  Product
     */
    public function show($id)
    {
        $result         = $this->apiClient->get('products/' . $id);
        $product        = new Product($result);
        
        return $product;
    }
    
}