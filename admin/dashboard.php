<?php
// Include the database connection
require("../lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    $pdo = $db->conn;

    // Prepare and execute the query to get the count of records in finddonortable
    $stmts = $pdo->prepare("SELECT * FROM myguests"); // Replace 'finddonortable' with your table name
    $stmts->execute();

    // Fetch all data
    $results = $stmts->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and execute the query to count active and inactive users
    $stmt = $pdo->prepare("
        SELECT 
            SUM(CASE WHEN actions = 'active' THEN 1 ELSE 0 END) AS active_count,
            SUM(CASE WHEN actions = 'inactive' THEN 1 ELSE 0 END) AS inactive_count
        FROM myguests
    ");
    $stmt->execute();

    // Fetch the counts
    $counts = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the counts as a JSON object
    echo "<script>
    var active_count = " . $counts['active_count'] . ";
    var inactive_count = " . $counts['inactive_count'] . ";
</script>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
  // Use the existing connection
  $pdo = $db->conn;

  // Query to get donate counts grouped by reg_date
  $donorStmt = $pdo->prepare("
      SELECT reg_date, COUNT(id) AS no_of_rows 
      FROM myguests
      GROUP BY reg_date
      ORDER BY reg_date;
  ");
  $donorStmt->execute();
  $donors = $donorStmt->fetchAll(PDO::FETCH_ASSOC);

  // Query to get request counts grouped by reg_date
  $requestStmt = $pdo->prepare("
      SELECT reg_date, COUNT(id) AS no_of_rows 
      FROM finddonortable
      GROUP BY reg_date
      ORDER BY reg_date;
  ");
  $requestStmt->execute();
  $requesters = $requestStmt->fetchAll(PDO::FETCH_ASSOC);

  
  $donateCounts = array_count_values(array_map(function($donor) {
      return date('M', strtotime($donor['reg_date']));
  }, $donors));

  $requestCounts = array_count_values(array_map(function($requester) {
      return date('M', strtotime($requester['reg_date']));
  }, $requesters));

  $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  $donateData = array_map(fn($month) => $donateCounts[$month] ?? 0, $months);
  $requestData = array_map(fn($month) => $requestCounts[$month] ?? 0, $months);

  $chartData = [
      'categories' => $months,
      'series' => [
          'donate' => $donateData,
          'request' => $requestData,
      ]
  ];

  echo "<script>
  var chartData = " . json_encode($chartData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) . ";
  </script>";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

try {
  // Use the existing connection
  $pdo = $db->conn;

  // Query to get donate counts grouped by reg_date
  $donorStmtss = $pdo->prepare("
      SELECT reg_date, COUNT(id) AS no_of_rows 
      FROM myguests
      GROUP BY reg_date
      ORDER BY reg_date;
  ");
  $donorStmtss->execute();
  $donorsss = $donorStmtss->fetchAll(PDO::FETCH_ASSOC);

  // Query to get request counts grouped by reg_date
  $requestStmtss = $pdo->prepare("
      SELECT reg_date, COUNT(id) AS no_of_rows 
      FROM finddonortable
      GROUP BY reg_date
      ORDER BY reg_date;
  ");
  $requestStmtss->execute();
  $requestersss = $requestStmtss->fetchAll(PDO::FETCH_ASSOC);

  // Collect all unique categories (dates) from both tables
  $allDates = array_merge(
      array_column($donorsss, 'reg_date'),
      array_column($requestersss, 'reg_date')
  );
  sort($allDates); // Ensure dates are sorted

  // Prepare series data by aligning with all dates
  $donateData = [];
  $requestData = [];

  foreach ($allDates as $date) {
      $donateCount = 0;
      foreach ($donorsss as $donor) {
          if ($donor['reg_date'] === $date) {
              $donateCount = $donor['no_of_rows'];
              break;
          }
      }
      $donateData[] = $donateCount;

      $requestCount = 0;
      foreach ($requestersss as $requester) {
          if ($requester['reg_date'] === $date) {
              $requestCount = $requester['no_of_rows'];
              break;
          }
      }
      $requestData[] = $requestCount;
  }

  $chartDatass = [
      'categories' => $allDates,
      'series' => [
          [
              'name' => 'Donated',
              'data' => $donateData,
          ],
          [
              'name' => 'Requested',
              'data' => $requestData,
          ],
      ],
  ];

  echo "<script>
  var chartDatavailable = " . json_encode($chartDatass, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) . ";
  </script>";
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
                    href="dashboard.html" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a>
           
                
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i>Registration </a>
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
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content baggroundcolorarrange'>

            
                <div class='container baggroundcolorarrange'>
                  <div class="row ">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                    <div class="row gy-4">
                    <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 pt-3 pb-3 rounded-3 bagroundcoloursetting">
                    <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 text-center">
                        <i class="fa-solid fa-user fontsizearrange" style="color: #0080ff;"></i>
                        <p class="toptextarrangement mt-3">Total Donors : 3000</p>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 text-center">
                      <i class="fa-solid fa-handshake fontsizearrange" style="color:#0080ff;"></i>
                        <p class="toptextarrangement pt-3">Available Donors : 3000</p>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 text-center">
                      <i class="fa-solid fa-user-plus fontsizearrange" style="color:#0080ff;"></i>
                        <p class="toptextarrangement pt-3">Requested Donors : 3000</p>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 text-center">
                      <i class="fa-solid fa-building-circle-arrow-right fontsizearrange" style="color: #0080ff;"></i>
                        <p class="toptextarrangement pt-3">Distributed Units : 3000</p>
                    </div>
                </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="row g-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6 col-xxl-6 ps-0 text-center">
                      <div class="boxescoloursetting rounded-3 p-2">
                    <p class="textarrangement pt-3">TOTAL DONORS</p>
                    <div id="radialhighchart"></div>
                    </div>
                  </div>

                    <div class="col-12 col-lg-5 col-xl-6 col-xxl-6 text-center rounded-3 pe-0">
                      <div class="boxescoloursetting p-2 rounded-3">
                        <p class="textarrangement pt-3">DISTRICT REGISTRATIONS</p>
                        <div id="barchart"></div>
                        </div>
                      </div>

                    </div>
                    </div>


                    
                    <div class="col col-xl-12 boxescoloursetting rounded-3 text-center">
                      <p class="textarrangement pt-3">Requested / Donated Blood units</p>
                    <div id="linechart"></div>
                  </div>

                    </div>

                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
                    <div class="color px-4 py-3 rounded-3">
                      <div class="text-center">
                    <p class="textarrangement">Send Notification</p>
                  </div>
                    <div class="row">
                     
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                      
                        <label for="exampleDataList" class="form-label secondtextcolor">Blood Type</label>
                        <input class="form-control bg-colorsetting" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                          <option value="A+">
                          <option value="A-">
                          <option value="B+">
                          <option value="B-">
                          <option value="O+">
                          <option value="O-">
                          <option value="AB+">
                          <option value="AB-">
                        </datalist>
                    </div>
                  </div>
                  
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        
                            <label for="exampleDataList" class="form-label secondtextcolor mt-2">Location</label>
                            <input type="text" class="form-control bg-colorsetting" placeholder="Search ......" aria-label="Recipient's username">
                           
                      </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-2">
                  <label for="exampleDataList" class="form-label secondtextcolor mt-2">Comments</label>
                    <textarea class="form-control mt-2 bg-colorsetting" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3 text-center">
                <button class="btn btn-primary colorsetting" type="submit">Submit form</button>
            </div>
                    </div>
                   

               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center mt-5 px-4 pb-5 rounded-3 boxescoloursetting">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                <p class="textarrangement">New Registration</p>
                <div class="card boxescoloursetting" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-5 ps-3">
                      <img src="imagres/alfina.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                      <div class="card-body">
                        <h5 class="card-title textcolour">Elsa Theresa</h5>
                        <p class="card-text secondtextcolor">Blood Type : A+</p>
                        <p class="card-text secondtextcolor">Location : Delhi</p>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                  
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card boxescoloursetting mt-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-5 ps-3">
                      <img src="imagres/alfina.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                      <div class="card-body">
                        <h5 class="card-title textcolour">Elsa Theresa</h5>
                        <p class="card-text secondtextcolor">Blood Type : A+</p>
                        <p class="card-text secondtextcolor">Location : Delhi</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                
 

              </div>
               </div>



                  </div>

              


                  </div>
                </div>
            </div>
        </div>
    </div>
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


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


  <script>
        
        var optionsradial = {
    series: [active_count, inactive_count],
    chart: {
        height: 300,
        type: 'radialBar',
        offsetX: -50,
    },
    fill: {
        type: 'solid',
        colors: ['#ee3158', '#ffa800', '#3246D3']
    },
    legend: {
        show: true,
        position: 'right',
        floating: true,
        horizontalAlign: 'left',
        verticalAlign: 'center',
        align: 'center',
        offsetX: -145,
        offsetY: 10,
        width: 200,
        markers: {
            width: 30,
            height: 30,
            strokeWidth: 0,
            radius: 0,
            offsetX: 0,
            offsetY: 0,
        },
    },
    plotOptions: {
        radialBar: {
            track: {
                background: '#fff'
            },
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Total',
                    formatter: function (w) {
                        return active_count + inactive_count;
                    }
                }
            }
        }
    },
    labels: ['Active', 'Inactive'],
};

// Render the radial chart
var chartradial = new ApexCharts(document.querySelector("#radialhighchart"), optionsradial);
chartradial.render();

      
  </script>

<script>
    // Assuming `chartData` is defined by the PHP script
    console.log(chartData);

    var districtchart = {
        series: [
            {
                name: 'Request',
                data: chartData.series.request, // Use dynamic request data
            },
            {
                name: 'Donate',
                data: chartData.series.donate, // Use dynamic donate data
            },
        ],
        chart: {
            type: 'bar',
            height: 263,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent'],
        },
        xaxis: {
            categories: chartData.categories, // Use dynamic categories
        },
        yaxis: {
            title: {
                text: 'Counts',
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " counts";
                },
            },
        },
    };

    var barcharts = new ApexCharts(document.querySelector("#barchart"), districtchart);
    barcharts.render();
</script>



<script>
document.addEventListener("DOMContentLoaded", function () {
    var chartDatakk = window.chartDatavailable;

    console.log("Chart Data:", chartDatakk); // Debugging

    var linechartse = {
        series: chartDatakk.series,
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: chartDatakk.categories, // Use the categories from PHP
        },
        tooltip: {
            x: {
                format: "yyyy-MM-dd HH:mm:ss", // Match the format in your data
            },
        },
    };

    var linecharts = new ApexCharts(
        document.querySelector("#linechart"),
        linechartse
    );
    linecharts.render();
});

</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>