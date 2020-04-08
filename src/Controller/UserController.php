<?php  

// namespace Controller;
// use Core\Controller;

class UserController extends \Core\Controller{

    public function indexAction(){
        echo self::render("index");
    }

    public function filterAction(){
        echo "Ceci est la methode filter<br>";
    }

    public function addAction(){
        echo "userController / addAction";
        echo  $this->render('register');
    }   

    public function registerAction(){
        $model = new \Model\UserModel();
        if(isset($_POST["email"]) && isset($_POST["password"])){
            if($model->checkUser($_POST["email"]) == true){
                echo "Cet utilisateur existe deja";
            }else{
                $Model->save($_POST["email"],$_POST["password"]);
                echo "utilisateur " . $_POST["email"] . " enregistré avec succès.";
            }    
        }
    }

    public function loginAction(){
        echo  $this->render('login');
        $model = new \Model\UserModel();
        // var_dump($_POST);
        if(isset($_POST["email"]) && isset($_POST["password"])){
            if($model->checkLogin($_POST["email"], $_POST["password"]) == true){
                echo "Vous etes bien connecté";
            }else{
                echo "Mauvais identifiant ou mot de passe";
            }    
        }
    }

    public function __destruct()
    {
        if (isset($this->fichier)) {
            echo $this->render($this->fichier);
        }
    }
}