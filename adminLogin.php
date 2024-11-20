<?php
session_start();
include('header.php');
?>
<div class="container ">
    <div class="shadow card mt-5 pb-5" style="width:40%; margin:auto;">
        <!-- <div class="col-lg-10 pb-5 pt-3 text-center"> -->
        <form role="form" method="post" action="transacAdmin.php">
            <!--Section: Content-->
            <h4 class="pt-4 pb-4 text-center card-header"><strong>Admin login</strong></h4>
            <div class=" card-body mt-3 row d-flex justify-content-center">
                <div class="col-md-8">
                    <?php
                    if (isset($_SESSION["errorMessage"])) {
                    ?>
                        <div class="text-danger"><?php echo $_SESSION["errorMessage"]; ?></div>
                    <?php
                        unset($_SESSION["errorMessage"]);
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <!-- userid -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form3Example3" name="adminId" class="form-control" />
                                <label class="form-label" for="form3Example3">Admin Id</label>
                            </div>
                        </div>
                    </div>
                    <!-- Password-->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" id="formExample4" name="password" class="form-control" />
                                <label class="form-label" for="formExample4">Password</label>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success btn-block mb-4">
                        Login
                    </button>
                </div>
            </div>
        </form>
        <!-- </div>s -->
    </div>

</div>

<?php
include('footer.php');
?>