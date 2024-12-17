<?php
 require "../../lib/db/conn.php";

if (isset($_POST['submit'])) {
    $phonenumber = $_POST['phonenumber'];
    $locationfind = $_POST['locationfind'];
    $bloodselect = $_POST['bloodselect'];

    try {
       
      $conn = new DatabaseConnection();

       
        $conn->dbconn();
        $stmt = $conn->conn->prepare("INSERT INTO finddonortable (phonenumber, locationfind, bloodselect) 
                                      VALUES (:phonenumber, :locationfind, :bloodselect)");

        $stmt->bindParam(':phonenumber', $phonenumber);
        $stmt->bindParam(':locationfind', $locationfind);
        $stmt->bindParam(':bloodselect', $bloodselect);

        if ($stmt->execute()) {
            header("Location: ../../search.php");
            exit;
        }
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn->conn = null;
}
?>
