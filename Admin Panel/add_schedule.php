<?php 
  require_once 'auth.php';

  $msg = '';

  if(isset($_POST['submit'])){
    $tid = mysqli_real_escape_string($con, $_POST['train']);
    $rid = mysqli_real_escape_string($con, $_POST['route']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);

    $check_sql = "SELECT * FROM `schedule` WHERE `did` = '$tid' AND `hid` = '$rid' and `date` = '$date' AND `time` = '$time'";
        $check_data = $con->query($check_sql);
        // echo $check_sql;

        if($check_data->num_rows > 0){
            $msg  = '** Doctor Already Scheduled on that Date and Time **';
        } 
        else{

            $sql = "INSERT INTO `schedule` (`did`,`hid`,`date`,`time`) VALUES('$tid','$rid','$date','$time')";
            echo $sql;
            if($con->query($sql) === TRUE){
                $msg = '** Doctor Scheduled **';
            }

        }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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
              Hi,  <?php echo $_SESSION['username'] ?>
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
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor's Schedule</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add New</span></li>
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

                <div class="layout-px-spacing">
                    
                    <div class="row layout-top-spacing">
                    

                        <div class="col-xl-12 col-lg-12 col-12  layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Schedule Doctor</h4>
                                            <h6 style="color: sky;"> <?php echo $msg; ?> </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                <form action="" method="post">
                                    <div class="form-row mb-4">
                                        <div class="col">
                                        
                                        <select class="form-control" name="train">
                                            <option value="0">Select Doctor</option>
                                            <?php 
                                              $tsql="select * from `doctor` order by `id` desc";
                                              $tres=mysqli_query($con,$tsql);
                                              while($trow=mysqli_fetch_assoc($tres)){
                                            ?>
                                              <option value="<?php echo $trow['id']; ?>"><?php echo $trow['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col">
                                        <select class="form-control" name="route">
                                            <option value="0">Select Hospital</option>
                                            <?php 
                                              $rsql="select * from `hospital` order by `id` desc";
                                              $rres=mysqli_query($con,$rsql);
                                              while($rrow=mysqli_fetch_assoc($rres)){
                                            ?>
                                              <option value="<?php echo $rrow['id']; ?>"><?php echo $rrow['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="col">
                                        <input class="form-control flatpickr flatpickr-input active" name="date" type="date" placeholder="Select Date..">
                                        </div>
                                        <div class="col">
                                        <input class="form-control flatpickr flatpickr-input active" name="time" type="time" placeholder="Select time..">
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="mb-4 btn btn-primary">
                                </form>

                                </div>
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
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

</html>