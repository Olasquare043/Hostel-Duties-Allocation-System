<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');
    include('header.php');
    include('databank.php');
    $staff_id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($staff_id) {
        $staff_id = $_GET['id'];
        $query = "SELECT * FROM Staff WHERE staff_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $staff_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $staff = $result->fetch_assoc();
        $stmt->close();
    }

    ?>
    <center>
        <div class="col-lg-12">
            <h4 class="pt-4 pb-4 text-center"><strong>Add/Edit Teacher's Profile Record</strong></h4>
            <form action="editActionStaff.php" method="POST">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION["errorMsg"])) {
                            ?>
                            ?>
                            <div class="text-danger mb-3"><?php echo $_SESSION["errorMsg"]; ?></div>
                            <?php
                            unset($_SESSION["errorMsg"]);
                        }
                        ?>
                        <!-- inputs name -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo isset($staff['name']) ? $staff['name'] : ''; ?>" required>
                                    <label class="form-label" for="name">Name:</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="role" id="role" class="form-control"
                                        value="<?php echo isset($staff['role']) ? $staff['role'] : ''; ?>" required>
                                    <label class="form-label" for="role">Role:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="contact_info" id="contact_info" class="form-control"
                                        value="<?php echo isset($staff['contact_info']) ? $staff['contact_info'] : ''; ?>"
                                        required>
                                    <label class="form-label" for="contact_info">Contact Info:</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="password" name="pswd" id="pswd" class="form-control"
                                        value="<?php echo isset($staff['pswd']) ? $staff['pswd'] : ''; ?>" required>
                                    <label class="form-label" for="pswd">Password:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="<?php echo isset($staff['start_date']) ? $staff['start_date'] : ''; ?>"
                                        required>

                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success"
                            value="<?php echo $staff_id ? "Update" : "Add"; ?> Staff">
            </form>
    </center>
    </div>
    <?php
    include('footer.php');
} else {
    header("location:../index.php");
}
?>