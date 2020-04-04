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

            //  ------------ ROUTER STATIQUE ------------
            if(($route = Router::get("/" . $arr[3])) != null ){
                echo "Custom route found<br>";

                $class = ucfirst($route["controller"]) . "Controller";
                $methode = $route["action"] . "Action";

                $controller = new $class;
                $controller->$methode();
    
            }
            //  ------------ ROUTER DYNAMIQUE ------------
            else{
                if(!isset($arr[3]) ||!isset($arr[4])){
                    $arr[3] = "app";
                    $arr[4] = "index"; 
                    
                    $class = ucfirst($arr[3]) . "Controller";
                    $methode = $arr[4] . "Action";
    
                    $controller = new $class();
                    $controller->$methode();  
                }
                else if(class_exists(ucfirst($arr[3]) . "Controller") && method_exists( ucfirst($arr[3]) . "Controller",$arr[4] . "Action")){
                    $class =  ucfirst($arr[3]) . "Controller";
                    $methode = $arr[4] . "Action";

                    $controller = new $class();
                    $controller->$methode();    
                }else{
                    echo '<h1 style ="color :red;">Erreur 404 !</h1>';
                    echo '<h2 style ="color :red;">Veuillez spécifier un Controller <U>valide</U> ainsi que sa méthode(action) !</h2>';
                    echo '<h3 style ="color :red;">Exemple : <span style ="color :green;">user/index</span></h3>';
                }
            }
        }
    }