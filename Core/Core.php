<?php 
    namespace Core;
    use Core\Router;

    class Core{
        
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

                $class = "Controller\\" . ucfirst($route["controller"]) . "Controller";
                $methode = $route["action"] . "Action";

                $controller = new $class;
                $controller->$methode();
    
            }
            //  ------------ ROUTER DYNAMIQUE ------------
            else{
                // var_dump($arr[3]);
                // var_dump($arr[4]);
                
                if(class_exists("Controller\\" . ucfirst($arr[3]) . "Controller")){

                    if(isset($arr[4]) && method_exists( "Controller\\" . ucfirst($arr[3]) . "Controller",$arr[4] . "Action")){
                        $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
                        $methode = $arr[4] . "Action";

                        $controller = new $class();
                        $controller->$methode();  
                    }else{
                        $arr[3] = "user";
                        $arr[4] = "index"; 
                    
                        $class = "Controller\\" .ucfirst($arr[3]) . "Controller";
                        $methode = $arr[4] . "Action";
    
                        $controller = new $class();
                        $controller->$methode();  
                    }
                }elseif(!class_exists("Controller\\" . ucfirst($arr[3]) . "Controller") || !method_exists( "Controller\\" . ucfirst($arr[3]) . "Controller",$arr[4] . "Action")){
                    echo '<h1 style ="color :red;">Erreur  404 !</h1>';
                    echo '<h2 style ="color :red;">Veuillez spécifier un Controller <U>valide</U> ainsi que sa méthode(action) !</h2>';
                    echo '<h3 style ="color :red;">Exemple : <span style ="color :green;">user/index</span></h3>';
                }
               
                // if(class_exists("Controller\\" . ucfirst($arr[3]) . "Controller") && method_exists( "Controller\\" . ucfirst($arr[3]) . "Controller",$arr[4] . "Action")){
                //     $class = "Controller\\" . ucfirst($arr[3]) . "Controller";
                //     $methode = $arr[4] . "Action";

                //     $controller = new $class();
                //     $controller->$methode();    
                // }
                // elseif(class_exists("Controller\\" . ucfirst($arr[3]) . "Controller") && !isset($arr[4])){
                //     $arr[3] = "user";
                //     $arr[4] = "index"; 
                    
                //     $class = "Controller\\" .ucfirst($arr[3]) . "Controller";
                //     $methode = $arr[4] . "Action";
    
                //     $controller = new $class();
                //     $controller->$methode();  
                // }
            }
        }
    }