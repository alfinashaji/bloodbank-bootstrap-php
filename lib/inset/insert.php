<?php
require "../../lib/db/conn.php";

// Capture form data
$fullname = $_POST['fullname'];
$phoneno = $_POST['phoneno'];
$datebirth = $_POST['datebirth'];
$locations = $_POST['locations'];
$blood = $_POST['blood'];

echo $fullname . $phoneno . $datebirth . $locations . $blood;

try {
    $conn = new DatabaseConnection();
    $conn->dbconn();

    // Update actions to 'inactive' if older than 5 minutes
    $updateQuery = "UPDATE MyGuests 
                    SET actions = 'inactive' 
                    WHERE actions = 'active' 
                    AND TIMESTAMPDIFF(MINUTE, reg_date, NOW()) >= 1";
    $conn->conn->exec($updateQuery);

    // Insert query
    $stmt = $conn->conn->prepare("INSERT INTO MyGuests (fullname, phoneno, datebirth, locations, blood) 
                                  VALUES (:fullname, :phoneno, :datebirth, :locations, :blood)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':phoneno', $phoneno);
    $stmt->bindParam(':datebirth', $datebirth);
    $stmt->bindParam(':locations', $locations);
    $stmt->bindParam(':blood', $blood);

    if ($stmt->execute()) {
        echo "New record created successfully";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn->conn = null;
?>
