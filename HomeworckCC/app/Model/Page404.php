<?php


namespace App\Model;


class Page404 extends AbstractModel
{
    public function __construct()
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        print_r("404");
    }

}