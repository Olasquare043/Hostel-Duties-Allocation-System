<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>HDASystem</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/mdb.min.css" />
  <link rel="stylesheet" href="../../lib/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/site.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/admin.css" />
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
  <script src="../js/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-success">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4 ">
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
          </a>
          <!-- <a href="allstudent.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-users fa-fw me-3"></i><span>All Students</span>
          </a> -->
          <a href="allstaff.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-users fa-fw me-3"></i><span>All Staffs</span>
          </a>
          <a href="allocationList.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-calendar fa-fw me-3"></i><span>All Allocations</span>
          </a>
          <a href="allocation.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-tasks fa-fw me-3"></i><span>Make Allocation</span>
          </a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand nav-link" href="index.php">
          <strong>Hostel Duty Allocation System (HDASystem)</strong>
        </a>
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Some news</a></li>
              <li><a class="dropdown-item" href="#">Another news</a></li>
              <li>
                <a class="dropdown-item" href="#">Something else</a>
              </li>
            </ul>
          </li>

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="../img/usericon.jpg" class="rounded-circle" height="25" alt="" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">My profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" onclick="submitForm()">Logout</a></li>
              <script>
                function submitForm() {
                  var answer = window.confirm("Are you sure you want to Logout?");
                  if (answer) {
                    //logout
                    window.location = "logout.php";
                  }
                }
              </script>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <?php
    if (isset($_SESSION['msg1'])) {
      $msg = $_SESSION['msg1'];
      $msgTitle = "Welcome!";
      if (isset($_SESSION['msgTitle'])) {
        $msgTitle = $_SESSION['msgTitle'];
      }
    ?>
      <script>
        Swal.fire({
          title: "<?php echo $msgTitle ?>",
          text: "<?php echo $msg ?>",
          icon: "success",
          button: "Ok",
        })
      </script>
      <?php
    }
    if (isset($_SESSION['msg'])) {
      $msg = $_SESSION['msg'];
      $msgTitle = "Check Well !";
      if (isset($_SESSION['msgTitle'])) {
        $msgTitle = $_SESSION['msgTitle'];
      }
      $msgStyle = $_SESSION['msgStyle'];
      if ($msgStyle == 0) {
      ?>
        <script>
          Swal.fire({
            title: "<?php echo $msgTitle ?>",
            text: "<?php echo $msg ?>",
            icon: "error",
            button: "Ok",
          })
        </script>
      <?php

      } else {
      ?>
        <script>
          Swal.fire({
            title: "<?php echo $msgTitle ?>",
            text: "<?php echo $msg ?>",
            icon: "success",
            button: "Ok!",
          });
        </script>
    <?php
      }
    }
    unset($_SESSION['msg']);
    unset($_SESSION['msg1']);
    unset($_SESSION['msgStyle']);
    unset($_SESSION['msgTitle']);
    ?>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  <!--Main layout-->
  <div class=" container-fliud p-4">
    <main>
      <div class="pt-5">
      </div>