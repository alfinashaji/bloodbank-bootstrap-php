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
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                       class="brand-logo"><i
                    class="fas fa-anchor"></i> <span>BRAND</span></a></header>
            <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                Home </a><a
                    href="dashboard.html" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a>
              
              
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-money-check-alt"></i>Registration</a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                                class="dashboard-nav-dropdown-item">All</a><a
                            href="donor.html" class="dashboard-nav-dropdown-item">Donor Registration</a><a
                            href="request.html" class="dashboard-nav-dropdown-item">Request form</a>
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
            <header class='dashboard-toolbar d-flex justify-content-between pe-5'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
              <button type="button" class="btn position-relative">
                <i class="fa-regular fa-bell" style="color: #c7d0e1;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            
            
            
            
            
            </header>

            
            <div class='dashboard-content baggroundcolorarrange marginadjust'>
                <div class='container baggroundcolorarrange'>
                  <p class="ms-5 textarrangement">Admin Profile page</p>
                  <div class=" ms-5 mt-1 bagr">
                    <div class="container-xl px-4">
                        <!-- Account page navigation-->
                        
                        <hr class="mt-0 mb-4">
                        <div class="row py-4">
                            <div class="col-xl-4">
                               
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0 h-75">
                                    
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-5 mt-5" src="imagres/alfina.png" alt="">
                                        <!-- Profile picture help block-->
                                      
                                    </div>
                                
                            </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4 h-100">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form>
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (organization name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputOrgName">Password</label>
                                                    <input class="form-control" id="inputOrgName" type="text" placeholder="Enter the password" value="1234567">
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Enter the password Again </label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Reenter the password" value="1234567">
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="1234567">
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                                                </div>
                                                <!-- Form Group (birthday)-->
                                                
                                            </div>
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="button">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      </div>
                 <!-- container end -->
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

    
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                
                
                 
                            
                      
              
                           





      
</body>
</html>