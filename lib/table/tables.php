<?php
require ("../db/conn.php");

class Table extends DatabaseConnection {
  public function __construct() {
      parent::__construct();
      $this->dbconn();
      try {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullname VARCHAR(30) NOT NULL,
            phoneno VARCHAR(30) NOT NULL,
            datebirth VARCHAR(50),
            locations VARCHAR(50),
            blood VARCHAR(50),
            actions VARCHAR(30) DEFAULT 'active',
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");

          $this->conn->exec("CREATE TABLE IF NOT EXISTS finddonortable (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              phonenumber VARCHAR(30) NOT NULL,
              locationfind VARCHAR(50),
              bloodselect VARCHAR(50),
              reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )");

          echo "Tables created successfully";
      } catch(PDOException $e) {
          echo "Error creating tables: " . $e->getMessage();
      }
  }
}

new Table();
?>
