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
            // if( !empty($arr[3]) && !empty($arr[4] )){
            //     $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
            //     $methode = $arr[4] . "Action";
            //     echo "$class -> $methode<br><br>";
            //     $controller = new $class();
            //     $controller->$methode();                
            // }else if( empty($arr[3]) || empty($arr[4]) ){
            //     $arr[3] = "app";
            //     $arr[4] = "index";
            //     $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
            //     $methode = $arr[4] . "Action";
            //     echo "$class -> $methode<br><br>";
            //     $controller = new $class();
            //     $controller->$methode();  
            // }
            if(!class_exists("Controller\\" . ucfirst($arr[3]) . "Controller") || !method_exists(ucfirst("Controller\\" . $arr[3]) . "Controller",$arr[4] . "Action")){
                echo '<h1 style ="color :red;">Erreur 404 !</h1>';
                echo '<h2 style ="color :red;">Veuillez spécifier un Controller <U>valide</U> ainsi que sa méthode(action) !</h2>';
                echo '<h3 style ="color :red;">Exemple : <span style ="color :green;">user/add</span></h3>';
            }else{
                    $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
                    $methode = $arr[4] . "Action";
                    echo $class -> $methode;
                    $controller = new $class();
                    $controller->$methode();           
            }


        }
    }