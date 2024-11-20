<?php
// fuctions.
function getDetails($db, $adminId)
{
    $query = "SELECT * FROM admins WHERE ID='" . $adminId . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getStaffNames($db, $staff_id)
{
    $query = "SELECT * FROM staff WHERE staff_id='" . $staff_id . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['name'];
    return $fullname;
}
function getTaskDetails($db, $task_id)
{
    $query = "SELECT * FROM task WHERE task_id='" . $task_id . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAllSubjects($db)
{
    $query = "SELECT * FROM subjects";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    return $result;
}
function getAllAllocation($db)
{
    $query = "SELECT * FROM dutyallocation";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    return $result;
}
function getAllStudent($db)
{
    $query = "SELECT * FROM students";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // $row = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
}
function getSubjectName($db, $subjectID)
{
    $query = "SELECT * FROM subjects WHERE subjectID='" . $subjectID . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row['subjectName'];
}
function getAllStaff($db)
{
    $query = "SELECT * FROM staff";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // $row = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
}
function getAllExams($db)
{
    $query = "SELECT * FROM exams";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // $row = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function getMonthName($monthNumber)
{
    $months = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
    return $months[$monthNumber - 1];
}