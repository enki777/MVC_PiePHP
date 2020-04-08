<?php 

namespace Core;

class Database{
    private static $server = "127.0.0.1";
    private static $user = "root";
    private static $pwd = "";
    private static $dbName = "piephp";

    public static function connect(){
        $dsn = 'mysql:host=' . self::$server . ';port=3306;dbname=' . self::$dbName;
        $pdo = new \PDO($dsn, self::$user, self::$pwd);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $pdo;
    }
}
