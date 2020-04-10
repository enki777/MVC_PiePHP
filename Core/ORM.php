<?php 

namespace Core;

class ORM{

    public function create($table ,$fields){
        $connect = Database::getPDO();
        $keytab = [];
        $valuetab = [];
        
        foreach($fields as $key => $value){
            array_push($keytab, $key);
            array_push($valuetab, $value);
        }
        $sql = 'INSERT into '. $table .'('. implode(',',$keytab) .') values("'. implode('","',$valuetab) .'")';
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }
}