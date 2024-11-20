<?php
session_start();

if (isset($_SESSION['teacherId'])) {
    include("header.php");
    include("../connection.php");
    $teacherId = $_SESSION['teacherId'];
    include("databank.php");
?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="col-lg-10 ">
                <form role="form" method="post" action="recordExamAction.php">
                <?php if (isset($_SESSION["errorMsg"]) && !empty($_SESSION["errorMsg"])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION["errorMsg"] . '</div>';
                unset($_SESSION["errorMsg"]);
}?>
                    <!-- Form fields -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lecturer">Student ID</label>
                                <input type="text" id="studentId" class="form-control" name="studentId" />
                                <input type="hidden" id="teacherID" class="form-control" name="teacherID" value="<?php echo $teacherId?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lecturer">Subject</label>
                                <select class="form-select" name="subject" aria-label="Default select example">
                                    <?php
                                    $result = getAllSubjects($db);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row['subjectID']; ?>">
                                            <?php echo $row['subjectName']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lecturer">Level</label>
                                <select class="form-select" name="level" aria-label="Default select example">
                                    <option value="JSS1">JSS1</option>
                                    <option value="JSS2">JSS2</option>
                                    <option value="JSS3">JSS3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form3Example2">Score</label>
                                <input type="text" id="score" class="form-control" name="score" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success btn-block">Record Score</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Table list for assigned students -->
    <section>
        <hr>
        <div class="col-lg-12">
            <small class="text-muted">List of all recorded student exams for any level</small>
            <table id="example" class="table table-bordered table-striped">
                <thead class='bg-light'>
                    <tr class='table-primary'>
                        <th>SN</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Level</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM exams WHERE teacherID='" . $teacherId . "'";
                    $result = mysqli_query($db, $query);
                    $i=0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . ($i += 1) . '</td>';
                            echo '<td>' . $row['studentID'] . '</td>';
                            echo '<td>' . getStudentName($db, $row['studentID']) . '</td>';
                            echo '<td>' . getSubjectName($db, $row['subjectID']) . '</td>';
                            echo '<td>' . $row['level'] . '</td>';
                            echo '<td>' . $row['score'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='6'>No Exams details available, you have not recorded any exam for any student!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
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