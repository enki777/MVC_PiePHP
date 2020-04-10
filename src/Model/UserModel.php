<?php 

namespace Model;
// use Core\Database;
class UserModel{
    
    private $email;
    private $pwd;

    public function save($values){
        $orm = new \Core\ORM();
        $orm->create('users',array(
        'email' => "$values[0]" ,
        'password' => "$values[1]"
        ));
    }

    public function userExists($email){
        $orm = new \Core\ORM();
       return  $orm->userExists($email);
    }

    public function checkLogin($email, $pwd){
        $orm = new \Core\ORM();
        return  $orm->checkLogin($email, $pwd);
    }
}