<?php 

namespace Model;

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

    public function read($table, $id){
        $orm = new \Core\ORM();
        return $orm->read($table, $id);
    }

    public function update($table,$id ,$fields){
        $orm = new \Core\ORM();
        return $orm->update($table,$id ,$fields);
    }

    public function delete($table , $id){
        $orm = new \Core\ORM();
        return $orm->delete($table,$id);
    }

    public function find($table, $params){
        $orm = new \Core\ORM();
        return $orm->find($table, $params);
    }
}