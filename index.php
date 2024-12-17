
<?php
// Include the database connection
require("./lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM finddonortable"); // Replace 'myguests' with your actual table name
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
    <title>Document</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
    
</head>
<body>

   <!-- nav start -->
<?php
  require("./header.php")
  ?>
<!-- nav end -->

<!-- banner start -->

<div class="container-fluid px-5" style="background: linear-gradient(to right, white, #ffe5e5);">
<div class="row px-5">
<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-6 col-xxl-6 d-flex align-items-center mt-5s">
  <div
    class="position-relative p-5 rounded-4  overflow-hidden"
    style="z-index: 1;height:554px;"
  >
    <!-- Background Decorative Elements -->
    <div
      class="position-absolute top-0 start-0 rounded-circle"
      style="width: 150px; height: 150px; background: linear-gradient(135deg, #ff6f61, #ff9671); opacity: 0.2; z-index: -1;"
    ></div>
    <div
      class="position-absolute bottom-0 end-0 rounded-circle"
      style="width: 200px; height: 200px; background: linear-gradient(135deg, #ff6f61, #ff9671); opacity: 0.1; z-index: -1;"
    ></div>
    <div
      class="position-absolute bottom-50 end-50 translate-middle"
      style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff9671, #ffcccb); border-radius: 50%; opacity: 0.3; z-index: -1;"
    ></div>

    <!-- Image with max-width -->
    <div class=" text-center">
      <img
        class="img-fluid rounded-circle border border-4 border-danger"
        src="https://i.pinimg.com/736x/3c/20/a1/3c20a16bccae26d05a27243f9259b86e.jpg"
        alt="Blood Bank Banner"
        style="max-width: 42%;"
      />
    </div>

    <!-- Content -->
    <div class="position-relative text-center">
      <h2 class="fw-bold text-danger mb-4">Give the Gift of Life</h2>
      <p class="text-secondary fs-5 mb-4">
        Your blood donation can save lives. Join the movement and be a hero
        for those in need.
      </p>
      <button class="btn btn-danger btn-lg rounded-pill px-4">
        Become a Donor
      </button>
    </div>

    
  </div>
</div>





<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6 col-xxl-6 pt-5 pb-5">
    <nav>
        <div class="nav nav-tabs ms-5 me-5" id="nav-tab" role="tablist">
            <button class="nav-link active rounded-0 rounded-top-4 bloodtab-btn" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">FIND DONOR</button>
            <button class="nav-link  rounded-0 rounded-top-4 bloodtab-btn2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">DONATE NOW</button>
           
        </div>
    </nav>
    <div class="tab-content">
        <div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="col py-5 ps-4 pe-4 rounded-5 border border-success border-opacity-10 form">
              <form action="lib/inset/finddonor.php" method="post" id="findDonorForm">
                <div class="col text-center">
                <h4 class="text1">REQUEST FORM</h4>
              </div>
              
                <div class="col mb-3 mt-5 ps-3 pe-3">
                  <label for="exampleInputEmail1" class="form-label fontstype">Phone Nmber</label>
                  <input type="text" class="form-control formarrangement" id="exampleInputEmail1" aria-describedby="emailHelp" name="phonenumber">
                  
                </div>
                <div class="mb-3 ps-3 pe-3">
                  <label for="exampleInputPassword1" class="form-label fontstype">location</label>
                  <input type="password" class="form-control formarrangement" id="exampleInputPassword1" name="locationfind">
                </div>
                <div class="row align-item-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6  mt-4 d-flex ps-3 justify-content-around">
            

                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'A+')">A+
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="A+">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>

                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'A-')">A-
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="A-">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                  
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'B+')">B+
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="B+">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                  
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'B-')">B-
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="B-">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
               
                  </div>
                  
                   
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4 d-flex pe-4 justify-content-around">
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'O+')">O+
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="O+">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                  
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'O-')">O-
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="O-">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                 
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'Ab+')">Ab+
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="Ab+">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                  
                  <button type="button" class="btn btn-light buttonsselect btntick ss" onclick="selectBloodGroups(this, 'Ab-')">Ab-
                    <label class="custom-radio">
                      <input type="radio" name="bloodselect"  value="Ab-">
                      <span class="radio-btn"><i class="las la-check butn">
                        </i>
                  </button>
                </div>
                
              </div>
              <div class="d-grid gap-2 pt-4 px-3">
                <button class="btn formarrangement colourselect submitbtn" type="submit" name="submit" style="background-color: #dc3545;">Submit</button>
                </div>
              </form>
             
            </div>
            </div> 

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              
              <div class="col py-5 ps-4 pe-4 rounded-5 border border-success border-opacity-10 form">
                <form id="donationForm">
                  <div class="col text-center">
                  <h4 class="text1">DONATION CONSENT FORM</h4>
                </div>
                
                  <div class="col mb-3 mt-5 ps-3 pe-3">
                    <label for="exampleInputEmail1" class="form-label fontstype">NAME</label>
                    <input type="text" class="form-control formarrangement" id="exampleInputEmail1" aria-describedby="emailHelp" name="fullname">
                    
                  </div>
                  <div class="mb-3 ps-3 pe-3">
                    <label for="exampleInputPassword1" class="form-label fontstype">PHONE NUMBER</label>
                    <input type="password" class="form-control formarrangement" id="exampleInputPassword1" name="phoneno">
                  </div>
                  <div class="row">
                    <div class="col ps-4 pe-4">
                      <label for="exampleInputPassword1" class="form-label fontstype">DATE</label>
                      <input type="date" class="form-control formarrangement" placeholder="MM/DD/YYY" name="datebirth">
                    </div>
                    <div class="col ps-4 pe-4">
                       <label for="exampleInputPassword1" class="form-label fontstype">LOCATION</label>
                       <input type="password" class="form-control formarrangement" id="exampleInputPassword1" name="locations">
                       
                    </div>
                  </div>
                  <div class="row align-item-center">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6  mt-4 d-flex px-0 justify-content-around">
              
  
                    <button type="button" class="btn btn-light buttonsselect btntick"  onclick="selectBloodGroup(this, 'A+')">A+
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="A+">

                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
  
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'A-')">A-
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="A-" >
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                    
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'B+')">B+
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="B+" >
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                    
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'B-')">B-
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="B-">
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                 
                    </div>
                    
                     
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4 d-flex px-0 justify-content-around">
                    <button type="button" class="btn btn-light buttonsselect btntick"onclick="selectBloodGroup(this, 'O+')">O+
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="O+">
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>

                    
                    
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'O-')">O-
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="O-">
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                   
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'Ab+')">Ab+
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="AB+">
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                    
                    <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'Ab-')">AB-
                      <label class="custom-radio">
                        <input type="radio" name="blood" value="AB-">
                        <span class="radio-btn"><i class="las la-check butn">
                          </i>
                    </button>
                  </div>
                  
                </div>
                <div class="d-grid gap-2 pt-4">
                  <button class="btn formarrangement colourselect submitbtn" type="submit" name="submit" style="background-color: #dc3545;">Submit</button>
                  </div>
                </form>
                <span id="emailval"></span>
               
              </div>
          </div>
        </div>
    </div>
    </div>
