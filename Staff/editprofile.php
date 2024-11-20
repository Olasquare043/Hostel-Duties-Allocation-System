<?php
// Add this near the top of your script
ob_start();
session_start();
if (isset($_SESSION['staffId'])) {
    include("header.php");
    include("../connection.php");

    $staff_id = $_SESSION['staffId'];

    // Fetch staff profile details
    $query = "SELECT * FROM staff WHERE staff_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();
    $stmt->close();

    // Handle profile update
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact_info = $_POST['contact_info'];
        $start_date = $_POST['start_date'];

        // Update staff information
        $updateQuery = "UPDATE staff SET name = ?, role = ?, contact_info = ?, start_date = ? WHERE staff_id = ?";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bind_param("ssssi", $name, $role, $contact_info, $start_date, $staff_id);
        $updateStmt->execute();
        $updateStmt->close();

        // Redirect or show success message
        $_SESSION['msgTitle'] = "Good Job!";
        $_SESSION['msg'] = "Staff profile updated successfully!";
        $_SESSION['msgStyle'] = 1;
        header("Location: editprofile.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                    <h2 class="pt-4 pb-4 text-center"><strong>Edit Your Profile</strong></h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo htmlspecialchars($staff['name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <input type="text" class="form-control" id="role" name="role"
                                value="<?php echo htmlspecialchars($staff['role']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_info" class="form-label">Contact Information:</label>
                            <input type="text" class="form-control" id="contact_info" name="contact_info"
                                value="<?php echo htmlspecialchars($staff['contact_info']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="<?php echo htmlspecialchars($staff['start_date']); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Profile</button>
                    </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <?php
    include("footer.php");
} else {
    header("location:../index.php");
}
?>