<?php
// Include the database connection
require("./lib/db/conn.php");

try {
    // Get the blood type from the query parameters
    $bloodselect = isset($_GET['type']) ? $_GET['type'] : '';

    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query to fetch details
    $stmt = $pdo->prepare("SELECT * FROM finddonortable WHERE bloodselect = :bloodselect");
    $stmt->bindParam(':bloodselect', $bloodselect, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch all details
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the details
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/d23efd4b93.js" crossorigin="anonymous"></script>
        <link href="css/main.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Blood Donor Details</title>
        <style>
            body {
                background-color: #fff1f1;
            }

            .navbar {
                background-color: white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .donor-card {
                background-color: white;
                border: 1px solid #dee2e6;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .donor-card:hover {
                transform: scale(1.05);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            }

            .donor-card h5 {
                color: #dc3545;
            }

            .footer {
                background-color: white;
                color: #333;
                padding: 20px 0;
                border-top: 2px solid #dc3545;
            }

            .footer a {
                color: #dc3545;
                text-decoration: none;
                margin-right: 15px;
            }

            .footer a:hover {
                text-decoration: underline;
            }

            .social-icons img {
                height: 30px;
                margin: 0 10px;
                transition: transform 0.3s;
            }

            .social-icons img:hover {
                transform: scale(1.2);
            }
        </style>
    </head>
    <body>
  

    <?php
  require("./header.php")
  ?>

    <div class="container my-5" style="height: 100vh;">
        <?php if (!empty($details)): ?>
            <h1 class="text-center mb-4">Donors for Blood Type: <span class="text-danger"><?= htmlspecialchars($bloodselect) ?></span></h1>
            <div class="row">
                <?php foreach ($details as $detail): ?>
                    <div class="col-md-4 mb-4">
                        <div class="donor-card p-3">
                            <h5 class="mb-3">Blood Type: <?= htmlspecialchars($detail['bloodselect']) ?></h5>
                            <p><strong>Contact:</strong> <?= htmlspecialchars($detail['phonenumber']) ?></p>
                            <p><strong>Location:</strong> <?= htmlspecialchars($detail['locationfind']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <p class="alert alert-warning">No donors found for blood type <strong><?= htmlspecialchars($bloodselect) ?></strong>.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="container-fluid bgcolorapply">
<div class="row pt-5">
  <div class="col">
  <div class="row">
<div class="col col-sm-3 col-md-3 col-lg-3 col-xl-3"></div>
<div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6 footertext">

  <a class="navbar-brand" href="#">About Us</a>
  <a class="navbar-brand" href="#">FAQ</a>
  <a class="navbar-brand" href="#">Privacy Policy</a>
  <a class="navbar-brand" href="#">Contact Us</a>

</div>
<div class="col col-sm-3 col-md-3 col-lg-3 col-xl-3"></div>
<div class="col-12 col-sm-12 col-xl-12 text-center">
  <img src="images/sm_5af2d4cabfdf2-removebg-preview.png"/>
  <img src="images/twitter-icon-white-transparent-11549537259z0sowbg17j-removebg-preview.png"/>
</div>


</div>
</div>







</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-dXnBUOKFV5zPdmrL3KDntQ+zhDO3uALByBthfWrHIcG6mwDWlzQ0gvXMF92qJb1S" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
