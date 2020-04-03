<?php 

    spl_autoload_register('autoload');

    function autoLoad($className)
    {
        $array = [
            implode(DIRECTORY_SEPARATOR, ['.', '']),
            implode(DIRECTORY_SEPARATOR, ['.', 'src', '']),
            implode(DIRECTORY_SEPARATOR, ['..', 'src', '']),
        ];

        for ($i = 0; $i < count($array); $i++) {
            $classPath = $array[$i] . $className . ".php";
            if (file_exists($classPath)) {
            include $classPath;
            }
        }
    } 
?>