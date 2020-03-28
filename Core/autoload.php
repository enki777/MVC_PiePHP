<?php 

    spl_autoload_register('autoload');

    function autoload($className){
        // $realPath = realpath($className. '.php');
        require $className . '.php';
        // if(!strpos($realPath, 'Core')){
        // }
    }   

?>