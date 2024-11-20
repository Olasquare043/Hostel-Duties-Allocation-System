<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');
    include('header.php');
    $lecturerId = $_SESSION['adminId'];
    include('databank.php');

    // Fetch staff and tasks for the dropdowns
    $staffQuery = "SELECT staff_id, name FROM staff";
    $staffResult = mysqli_query($db, $staffQuery);

    $taskQuery = "SELECT task_id, task_name FROM task";
    $taskResult = mysqli_query($db, $taskQuery);
    ?>

    <!-- Generation section -->
    <div class="container">
        <!-- <div class="col-lg-12"> -->
        <center>
            <div class="col-lg-10">
                <form role="form" method="post" action="dutyallocationAction.php?auto=true">
                    <?php if (isset($_SESSION["msg"])): ?>
                        <div class="text-danger mb-3"><?php echo htmlspecialchars($_SESSION["msg"]); ?></div>
                        <?php unset($_SESSION["msg"]); ?>
                    <?php endif; ?>
                    <!-- Section: Content -->
                    <h4 class="pt-2 pb-3 text-center"><strong>Automatic Staff Duties Allocation</strong></h4>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <a class="btn btn-danger" onclick="confirmDel()"> <i class="fa fa-trash"></i> Delete
                                this Month Duty Allocation list </a> &nbsp; &nbsp; &nbsp;
                            <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Generate this Month
                                Duty allocation </button>
                            <script>
                                function confirmDel() {
                                    var answer = window.confirm("Are you sure you want to delete all allocation for this month?");
                                    if (answer) {
                                        //go to delete
                                        window.location = "delallocation.php";
                                    }
                                }
                            </script>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
            </div>
        </center>
        <hr>
        <!-- Manual allocation -->
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-6">
                <h4 class="pt-5 text-center"><strong>Manual Staff Duties Allocation</strong></h4>
                <form method="POST" action="dutyallocationAction.php">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="staff_id">Select Staff</label>
                                <select class="form-control" id="staff_id" name="staff_id" required>
                                    <option value="">-- Select Staff --</option>
                                    <?php while ($staff = mysqli_fetch_assoc($staffResult)): ?>
                                        <option value="<?php echo $staff['staff_id']; ?>">
                                            <?php echo htmlspecialchars($staff['name']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="task_id">Select Task</label>
                                <select class="form-control" id="task_id" name="task_id" required>
                                    <option value="">-- Select Task --</option>
                                    <?php while ($task = mysqli_fetch_assoc($taskResult)): ?>
                                        <option value="<?php echo $task['task_id']; ?>">
                                            <?php echo htmlspecialchars($task['task_name']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="month">Month</label>
                                <select class="form-control" id="month" name="month" required>
                                    <option value="">-- Select Month --</option>
                                    <?php for ($m = 1; $m <= 12; $m++): ?>
                                        <option value="<?php echo $m; ?>"><?php echo date("F", mktime(0, 0, 0, $m, 1)); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="week">Week</label>
                                <select class="form-control" id="week" name="week" required>
                                    <option value="">-- Select Week --</option>
                                    <?php for ($w = 1; $w <= 4; $w++): ?>
                                        <option value="<?php echo $w; ?>">Week <?php echo $w; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label for="year">Year</label>
                                <input type="number" class="form-control" id="year" name="year"
                                    value="<?php echo date('Y'); ?>" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Allocate Duty</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <!-- </div> -->
    </div>
    <?php
    include('footer.php');
} else {
    header("location:../index.php");
}
?>