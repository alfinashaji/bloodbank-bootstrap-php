<?php
class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "mydbk") {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $this->conn->query("SHOW DATABASES LIKE '$this->dbname'");
            $exists = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($exists) {
         
            } else {
             
                $this->conn->exec("CREATE DATABASE `$this->dbname`");
                echo "Database '{$this->dbname}' created successfully.<br>";
            }

            $this->conn->exec("USE `$this->dbname`");
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

   public function dbconn(){
    $this->conn = new PDO("mysql:host=localhost;dbname=mydbk", "root", "");
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   }
}

$db = new DatabaseConnection();
?>
