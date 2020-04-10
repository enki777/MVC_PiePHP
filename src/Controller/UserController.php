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
        // $test = $model->checkUser($this->pValue[0]);
        // var_dump($test);
        // if($test){
        if($model->userExists($this->pValue[0])){
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
        $model = new \Model\UserModel();
        if($model->checkLogin($this->pValue[0],$this->pValue[1])){
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