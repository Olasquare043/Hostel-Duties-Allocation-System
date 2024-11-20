<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');
    include('header.php');
    $lecturerId = $_SESSION['adminId'];
    include('databank.php');
    ?>
    <div class="container">
        <!-- Lecturer list  -->
        <p> <small class="text-muted"> List of all Staffs..shows here</small></p>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-sm btn-success mb-2" href="editStaff.php?"><i class="fa fa-plus"></i> &nbsp Add
                    New</a>
            </div>
            <!-- <div class="col-6"></div> -->
        </div>
        <div class="col-lg-12">
        <!-- loader here -->
        <p>
        <div style='display:none;'>
            <img src="../images/loader.gif" />
        </div>
        </p>
        <section>
            <?php

            include("../connection.php");
            $query = 'SELECT * FROM staff';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $num = mysqli_num_rows($result);
            $c = 0;
            if ($num >= 1) {
                //  <!-- table -->
                echo "<div class='table-responsive'>";
                echo "<table id='example' class='table bg-white table-bordered table-striped'>";
                echo "<thead class='bg-light'>";
                echo "<tr class='table-success'>";
                echo "<th scope='col'>SN</th>";
                echo "<th scope='col'>Staff ID</th>";
                echo "<th scope='col'>Names</th>";
                echo "<th scope='col'>Role</th>";
                echo "<th scope='col'>Phone</th>";
                echo "<th scope='col'>Start Date</th>";
                echo "<th scope='col'>Operation</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $c += 1;
                    echo '<tr>';
                    echo '<td>';
                    echo '<p class="fw-bold mb-1">' . $c . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-bold mb-1">' . $row['staff_id'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $row['name'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $row['role'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $row['contact_info'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $row['start_date'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<div class="d-flex">';
                    echo '<a class="btn btn-sm btn-success m-1 " href="editStaff.php?id=' . $row['staff_id'] . '"><i class="fa fa-pen"></i></a>';
                    echo '<a class="btn btn-sm btn-danger m-1" href="delStaff.php?staff_id=' . $row['staff_id'] . '"><i class="fa fa-trash"></i></a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                                No lecturer details available!
                                </div>";
            }
            //}
            ?>
        </section>
    </div>
</div>
    <!-- container -->
    <script>
        $(function () {
            $("#example").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "responsive": true,
                "buttons": ["csv", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php
    include('footer.php');
} else {
    header("location:../index.php");
}
?>