<?php
// Include the database connection
require("./lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM myguests"); // Replace 'your_table_name' with your actual table name
    $stmt->execute();

    // Fetch all data
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the data
   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
