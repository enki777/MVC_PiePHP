<?php 

class Database{
    private $server = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "piephp";

    protected function connect() 
    {
        $dsn = 'mysql:host=' . $this->server . ';port=3306;dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
// print_r(PDO::getAvailableDrivers());
// phpinfo();
// phpinfo(INFO_MODULES);