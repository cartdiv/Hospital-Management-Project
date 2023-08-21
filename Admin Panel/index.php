<?php 
  require_once 'auth.php';
  

  $sql="SELECT * from `admin` order by `username` desc";
  $res=mysqli_query($con,$sql);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
    />
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>

    <title>
      Admin Dashboard
    </title>

    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:400,600,700"
      rel="stylesheet"
    />
    <link
      href="bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css" />
    <link
      href="assets/css/dashboard/dash_1.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  </head>
  <body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
      <div class="loader">
        <div class="loader-content">
          <div class="spinner-grow align-self-center"></div>
        </div>
      </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item theme-brand flex-row text-center">
          <li class="nav-item theme-logo">
            <!-- <a href="index.html">
              <img src="assets/img/logo.svg" class="navbar-logo" alt="logo" />
            </a> -->
          </li>
          <li class="nav-item theme-text">
            <a href="#" class="nav-link"> Admin Panel </a>
          </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">
          <li class="nav-item dropdown user-profile-dropdown">
            <a
              href="javascript:void(0);"
              class="nav-link dropdown-toggle user"
              id="userProfileDropdown"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="true"
            >
              Hi, <?php echo $_SESSION['username'] ?>
            </a>
            <div
              class="dropdown-menu position-absolute"
              aria-labelledby="userProfileDropdown"
            >
              <div class="">
                <div class="dropdown-item">
                  <a class="" href="logout.php"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-log-out"
                    >
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Sign Out</a
                  >
                </div>
              </div>
            </div>
          </li>
        </ul>
      </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
      <header class="header navbar navbar-expand-sm">
        <a
          href="javascript:void(0);"
          class="sidebarCollapse"
          data-placement="bottom"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-menu"
          >
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
          <li>
            <div class="page-header">
              <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                  </li>
                </ol>
              </nav>
            </div>
          </li>
        </ul>
      </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
      <div class="overlay"></div>
      <div class="search-overlay"></div>

      <!--  BEGIN SIDEBAR  -->
      <?php include 'sidebar.php' ?>
      <!--  END SIDEBAR  -->

      <!--  BEGIN CONTENT AREA  -->
      <div id="content" class="main-content">
        <div class="layout-px-spacing">
          <div class="row layout-top-spacing">

            
          <div
              class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing"
            >
              <div class="widget-two">
              <canvas id="mycanvas"></canvas>
              <p style="text-align:center; font-weight:bold;">Most Booking Beds</p>
              </div>
            </div>

            <div
              class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-16 layout-spacing"
            >
              <div class="widget widget-three">
              <canvas id="mycanvas2"></canvas>
              <p style="text-align:center; font-weight:bold;">Most Appointed Doctor</p>
              </div>
            </div>

            <!-- <div
              class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing"
            >
              <div class="widget widget-three">
                
              </div>
            </div> -->
            

            <div
              class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 layout-spacing"
            >
              <div class="widget-two">
              <canvas id="mycanvas3"></canvas>
              <p style="text-align:center; font-weight:bold;">No of Hospitals in Various Location</p>

              </div>
            </div>

            <div
              class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing"
            >
              <div class="widget widget-three">
              <canvas id="mycanvas4"></canvas>
              <br><br>
              <p style="text-align:center; font-weight:bold;">Type of Bed's Booked Mostly</p>

              </div>
            </div>

            <!-- <div
              class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing"
            >
              <div class="widget widget-three">
                
              </div>
            </div> -->

            

            

          

            

            
          </div>
        </div>
        <div class="footer-wrapper">
          <div class="footer-section f-section-1">
          <p class="">Copyright © <script>document.write(new Date().getFullYear());</script> , All rights reserved.</p>
          </div>
          <div class="footer-section f-section-2">
          </div>
        </div>
      </div>
      <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
      $(document).ready(function () {
        App.init();
      });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="js/plot01.js"></script>
    <script src="js/plot02.js"></script>
    <script src="js/plot03.js"></script>
    <script src="js/plot04.js"></script>
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
  </body>

</html>
