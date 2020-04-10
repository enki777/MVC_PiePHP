<?php 

namespace Core;

class ORM{

    private function executeThis($sql, $array_values=null) {
        $connect = Database::getPDO();
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

    public function create($table ,$fields){
        $connect = Database::getPDO();
        $keytab = [];
        $valuetab = [];

        foreach($fields as $key => $value){
            array_push($keytab, $key);
            array_push($valuetab, $value);
        }
        $sql = 'INSERT into '. $table .'('. implode(',',$keytab) .') values("'. implode('","',$valuetab) .'")';
        // echo $sql;
        $stmt = $connect->prepare($sql);
        $stmt->execute();

        $sql = 'SELECT id from '. $table .' where '. $keytab[0] .' like "%'. $valuetab[0] .'%" ';
        // echo $sql;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch(\PDO::FETCH_OBJ);
        return $results->id;
    }

    public function checkUser($email){
        $sql = 'SELECT * from users where email = "'. $email .'"  ';
        // var_dump($sql);
        return $this->executeThis($sql, $email);
    }

    public function checkLogin($email, $pwd){
        $sql = "SELECT * from users where email = ? and password = ?";
        return $this->executeThis($sql, [$email, $pwd]);
    }
}