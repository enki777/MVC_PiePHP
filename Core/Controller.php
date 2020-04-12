<?php 

namespace Core;

class Controller{

    public function __construct(){
        $secure = new Request();
        if(isset($_POST)){
            $secure->securePost($_POST);
            $this->pValue = Request::$postvalue;
        }elseif(isset($_GET)){
            $secure->secureGet($_GET);
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