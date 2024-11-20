<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');
    include('header.php');
    $lecturerId = $_SESSION['adminId'];
    include('databank.php');
    ?>
    <div class="container">
        <!-- loader here -->
        <p>
        <div style='display:none;'>
            <img src="../images/loader.gif"/>
        </div>
        </p>
        <section>
            <p> <small class="text-muted"> List of all duties allocation..shows here</small></p>

            <?php
            $query = "SELECT * FROM dutyallocation";
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
                echo "<th scope='col'>Name</th>";
                echo "<th scope='col'>Task Role</th>";
                echo "<th scope='col'>Task Description</th>";
                echo "<th scope='col'>Month</th>";
                echo "<th scope='col'>Week</th>";
                // echo "<th scope='col'>Operation</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $taskDetails = getTaskDetails($db, $row['task_id']);
                    $c += 1;
                    echo '<tr>';
                    echo '<td>';
                    echo '<p class="fw-bold mb-1">' . $c . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-bold mb-1">' . getStaffNames($db, $row['staff_id']) . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $taskDetails['task_name'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $taskDetails['description'] . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' .getMonthName($row['month'] ). '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="fw-normal mb-1">' . $row['week'] . '</p>';
                    echo '</td>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                                No duties allocation details available!
                                </div>";
            }
            //}
            ?>
        </section>
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