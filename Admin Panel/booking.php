<?php 
  require_once 'auth.php';

  $sql = "SELECT booking.id, passenger.id as pid, train.name, booking.class, route.start, route.stop, schedule.date, schedule.time, booking.status FROM train,route,schedule,passenger,booking WHERE schedule.t_id = train.id AND schedule.r_id = route.id AND booking.s_id = schedule.id AND booking.p_id = passenger.id";
  $res=mysqli_query($con,$sql);
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

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->

</head>
<body>
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
              Hi, Admin
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">View Bookings</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page"><span>View</span></li> -->
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
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th hidden>Booking ID</th>
                                        <th>Passenger ID</th>
                                        <th>Train</th>
                                        <th>Class</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  while($bookings=mysqli_fetch_assoc($res)){ 
                                ?>
                                    <tr>
                                        <td hidden><?php echo $bookings['id']; ?></td>
                                        <td><?php echo $bookings['pid']; ?></td>
                                        <td><?php echo $bookings['name']; ?></td>
                                        <td><?php echo $bookings['class']; ?></td>
                                        <td><?php echo $bookings['start']; ?></td>
                                        <td><?php echo $bookings['stop']; ?></td>
                                        <td><?php echo $bookings['date']; ?></td>
                                        <td><?php echo $bookings['time']; ?></td>
                                        <td>
                                        <div class="custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" <?php if($row['status']=='1'){echo "checked"; } ?> onclick="toggleStatus(<?php echo $row['id'] ?>);" id="<?php echo $row['id'] ?>">
                                          <label class="custom-control-label" for="<?php echo $row['id'] ?>"></label>
                                        </div>
                                        </td>
                                    </tr>
                                  <?php } ?>  
                                </tbody>
                             
                            </table>
                        </div>
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

        function toggleStatus(id){
          var id = id;
          // console.log(id);
          $.ajax({
            url: "booking_toggle.php",
            type: "post",
            data:{bId:id},
            success: function(result){
              if(result == '1'){
                alert("Booking Confirm");
              }
              else{
                alert("Booking is on Hold");
              }
            }
          });
        }
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>