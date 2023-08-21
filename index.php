<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/main.js"></script>
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
    <title>Hospital Management System</title>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container pt-4">
          <a href="#" class="navbar-brand text-uppercase font-weight-bold"
            ><i class="fa fa-plus" style="font-size: 32px"></i
            >&nbsp;&nbsp;&nbsp;Hospital Management System</a
          >
          <button
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            class="navbar-toggler navbar-toggler-right"
          >
            <i class="fa fa-bars"></i>
          </button>

          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="#" class="nav-link text-uppercase font-weight-bold"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="Login/admin_index.php"
                  class="nav-link text-uppercase font-weight-bold"
                  >Admin Login</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="Login/user_index.php"
                  class="nav-link text-uppercase font-weight-bold"
                  >Patient Login</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Wrapper -->
    <div style="background: url(img/bg-02.jpg)" class="page-holder bg-cover">
      <br /><br />
      <div class="container py-5">
        <header class="text-center text-white py-5">
          <br />
          <h1 class="display-4 font-weight-bold mb-4 pt-5">
            Book an Appointment Now
          </h1>
          <p class="lead mb-0">
            World's Largest Online Doctor and Hospital Bed Booking Platform
          </p>
          <p class="font-italic">Trusted by over 100 million Peoples.</p>
        </header>

        <section class="search-sec">
          <div class="container">
            <form action="Login/user_index.php" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 p-0"></div>
                    <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                      <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="btn btn-warning wrn-btn"
                        style="font-weight: bold"
                        value="Book an Appointment"
                      />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 p-0"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>
