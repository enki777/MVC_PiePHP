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

    public function displayregisterAction(){
        echo "userController / addAction";
        echo  $this->render('register');
    }   

    public function registerAction(){
        $model = new \Model\UserModel();
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

    public function displayreadAction(){
        echo  $this->render('read');
    }

    public function readAction(){
        $model = new \Model\UserModel();
        $test = $model->read($this->pValue[0], $this->pValue[1]);
        print_r($test);
    }

    public function displayupdateAction(){
        echo  $this->render('update');
    }

    public function updateAction(){
        $model = new \Model\UserModel();
        $test = $model->update("articles", 1, array(
            'titre' => "bilal t es trop chaud woullah" ,
            'content' => "qwertyuiopasdfghjkl;zxcvbn" ,
            'author' => 'BILALSAH'
        ));
    }

    public function displaydeleteAction(){
        echo  $this->render('delete');
    }

    public function deleteAction(){
        $model = new \Model\UserModel();
        $model->delete($this->pValue[0], $this->pValue[1]);
    }

    public function displayfindAction(){
        echo  $this->render('find');
    }

    public function findAction(){
        $model = new \Model\UserModel();
        $model->find("users", array('WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT'=> '5'));
    }

    public function __destruct()
    {
        if (isset($this->fichier)) {
            echo $this->render($this->fichier);
        }
    }
}