<?php
// Include the database connection
require("./lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM finddonortable"); // Replace 'finddonortable' with your actual table name
    $stmt->execute();

    // Fetch all data
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    <script src="https://kit.fontawesome.com/d23efd4b93.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
</head>
<body>
<?php
  require("./header.php")
  ?>
    <div class="container my-5">
    <h1 class="text-center text-danger mb-4">Donor Details</h1>
    <?php if (!empty($results)) : ?>
        <div class="row g-4">
            <?php foreach ($results as $row) : ?>
                <div class="col-md-6 col-xl-4">
                    <div class="card shadow-sm border-0">
                        <div class="row g-0 align-items-center">
                            <!-- Image section -->
                            <div class="col-md-4 text-center p-3">
                                <img src="images/Group 56.png" alt="Profile Icon" 
                                    class="rounded-circle border border-danger p-2" 
                                    style="width: 60px;">
                            </div>
                            <!-- Details section -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-danger fw-bold">
                                        <?php echo htmlspecialchars($row['locationfind']); ?>
                                    </h5>
                                    <p class="card-text mb-2">
                                        <strong>Blood Group:</strong> 
                                        <span class="text-primary"><?php echo htmlspecialchars($row['bloodselect']); ?></span>
                                    </p>
                                    <p class="card-text">
                                        <strong>Phone:</strong> 
                                        <span class="text-dark"><?php echo htmlspecialchars($row['phonenumber']); ?></span>
                                    </p>
                                    <a href="tel:<?php echo htmlspecialchars($row['phonenumber']); ?>" 
                                        class="btn btn-outline-danger btn-sm">
                                        Call Donor
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-warning text-center" role="alert">
            No donors found.
        </div>
    <?php endif; ?>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AY9q0BLaRXA2xHAeQOf/nC9+jI9z" crossorigin="anonymous"></script>
</body>
</html>
