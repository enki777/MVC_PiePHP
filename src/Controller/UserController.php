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
        if($model->checkUser($this->pValue[0]) == true){
            echo "Cet utilisateur existe deja";
        }else{
            $model->save($this->pValue);
            echo "utilisateur " . $this->pValue[0] . " enregistré avec succès.";
        }    
    }

    public function displayloginAction(){
        echo  $this->render('login');
    }

    public function loginAction(){
        // var_dump($this->pValue);
        $model = new \Model\UserModel();
        if($model->checkLogin($this->pValue[0],$this->pValue[1]) == true){
            echo "Vous etes bien connecté";
        }else{
            echo "Mauvais identifiant ou mot de passe";
        }    
    }

    public function __destruct()
    {
        if (isset($this->fichier)) {
            echo $this->render($this->fichier);
        }
    }
}