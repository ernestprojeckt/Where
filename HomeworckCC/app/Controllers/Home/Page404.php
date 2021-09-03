<?php
namespace App\Controllers\Home;
use Core\View;

class Page404
{
    public function index()
    {
        View::view('Page404');
    }
}