<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include("header.php");
    include("../connection.php");
    $adminId = $_SESSION['adminId'];
    include("databank.php");
    ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?php $row = getDetails($db, $adminId);
            echo "Welcome " . strtoupper($row['name']) . ", " . $row['username'];
            ?>
        </h1>
    </div>
    <!-- Content Row -->
     <!-- Content Row -->
    <div class="row">
         
        <!--All JSS1 Exams -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                All Staff</div>
                            <div class="h5 mb-0 font-weight-bold text-success">
                                <?php echo getAllStaff($db) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-muted"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--All JSS2 Exams -->

    </div>
    
    <!-- Content Row -->
<?php
    include('footer.php');
    } else {
        header("location:../index.php");
    }
?>