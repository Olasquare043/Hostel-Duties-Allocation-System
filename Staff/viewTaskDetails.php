<?php
session_start();
if (isset($_SESSION['staffId'])) {
    include("header.php");
    include("../connection.php");

    // Get the task_id from the URL
    $task_id = isset($_GET['task_id']) ? $_GET['task_id'] : null;

    if ($task_id) {
        // Prepare and execute the query to fetch task details
        $query = "SELECT task_name, description FROM task WHERE task_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $taskDetails = $result->fetch_assoc();
        $stmt->close();
    }
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>View Task Details</title>
    </head>

    <body>
        <div class="container">
            <?php if ($taskDetails): ?>
                <h3>Task Details</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Task Name</th>
                        <td><?php echo htmlspecialchars($taskDetails['task_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo htmlspecialchars($taskDetails['description']); ?></td>
                    </tr>
                </table>
                <a href="viewAssignedDuties.php" class="btn btn-success">Back to Assigned Duties</a>
            <?php else: ?>
                <p class="alert alert-warning">No details available for this task.</p>
                <a href="viewAssignedDuties.php" class="btn btn-success">Back to Assigned Duties</a>
            <?php endif; ?>
        </div>
    </body>

    </html>

    <?php
    include("footer.php");
} else {
    header("location:../index.php");
}
?>