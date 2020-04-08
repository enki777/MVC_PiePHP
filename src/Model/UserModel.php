<?php 

// namespace Model;
require_once "../../Core/Database.php";


class UserModel extends Database{
    
    private function executeThis($sql, $array_values=null) {
        $stmt = $this->connect()->prepare($sql);
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

    private $email;
    private $pwd;

    public function save($email,$pwd){
        $sql = "INSERT into users(email, password) values(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $pwd]);
    }
}
