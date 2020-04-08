<?php  

class UserController extends Core\Controller{

    // /user/index
    public function indexAction(){
        /* display all user */ 

        echo "UserConctroller/indexAction<br><br>";
    }

    public function filterAction(){
        echo "Ceci est la methode filter<br>";
    }

    public function addAction(){
       $this->render("register");
    }   

    public function registerAction(){
        $Model = new userModel();
        $Model->save();
    }
}