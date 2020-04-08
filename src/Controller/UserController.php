<?php  

class UserController extends Core\Controller{

    // /user/index
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
        $Model = new \Model\userModel();
        $Model->save($_POST["email"],$_POST["password"]);
    }
}