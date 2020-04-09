<?php 

namespace Core;
use \PDO;

class Database{

    // private static $pdo;
    // public function __construct(){
        private static $dbName = "piephp";
        private static $user = "root";
        private static $pwd = "";
        private static $server = "127.0.0.1";
    // }
    
    // public static function getPDO(){
    //     echo "<pre>".var_dump($dbName) ."</pre>";
    //     $dsn = 'mysql:host=' . $server . ';port=3306;dbname=' . $dbName;
    //     // echo $dsn;
    //     $pdo = new PDO($dsn, $user, $pwd);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     // $this->pdo = $pdo;
    //     return $pdo;
    //     // echo $server;
    // }

    public static function getPDO(){
        $dsn = 'mysql:host=' . self::$server . ';port=3306;dbname=' . self::$dbName;
        $pdo = new PDO($dsn, self::$user, self::$pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
