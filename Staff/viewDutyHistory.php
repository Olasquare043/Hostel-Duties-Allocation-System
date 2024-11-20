<?php
session_start();
if (isset($_SESSION['staffId'])) {
    include("header.php");
    include("../connection.php");

    $staff_id = $_SESSION['staffId'];

    // Fetch all duty assignments for the logged-in staff
    $query = "SELECT week, month, year, task_id 
              FROM DutyAllocation
              WHERE staff_id = ?
              ORDER BY year DESC, month DESC, week ASC";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $duties = [];
    while ($row = $result->fetch_assoc()) {
        $duties[] = $row;
    }
    $stmt->close();
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>View Duty History</title>
    </head>

    <body>
        <div class="container">
            <h3 class="pt-4 pb-4 text-center"><strong>Your Duty History</strong></h3>

            <?php if (!empty($duties)): ?>
                <div class="table-responsive">
                    <table id="example" class="table bg-white table-bordered table-striped">
                        <thead class="bg-light">
                            <tr class="table-success">
                                <th scope="col">SN</th>
                                <th scope="col">Year</th>
                                <th scope="col">Month</th>
                                <th scope="col">Week</th>
                                <th scope="col">Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $c = 1;
                            foreach ($duties as $duty): ?>
                                <tr>
                                    <td>
                                        <p class="fw-bold mb-1"><?php echo $c++; ?></p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo htmlspecialchars($duty['year']); ?></p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo date("F", mktime(0, 0, 0, $duty['month'], 1)); ?></p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo "Week " . htmlspecialchars($duty['week']); ?></p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">
                                            <?php
                                            // Fetch task name from Tasks table
                                            $taskQuery = "SELECT task_name FROM task WHERE task_id = ?";
                                            $taskStmt = $db->prepare($taskQuery);
                                            $taskStmt->bind_param("i", $duty['task_id']);
                                            $taskStmt->execute();
                                            $taskResult = $taskStmt->get_result();
                                            $task = $taskResult->fetch_assoc();
                                            echo htmlspecialchars($task['task_name']);
                                            $taskStmt->close();
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="alert alert-warning text-center">No duty history available.</p>
            <?php endif; ?>
        </div>
    </body>

    </html>

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
    include("footer.php");
} else {
    header("location:../index.php");
}
?>