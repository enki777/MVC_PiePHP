<?php 

namespace Core;

class Controller{

    public function __construct(){
        $secure = new Request();
        if(isset($_POST["email"]) &&  isset($_POST["password"])){
            
            // $secure = new Request();
            $secure->securePost($_POST["email"], $_POST["password"]);
            $this->pValue = Request::$postvalue;

        }elseif(isset($_GET["email"]) &&  isset($_GET["password"])){

            $secure->secureGet($_GET["email"], $_GET["password"]);
            $this->gValue = Request::$getvalue;
        }
    }

    static $_render;
    
    protected function render($view,$scope = []) {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),'src','View',str_replace('Controller','',basename(get_class($this))),$view]).'.php';
        if(file_exists($f)){
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),'src','View','index']).'.php');
            self::$_render = ob_get_clean();
        }
        return self::$_render;
    }
}