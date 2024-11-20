<?php
session_start();
if (isset($_SESSION['staffId'])) {
    include("header.php");
    include("../connection.php");
    $staffId = $_SESSION['staffId'];
    include("databank.php");
?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?php 
            $row =getDetails($db, $staffId);
            echo "Welcome " . strtoupper($row['name']);?>
        </h1>

    </div>
    <!-- Content Row -->
    <div class="row">
        <!--All Exam recorded -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="viewAssignedDuties.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                                    Duties Assigned</div>
                                <div class="h5 mb-0 font-weight-bold text-primary">
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
         <!--Exam recorded For JSS1-->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                                    JSS 1 Exams </div>
                                <div class="h5 mb-0 font-weight-bold text-primary">
                                   
                                </div>
                            </div>
                            <div class="col-auto">
                               <i class="fas fa-calendar fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
         <!--Exam recorded For JSS1-->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                                    JSS 2 Exams </div>
                                <div class="h5 mb-0 font-weight-bold text-primary">
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
         <!--Exam recorded For JSS1-->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="#">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                                    JSS 3 Exams </div>
                                <div class="h5 mb-0 font-weight-bold text-primary">
                                   
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
    </div>

    <!-- Content Row -->
<?php

    include('footer.php');
 } else {
     header("location:../index.php");
}

?>