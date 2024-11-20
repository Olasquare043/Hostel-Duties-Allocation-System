<?php
session_start();
if (isset($_SESSION['id'])) {
  unset($_SESSION['id']);
}
if (isset($_SESSION['adminId'])) {
  unset($_SESSION['adminId']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>HDASystem Homepage</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      /* Carousel styling */
      #introCarousel,
      .carousel-inner,
      .carousel-item,
      .carousel-item.active {
        height: 100vh;
      }

      .carousel-item:nth-child(1) {
        background-image: url('img/IMG1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(2) {
        background-image: url('img/IMG2.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      .carousel-item:nth-child(3) {
        background-image: url('img/IMG0.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #introCarousel {
          margin-top: -58.59px;
        }

        #introCarousel,
        .carousel-inner,
        .carousel-item,
        .carousel-item.active {
          height: 50vh;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" href="index.php">
          <strong>Hostel Duty Allocation System (HDASystem)</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link text-white" href="studentLogin.php" rel="nofollow">Student </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link text-white" href="staffLogin.php" rel="nofollow">Staff </a>
            </li>
          </ul>
          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="https://www.youtube.com/" rel="nofollow" target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="https://www.facebook.com/miracle.adenigbagbe" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="https://twitter.com/" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="https://github.com/mdbootstrap/" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Carousel wrapper -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
      </ol>

      <!-- Inner -->
      <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1 class="mb-3">Automated Host Duty Allocation System</h1>
                <h5 class="mb-4">The system assigns duties to staff members based on the predefined weekly schedule.</h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h1>Featured allocation check</h1>
                <h5 class="mb-4">Allow staff to check and interact with the system</h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
          <!-- <div class="mask" style="
                background: linear-gradient(
                  45deg,
                  rgba(29, 236, 197, 0.7),
                  rgba(91, 14, 214, 0.7) 100%
                );
              "> -->
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2>Automated Allocation</h2>
                 <h5 class="mb-4">Automatic allocate staff to duty</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Inner -->

      <!-- Controls -->
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section>
        <div class="row">
          <div class="col-md-4 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/IMG1.jpg"class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h5><strong>Welcome to the Hostel Duty Allocation System (HDASystem)</strong></h5>
            <p class="text-muted">
              This platform is designed to simplify and automate the process of assigning hostel staff
              to their respective duties on a weekly basis. With a goal of improving efficiency and consistency,
              HDASystem ensures that each task is covered each week of the month without overlapping or scheduling conflicts.
            </p>
            <p><strong>How it Works</strong></p>
            <p class="text-muted text-justify">
              The system assigns duties to staff members based on the predefined weekly schedule.
              Staff are assigned to one of several essential tasks, including Front Desk, Housekeeping, Maintenance Technician,
              Security Personnel, Resident Advisor, Inventory and Supply Management, and Cleaning Supervision. 
              This structured allocation provides a balanced and reliable schedule, ensuring every role is appropriately
              filled for optimal hostel operations.
            </p>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>General Announcements</strong></h4>
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-header bg-success text-white">
                <h5 class="card-title ">DeadLine For Proposal</h5>
              </div>
              <div class="card-body">

                <p class="card-text">
                  This is to notify all JSS3 student that the deadline for registration.....
                </p>
                <a href="#!" class="btn btn-success">Read more</a>
              </div>
            </div>
          </div>
           <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-header bg-success text-white">
                <h5 class="card-title ">Notice! Notice!! Notice!!! </h5>
              </div>
              <div class="card-body">

                <p class="card-text">
                  This is to notify all student that .....
                </p>
                <a href="#!" class="btn btn-success">Read more</a>
              </div>
            </div>
          </div>
         <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-header bg-success text-white">
                <h5 class="card-title ">New Allocation List</h5>
              </div>
              <div class="card-body">

                <p class="card-text">
                  This is to notify all student that new student allocation list.....
                </p>
                <a href="#!" class="btn btn-success">Read more</a>
              </div>
            </div>
          </div>
        </div>
        
      </section>
      <hr class="my-5" />
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php
  include("footer.php")
  ?>