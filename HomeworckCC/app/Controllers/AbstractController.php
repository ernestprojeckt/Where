<?php


namespace App\Controllers;

use Core\View;

abstract class AbstractController
{
    protected function gener($name, $data = NULL)
    {
        View::view($name,  $data);
    }
}