</div>
</div>

<!-- banner end -->

<!-- banner secon part start -->

<div class="container-fluid pt-5 pb-5" style="background: linear-gradient(to right, #ffe5e5, white);">
    <div class="row">
        <div class="col text-center">
            <div class="heading">
                <h1 class="text"><span class="coulour">BLOOD</span>NEEDED</h1>
            </div>
            <div class="d-flex justify-content-evenly mt-5">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme">
                        <!-- Blood Type A+ -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('A+')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">A+</h1>
                            </div>
                        </div>
                        <!-- Blood Type A- -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('A-')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">A-</h1>
                            </div>
                        </div>
                        <!-- Blood Type B+ -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('B+')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">B+</h1>
                            </div>
                        </div>
                        <!-- Blood Type B- -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('B-')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">B-</h1>
                            </div>
                        </div>
                        <!-- Blood Type O+ -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('O+')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">O+</h1>
                            </div>
                        </div>
                        <!-- Blood Type O- -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('O-')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">O-</h1>
                            </div>
                        </div>
                        <!-- Blood Type Ab+ -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('Ab+')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">Ab+</h1>
                            </div>
                        </div>
                        <!-- Blood Type Ab- -->
                        <div class="item">
                            <div class="boxarrangement rounded-4 pt-3 pb-3" onclick="redirectToDetails('Ab-')">
                                <img class="imageblood ms-5 ps-3 pb-2" src="images/Path 1.png" />
                                <h1 class="textcolour">Ab-</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner secon part start heading end -->

<!-- third part heading start -->

<div class="container-fluid" style="background: linear-gradient(to right, white, #ffe5e5);">
  <div class="row">
    <div class="col pt-5 pt-sm-5 pt-md-5 pt-lg-5 pt-xl-5 pt-xxl-5 text-center">
      <h1 class="text">WHY DONATE<span class="coulour"> BLOOD</span></h1>
    </div>
  </div>
  </div>
<!-- third part heading end -->


<!-- third main part start -->

<div style="background: linear-gradient(to right, white, #ffe5e5); padding: 50px 20px; position: relative;">
  <!-- Decorative Circle (Top-Left) -->
  <div style="position: absolute; top: 20px; left: 20px; width: 80px; height: 80px; background: rgba(255, 0, 0, 0.1); border-radius: 50%; z-index:9"></div>
  
  <!-- Decorative Circle (Bottom-Right) -->
  <div style="position: absolute; bottom: 20px; right: 20px; width: 100px; height: 100px; background: rgba(255, 0, 0, 0.2); border-radius: 50%;"></div>
  
  <div class="row" style="display: flex; align-items: center; flex-wrap: wrap; position: relative; z-index: 2;">

    <!-- Left Column (Hidden on smaller screens) -->
    <div style="flex: 1; text-align: center; display: none; padding: 20px; background: linear-gradient(to right, white, #fff1f1)" class="d-lg-block">
  <!-- Blood Bank Logo -->
  <div style="margin-bottom: 30px;">
    <img src="images/Group 56.png" alt="Blood Bank Logo" style="width: 100px; border-radius: 50%; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
  </div>

  <!-- Blood Donation Tagline -->
  <h3 style="color: #dc3545; font-weight: bold; margin-bottom: 20px;">Donate Blood, Save Lives</h3>
  <p style="color: #6c757d; font-size: 0.9rem; line-height: 1.6;">
    Your contribution can make a life-changing impact. Join our mission to ensure safe and sufficient blood for all.
  </p>

  
