<?php

// Start session
session_start();

// Database connection (assuming it's already established)
include('../connection.php');
// Get the staff details from the form submission
$staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$contact_info = isset($_POST['contact_info']) ? $_POST['contact_info'] : '';
$pswd = isset($_POST['pswd']) ? $_POST['pswd'] : '';
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';

if ($staff_id) {
    // Update existing staff record
    $query = "UPDATE Staff SET name = ?, role = ?, contact_info = ?, pswd = ?, start_date = ? WHERE staff_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssi", $name, $role, $contact_info, $pswd, $start_date, $staff_id);
    $stmt->execute();
    $stmt->close();
    echo "Staff profile updated successfully!";
} else {
    // Insert a new staff record
    $query = "INSERT INTO Staff (name, role, contact_info, pswd, start_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssss", $name, $role, $contact_info, $pswd, $start_date);
    $stmt->execute();
    $stmt->close();
    echo "New staff profile added successfully!";
}

// Redirect to a specific page after insertion or update (optional)
header("Location: editprofile.php?.$staff_id"); 
exit();

?>