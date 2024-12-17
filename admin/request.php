<?php
// Include the database connection
require ("../lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query to get the count of records in finddonortable
    $stmt = $pdo->prepare("SELECT * FROM finddonortable"); // Replace 'finddonortable' with your table name
    $stmt->execute();

    // Fetch all data
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if the results are empty
    if ($results === false) {
        echo "Error: No data found or query failed!";
    } else {
        // Display the number of records for debugging
        echo "Found " . count($results) . " records.";
    }

    // Prepare the query to get the count of users
    $stmtCount = $pdo->prepare("SELECT COUNT(*) as user_count FROM finddonortable");
    $stmtCount->execute();
    $resultCount = $stmtCount->fetch(PDO::FETCH_ASSOC);
    $userCount = $resultCount['user_count'];

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/d23efd4b93.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header style="margin-right: 77px;"><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                       class="brand-logo"><i
                    class="fas fa-anchor"></i> <span>BRAND</span></a></header>
            <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                Home </a><a
                    href="dashboard.php" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a><div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i>Registration </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                                class="dashboard-nav-dropdown-item">All</a><a
                            href="donor.php" class="dashboard-nav-dropdown-item">Donor Registration</a><a
                            href="request.php" class="dashboard-nav-dropdown-item"> Request form</a>
                    </div>
                </div>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a
                        href="adminprofile.html" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
              <div class="nav-item-divider"></div>
              <a
                        href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar d-flex justify-content-between pe-5'>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <button type="button" class="btn position-relative">
                    <i class="fa-regular fa-bell" style="color: #c7d0e1;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo $userCount; ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </header>

            <div class='dashboard-content baggroundcolorarrange marginadjust'>
                <div class='container baggroundcolorarrange'>
                    <p class="ms-5 textarrangement">Donor Request Admin Page</p>
                    <div class="ms-5 mt-1 bagr">
                        <symbol id="check" viewBox="0 0 16 16">
                          <title>Check</title>
                          <!-- <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path> -->
                        </symbol>
                        <main>
                            <div style="padding: 10px;">
                          <table class="table table-striped table-hover table-borderless w-100 col-12 rounded-4 overflow-hidden" id="index">
                            <thead>
                              <tr>
                                  <th>Location</th>
                                  <th>Blood Group</th>
                                  <th>Mobile Number</th>
                                
                              </tr>
                            </thead>
                            <tbody>
    <?php 
    if (!empty($results)) {
        foreach ($results as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['locationfind']); ?></td>
                <td><?php echo htmlspecialchars($row['bloodselect']); ?></td>
                <td><?php echo htmlspecialchars($row['phonenumber']); ?></td>
               
              
            </tr>
        <?php endforeach; 
    } else {
        echo "<tr><td colspan='5'>No data available</td></tr>";
    }
    ?>
</tbody>

                          </table>
                          </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/datatables.min.js"></script>
    
    <script>
        const ready = (fn) => {
            if (document.readyState !== "loading") {
                fn();
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        };
        
        ready(() => {
            let table = new DataTable("#index", {
                paging: true,
                autoWidth: true,
                responsive: true,
                destroy: true,
                deferRender: true,
                searching: true,
                ordering: true
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>const mobileScreen = window.matchMedia("(max-width: 990px )");
    $(document).ready(function () {
        $(".dashboard-nav-dropdown-toggle").click(function () {
            $(this).closest(".dashboard-nav-dropdown")
                .toggleClass("show")
                .find(".dashboard-nav-dropdown")
                .removeClass("show");
            $(this).parent()
                .siblings()
                .removeClass("show");
        });
        $(".menu-toggle").click(function () {
            if (mobileScreen.matches) {
                $(".dashboard-nav").toggleClass("mobile-show");
            } else {
                $(".dashboard").toggleClass("dashboard-compact");
            }
        });
    });</script>
</body>
</html>
