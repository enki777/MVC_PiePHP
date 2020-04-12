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

    public function userExists($email){
        $connect = Database::getPDO();
        $sql = 'SELECT * from users where email = "'. $email .'"  ';
        // var_dump($sql);
        return $this->executeThis($sql, $email);
        // $stmt = $connect->prepare($sql);
        // $stmt->execute();
        // $results = $stmt->fetch(\PDO::FETCH_OBJ);
        // var_dump($results->count == 0 ? false : true);
        // return $results->count == 0 ? false : true;
    }

    public function checkLogin($email, $pwd){
        $sql = "SELECT * from users where email = ? and password = ?";
        return $this->executeThis($sql, [$email, $pwd]);
    }

    public function read($table,$id){
        $connect = Database::getPDO();
        $sql = "SELECT * from $table where id = $id";
        // var_dump($this->executeThis($sql, [$table,$id]));
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function update($table,$id ,$fields){
        $connect = Database::getPDO();
        $sql = "DESC $table";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        // echo $results["Field"];
        $tab = [];
        foreach($fields as $key => $value){
            array_push($tab, "$key = '$value'");
        }
        $sql = 'UPDATE '.$table.' SET '.implode(", ",$tab).' where '.$results["Field"].' = '.$id.'  ';
        // echo $sql;
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }

    public function delete($table,$id){
        $connect = Database::getPDO();
        $sql = "DESC $table";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();

        $sql = 'DELETE from '.$table.' where '.$results["Field"].' = '.$id.'';
        // echo $sql;
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }

    public function find($table, $params = array('WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => '')){
        $connect = Database::getPDO();
        $keytab = array_keys($params);
        $valuetab = array_values($params);
        // var_dump($keytab);
        // var_dump($valuetab[2]);
        $sql = 'SELECT * from '.$table.' '.$keytab[0].' '.$valuetab[0].' '.$keytab[1].' '.$valuetab[1].' '. ($valuetab[2] != "" ? $keytab[2].' '.$valuetab[2] : '').'';
        // var_dump($sql);
        // foreach($params as $key => $value){
        //     array_push($tab, "$key $value");
        // }
        // $length = strlen(end($tab));
        // var_dump($tab);
        // $sql = 'SELECT * from '.$table.' '. (end($tab) !== '' ? implode(" ",$tab) : array_pop($tab)) .' ';
        // var_dump($sql);
        // // echo $sql;
        // var_dump($tab);
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $entrys = $stmt->fetchAll();
        // var_dump($entrys);
        return $entrys;
        // foreach($entrys as $value){
        //     echo "<ul>";
        //     foreach($value as $test){
        //         echo "<li>$test</li>";
        //     }
        //     echo "</ul>";
        // }
    }
}