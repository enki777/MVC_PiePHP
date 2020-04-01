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
            echo "        " . $_SERVER["REQUEST_URI"] . "<br>";

            $arr = explode("/", $_SERVER["REQUEST_URI"]);

            print_r($arr);
            $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
            $methode = $arr[4] . "Action";

            echo "$class -> $methode<br><br>";
            $controller = new $class();
            $controller->$methode();

        }
    }