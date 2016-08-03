<?php


namespace TurboShip\Auth\Responses;


interface PaginatedResultsContract
{
    function getData();
    function setData($data);
    function getTotal();
    function setTotal($total);
    function getPerPage();
    function setPerPage($per_page);
    function getCurrentPage();
    function setCurrentPage($current_page);
    function getLastPage();
    function setLastPage($last_page);
    function getNextPageUrl();
    function setNextPageUrl($next_page_url);
    function getPrevPageUrl();
    function setPrevPageUrl($prev_page_url);
    function getFrom();
    function setFrom($from);
    function getTo();
    function setTo($to);
    function jsonSerialize();
}