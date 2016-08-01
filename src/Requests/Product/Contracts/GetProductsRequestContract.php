<?php

namespace TurboShip\Auth\Requests\Product\Contracts;


interface GetProductsRequestContract
{
    public function getIds();
    public function setIds($ids);
    public function getNames();
    public function setNames($names);
}