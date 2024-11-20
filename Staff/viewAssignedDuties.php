<?php
session_start();
if (isset($_SESSION['staffId'])) {
    include("header.php");
    include("../connection.php");
    $staff_id = $_SESSION['staffId'];
    include("databank.php");
    ?>
    <div class="container">
        <?php
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');
        // Fetch duties for the staff member for the current month
        $query = "SELECT week, task_id 
                    FROM dutyallocation
                    WHERE staff_id = ? AND month = ? AND year = ? 
                    ORDER BY week ASC";
        $stmt = $db->prepare($query);
        $stmt->bind_param("iii", $staff_id, $currentMonth, $currentYear);
        $stmt->execute();
        $result = $stmt->get_result();
        $assignments = [];
        while ($row = $result->fetch_assoc()) {
            $assignments[$row['week']] = $row['task_id'];
        }
        $stmt->close();
        ?>
        <!-- Lecturer list  -->
        <div class="col-lg-12">
            <h3 class="pt-4 pb-4 text-center"><strong>Your Assigned Duties for <?php echo date('F Y'); ?></strong></h3>
            <!-- loader here -->
            <p>
            <div style='display:none;'>
                <img src="../images/loader.gif" />
            </div>
            </p>
            <section>
                <?php

                //  <!-- table -->
                echo "<div class='table-responsive'>";
                echo "<table id='example' class='table align-middle bg-white table-bordered table-striped shadow'>";
                echo "<thead class='bg-light'>";
                echo "<tr class='table-primary'>";
                // echo "<th scope='col'>SN</th>";
                echo "<th scope='col'>Week</th>";
                echo "<th scope='col'>Task</th>";
                echo "<th scope='col'>Operation</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                for ($week = 1; $week <= 4; $week++): ?>
                    <tr>

                        <td><?php echo "Week $week";
                        if (!empty($assignments[$week])) {
                            $taskDetails = getTaskDetails($db, $assignments[$week]);
                        }

                        ?></td>
                        <td><?php echo isset($assignments[$week]) ? $taskDetails['task_name'] : "<div class='alert alert-danger' role='alert'>
                                No assigned duties yet!
                                </div>"; ?>
                        </td>
                        <td>
                            <?php if (isset($assignments[$week])): ?>
                                <a class="btn btn-sm btn-success" href="viewTaskDetails.php?task_id=<?php echo $assignments[$week]; ?>">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            <?php else: ?>
                                <div class="alert alert-danger" role="alert">No assigned duties yet!</div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endfor;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";

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
                "info": true,
                "autoWidth": false,
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