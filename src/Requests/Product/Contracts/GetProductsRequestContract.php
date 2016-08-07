<?php

namespace TurboShip\Auth\Requests\Product\Contracts;


interface GetProductsRequest extends \JsonSerializable
{
    public function getIds();
    public function setIds($ids);
    public function getNames();
    public function setNames($names);
    public function jsonSerialize();
    public function validate();
}