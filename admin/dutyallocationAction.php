<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');

    // Check if the request is for auto-allocation
    $isAutoAllocation = isset($_GET['auto']) && $_GET['auto'] === 'true';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($isAutoAllocation) {
            // Auto-allocate tasks to all staff members
            autoAllocateDuties($db);
        } else {
            // Handle manual allocation from the form
            manualAllocateDuty($db, $_POST['staff_id'], $_POST['task_id'], $_POST['month'], $_POST['week'], $_POST['year']);
        }
    }

    // Redirect back to dutyallocation.php
    header("location:allocation.php");
} else {
    header("location:../index.php");
}

// Function to manually allocate duty for a single entry
function manualAllocateDuty($db, $staff_id, $task_id, $month, $week, $year)
{
    // Check for existing duty allocation
    $checkQuery = "SELECT * FROM dutyallocation WHERE staff_id = ? AND task_id = ? AND month = ? AND week = ? AND year = ?";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bind_param("iiiii", $staff_id, $task_id, $month, $week, $year);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $_SESSION['msg'] = "Error: This duty allocation already exists.";
        $_SESSION['msgTitle'] = "Oh Ooooops!";
        $_SESSION['msgStyle'] = 0;
    } else {
        // Insert duty allocation
        $query = "INSERT INTO dutyallocation (staff_id, task_id, month, week, year) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("iiiii", $staff_id, $task_id, $month, $week, $year);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "Duty allocation successful!";
            $_SESSION['msgTitle'] = "Good Job!";
            $_SESSION['msgStyle'] = 1;
        } else {
            $_SESSION['msg'] = "Error allocating duty: " . $stmt->error;
            $_SESSION['msgTitle'] = "Oh Ooooops!";
            $_SESSION['msgStyle'] = 0;
        }
        $stmt->close();
    }
    $checkStmt->close();
}

// Function to auto-allocate duties to all staff with randomization
function autoAllocateDuties($db)
{
    // Fetch all staff members and all tasks
    $staffQuery = "SELECT staff_id FROM staff";
    $taskQuery = "SELECT task_id FROM task";
    $staffResult = mysqli_query($db, $staffQuery);
    $taskResult = mysqli_query($db, $taskQuery);

    // Retrieve tasks into an array
    $tasks = [];
    while ($task = mysqli_fetch_assoc($taskResult)) {
        $tasks[] = $task['task_id'];
    }

    // Month, week, and year values (can be set dynamically as needed)
    $month = date('n');  // Current month
    $year = date('Y');   // Current year

    // Fetch staff members into an array
    $staffArray = [];
    while ($staff = mysqli_fetch_assoc($staffResult)) {
        $staffArray[] = $staff['staff_id'];
    }

    // Loop through each week (1-4) and allocate tasks
    for ($week = 1; $week <= 4; $week++) {
        // Shuffle the tasks array for random allocation each time
        shuffle($tasks);

        // Loop through staff and assign tasks randomly for this week
        foreach ($staffArray as $index => $staff_id) {
            // Rotate tasks for each staff by cycling through shuffled tasks
            $task_id = $tasks[$index % count($tasks)];

            // Check for existing duty allocation for this staff, task, and period
            $checkQuery = "SELECT * FROM dutyallocation WHERE staff_id = ? AND task_id = ? AND month = ? AND week = ? AND year = ?";
            $checkStmt = $db->prepare($checkQuery);
            $checkStmt->bind_param("iiiii", $staff_id, $task_id, $month, $week, $year);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows === 0) {
                // If no existing record, insert the new duty allocation
                $query = "INSERT INTO dutyallocation (staff_id, task_id, month, week, year) VALUES (?, ?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->bind_param("iiiii", $staff_id, $task_id, $month, $week, $year);
                if (!$stmt->execute()) {
                    $_SESSION['msgTitle'] = "Oh Ooooops!";
                    $_SESSION['msgStyle'] = 0;
                    $_SESSION['msg'] = "Error auto-allocating duty: " . $stmt->error;
                    return;
                }
                $stmt->close();
            }
            $checkStmt->close();
        }
    }
    $_SESSION['msgTitle'] = "Good Job!";
    $_SESSION['msgStyle'] = 1;
    $_SESSION['msg'] = "Dynamic auto-allocation successful!";
}
