<?php
// fuctions.
function getDetails($db, $staffId)
{
    $query = "SELECT * FROM staff WHERE staff_Id='" . $staffId . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function getStudentName($db, $studentID)
{
    $query = "SELECT * FROM students WHERE studentID='" . $studentID . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    $fullname= $row['firstname'] & $row['firstname'];
    return $fullname;
}
function getSubjectName($db, $subjectID)
{
    $query = "SELECT * FROM subjects WHERE subjectID='" . $subjectID . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row['subjectName'];
}
function getAllSubjects($db)
{
    $query = "SELECT * FROM subjects";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    return $result;
}
function getTeacherExamCount($db, $teacherId)
{
    $query = "SELECT * FROM exams WHERE teacherID='" . $teacherId . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
}
function getExamCount($db, $teacherId, $level)
{
    $query = "SELECT * FROM exams WHERE teacherID='" . $teacherId . "' AND level='" . $level . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
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
function getTaskDetails($db, $task_id)
{
    $query = "SELECT * FROM task WHERE task_id='" . $task_id . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row;
}