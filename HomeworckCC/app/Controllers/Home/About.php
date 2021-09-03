<?php
namespace App\Controllers\Home;


use App\Controllers\AbstractController;
use App\Model\About as ModelAbout;
class About extends AbstractController

{
    public function index()
    {

        $modelclass = new ModelAbout();
       $list = $modelclass->list();

      // $this->gener('About', $list);
    }

    public function about()
    {
        $funget = new ModelAbout();
        $this->gener('About',$funget->getAllTitle());
    }

}
