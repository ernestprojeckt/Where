<?php
namespace App\Controllers\Admin;


use App\Controllers\AbstractController;
use App\Model\index as ModelAbout;

class Index extends AbstractController

{
//    public function index()
//    {
//
//    }

    public function keyone()
    {
        $funget = new ModelAbout();
        $this->gener('About',$funget->getAllTitle());
    }

}