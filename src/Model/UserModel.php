<?php 

namespace Model;
// use Core\Database;
class UserModel{
    
    private $email;
    private $pwd;

    private function executeThis($sql, $array_values=null) {
        // $connect = new \Core\Database();
        // $connect->getPDO();
        // $connect = new \Core\Database();
        $connect = \Core\Database::getPDO();
        $stmt = $connect->prepare($sql);
        if ( !$array_values ) {
            $stmt->execute();
        } else if ( is_string($array_values) || is_int($array_values) ) {
            $stmt->execute([$array_values]);
        } else {
            $stmt->execute($array_values);
        }
        try {
            $results = $stmt->fetchAll();
            return $results;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function save($values){
        $orm = new \Core\ORM();
        $orm->create('users',array(
        'email' => "$values[0]" ,
        'password' => "$values[1]"
        ));
    }

    public function checkUser($email){
        $sql = "SELECT * from users where email = ?";
        return $this->executeThis($sql, $email);
    }

    public function checkLogin($email, $pwd){
        $sql = "SELECT * from users where email = ? and password = ?";
        return $this->executeThis($sql, [$email, $pwd]);
    }
}