</div>


    <!-- Right Column -->
    <div style="flex: 1; padding: 20px;">
      <!-- Section 1 -->
      <div style="display: flex; align-items: start; margin-bottom: 40px; position: relative;">
        <div style="position: absolute; top: -10px; left: -20px; width: 30px; height: 30px; background: #ffe5e5; border-radius: 50%; z-index: -1;"></div>
        <img src="images/OA_Group_Challenge_red-removebg-preview.png" alt="Group Challenge" 
             style="width: 100px; height: auto; border-radius: 8px; margin-right: 20px;">
        <div>
          <h4 style="font-weight: bold; color: #dc3545; margin-bottom: 10px;">Community Support</h4>
          <p style="color: #6c757d; margin: 0; line-height: 1.6;">
            Blood donation is a way to give back to your community and support those in need. 
            It's a simple yet powerful way to make a positive difference in the world around you.
          </p>
        </div>
      </div>

      <!-- Section 2 -->
      <div style="display: flex; align-items: start; margin-bottom: 40px; position: relative;">
        <div style="position: absolute; top: -10px; left: -20px; width: 30px; height: 30px; background: #ffe5e5; border-radius: 50%; z-index: -1;"></div>
        <img src="images/500_F_274635757_55hmmuoz8PKQKvPdTRq8dazCxtbWpnyl-removebg-preview (3).png" alt="Health Benefits" 
             style="width: 100px; height: auto; border-radius: 8px; margin-right: 20px;">
        <div>
          <h4 style="font-weight: bold; color: #dc3545; margin-bottom: 10px;">Health Benefits</h4>
          <p style="color: #6c757d; margin: 0; line-height: 1.6;">
            Regular blood donations can help improve your health and well-being while supporting those in need.
          </p>
        </div>
      </div>

      <!-- Section 3 -->
      <div style="display: flex; align-items: start; position: relative;">
        <div style="position: absolute; top: -10px; left: -20px; width: 30px; height: 30px; background: #ffe5e5; border-radius: 50%; z-index: -1;"></div>
        <img src="images/noun-fitness-update-removebg-preview.png" alt="Fitness Update" 
             style="width: 100px; height: auto; border-radius: 8px; margin-right: 20px;">
        <div>
          <h4 style="font-weight: bold; color: #dc3545; margin-bottom: 10px;">Fitness & Well-being</h4>
          <p style="color: #6c757d; margin: 0; line-height: 1.6;">
            Engage in an impactful act of kindness while also staying connected to your community's health needs.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- banner start -->

<div class="container-fluid bgcolorapply" style="height: 150px;">
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
  <img src="images/sm_5af2d4cabfdf2-removebg-preview.png" style="height: 50px;"/>
  <img src="images/twitter-icon-white-transparent-11549537259z0sowbg17j-removebg-preview.png" style="height: 30px;"/>
</div>


</div>
</div>







</div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
    <script>

      $('.owl-carousel').owlCarousel({
        loop:true,
        margin: 10,
        nav: true,
        navText: [
          "<i class='fa fa-caret-left'></i>",
          "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      })


      $("#donationForm").submit( function(e){
        e.preventDefault()

var values = $(this).serialize();
console.log(values);

$.ajax({
   url: "lib/inset/insert.php",
   type: "post",
   data: values ,
   success: function (response) {
console.log(response)

document.getElementById("emailval").innerHTML=response
      // You will get response from your PHP page (what you echo or print)
   },
   error: function(jqXHR, textStatus, errorThrown) {
     // console.log(textStatus, errorThrown);
   }
});
})


function selectBloodGroups(button, group) {
    // Remove 'selected' class from all buttons
    document.querySelectorAll('.ss').forEach(btn => btn.classList.remove('selected'));

    // Add 'selected' class to the clicked button
    button.classList.add('selected');

    // Select the radio button with the matching value and set it as checked
    const input = document.querySelector(`input[name="bloodselect"][value="${group}"]`);
    if (input) {
        input.checked = true;
    } else {
        console.error(`No input found for blood group "${group}"`);
    }
}

function selectBloodGroup(button, bloodType) {
    document.querySelectorAll('.btntick').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
    document.querySelector(`input[name="blood"][value="${bloodType}"]`).checked = true;
}

      
        </script>

<script>
        function redirectToDetails(bloodType) {
            window.location.href = `blood-details.php?type=${encodeURIComponent(bloodType)}`;
        }
    </script>
    
     
</body>
</html>