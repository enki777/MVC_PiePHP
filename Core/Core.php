<?php 
    namespace Core;
    use Router;

    class Core
    {
        public function __construct(){
            require_once("src/routes.php");
        }

        public function run()
        {
            echo "------------------------------<br>";
            echo "        " . $_SERVER["REQUEST_URI"] . "<br><br>";
            // echo __CLASS__ . " [OK]" . PHP_EOL;

            $arr = explode("/", $_SERVER["REQUEST_URI"]);

            print_r($arr);
            // $controller;
            // $methode;
        }
    }