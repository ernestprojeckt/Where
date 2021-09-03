<?php
namespace Core;
use App\Controllers\Admin\Index;
use App\Controllers\Home\Page404;



final class Router
{

    private $href;

    public function __construct()
    {
        $this->href = $_SERVER["PATH_INFO"];
        $this->href = rtrim($this->href, '/');
        $this->href = explode('/', $this->href);
    }

    public function run()
    {
        if (isset($this->href[1])) {
            if (ucfirst($this->href[1]) === 'Admin') {
                $ControlesName = 'App\\Controllers\\Admin\\' . ucfirst($this->href[2]);
            } else {
                $ControlesName = 'App\\Controllers\\Home\\' . ucfirst($this->href[1]);
            }

            if (class_exists($ControlesName)) {

                $ClassObj = new $ControlesName;


                if (ucfirst($this->href[1]) === 'Admin') {
                    $funName = $this->href[3] ?? NULL;
                } else {
                    $funName = $this->href[2] ?? NULL;
                }

                    if ($funName === null){
                        $funName = 'index';
                    }
                    if (method_exists($ClassObj, $funName)) {
                        $ClassObj->$funName();
                    } else {
                        $ClassObj = new Page404();
                    }

            } else {
                $ClassObj = new Page404();
                $ClassObj->index();
    //var_export($ClassObj);
            }
        } else {
            $ClassObj = new Index();
            $ClassObj->head();
        }


    }
}
