<?php

namespace TurboShip\Auth\Requests\Account\Contracts;


interface GetAccountsRequestContract
{
    public function getIds();
    public function setIds($ids);
    public function getFirstNames();
    public function setFirstNames($firstNames);
    public function getLastNames();
    public function setLastNames($lastNames);
    public function getEmails();
    public function setEmails($emails);
    public function getOrganizationIds();
    public function setOrganizationIds();
    public function getLimit();
    public function setLimit($limit);
    public function getPage();
    public function setPage($page);
}