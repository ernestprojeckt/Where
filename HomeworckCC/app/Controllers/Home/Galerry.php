<?php
namespace App\Controllers\Home;


use App\Controllers\AbstractController;
use App\Model\Galerry as ModelAbout;

class Galerry extends AbstractController

{


    public function keyone()
    {
        $funget = new ModelAbout();
        $this->gener('Galerry',$funget->getAllTitle());
    }

}