<?php 
    namespace Core;
    use Core\Router;

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

            if(($route = Router::get($_SERVER["REQUEST_URI"])) != null ){
                echo "Custom route found<br>";
                $controller = $route->getRoutes();

            }else if(!isset($arr[3]) || !isset($arr[4])){
                $arr[3] = "app";
                $arr[4] = "index"; 
                
                $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
                $methode = $arr[4] . "Action";
                // echo $class -> $methode;

                $controller = new $class();
                $controller->$methode();  

            }else if(!class_exists("Controller\\" . ucfirst($arr[3]) . "Controller") || !method_exists("Controller\\" . ucfirst($arr[3]) . "Controller",$arr[4] . "Action")){
                echo '<h1 style ="color :red;">Erreur 404 !</h1>';
                echo '<h2 style ="color :red;">Veuillez spécifier un Controller <U>valide</U> ainsi que sa méthode(action) !</h2>';
                echo '<h3 style ="color :red;">Exemple : <span style ="color :green;">user/index</span></h3>';

            }else{
                $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
                $methode = $arr[4] . "Action";
                // echo $class -> $methode;

                $controller = new $class();
                $controller->$methode();           
            }
        }
    }