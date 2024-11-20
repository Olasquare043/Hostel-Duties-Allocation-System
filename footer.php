 <!--Footer-->
 <footer class=" text-lg-start mt-5 mb-0">

   <hr class="m-0" />

   <div class="text-center py-4 align-items-center">
     <p>Follow us on social media</p>
     <a href="https://www.youtube.com/channel/" class="btn btn-success m-1" role="button" rel="nofollow" target="_blank">
       <i class="fab fa-youtube"></i>
     </a>
     <a href="https://www.facebook.com/" class="btn btn-success m-1" role="button" rel="nofollow" target="_blank">
       <i class="fab fa-facebook-f"></i>
     </a>
     <a href="#" class="btn btn-success m-1" role="button" rel="nofollow" target="_blank">
       <i class="fab fa-twitter"></i>
     </a>
     <a href="https://github.com/" class="btn btn-success m-1" role="button" rel="nofollow" target="_blank">
       <i class="fab fa-github"></i>
     </a>
   </div>
 </footer>
 <?php
  if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $msgStyle = $_SESSION['msgStyle'];
    if ($msgStyle == 0) {
  ?>
     <script>
       Swal.fire({
         title: "Check Well!",
         text: "<?php echo $msg ?>",
         icon: "danger",
         button: "Ok",
       })
     </script>
   <?php

    } elseif ($msgStyle == 1) {
    ?>
     <script>
       swal({
         title: "Good job!",
         text: "<?php echo $msg ?>",
         icon: "success",
         button: "Ok!",
       });
     </script>
 <?php
    }
  unset($_SESSION['msg']);
  unset($_SESSION['msgStyle']);
  }
  
  ?>
 <!--Footer-->
 <!-- MDB -->
 <script type="text/javascript" src="js/mdb.min.js"></script>
 <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- Custom scripts -->
 <script type="text/javascript" src="js/script.js"></script>
 
 </body>

 </html>