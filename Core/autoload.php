<?php 

    spl_autoload_register('autoload');

    function autoload($className){
        // $path = "Core/";
        $extension = ".php";
        $fullPath =  $className .  $extension;
        // echo $fullPath;

        if(!file_exists($fullPath)){
            return false;
        }

        include_once $fullPath;

    }
?>