<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../partials/user/head.php" ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <header>
        <?php include "../partials/user/header.php" ?>
    </header>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        <?php include "../partials/user/sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Assignment | Assignment Submitted <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <input type="hidden" id="admno_hidden" value="<?php echo $_SESSION['sd']['admno'] ?>" name="admno_hidden">
                                <input type="hidden" id="role_hidden" value="<?php echo $_SESSION['sd']['role'] ?>" name="role_hidden">
                                <div id="myalert"></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="user_data">
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <?php include "../partials/user/footer.php" ?>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


    <?php include "../partials/user/bottom.php" ?>
    
    <script>
        $(document).ready(function(){

            fetch_level();
            function fetch_level(){
                var admno = $('#admno_hidden').val();
                var role = $('#role_hidden').val();
                $.ajax({
                    url:"ServerSide/fetch/fetch_assignment_s.php",
                    method:"POST",
                    data:{admno:admno, role:role},
                    success:function(data){
                        $('#user_data').html(data);
                    }
                });
            };

        });

        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"ServerSide/delete/delete_assignment_s.php",
                method:"POST",
                data:{user_id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    var admno = $('#admno_hidden').val();
                    var role = $('#role_hidden').val();
                    $.ajax({
                        url:"ServerSide/fetch/fetch_assignment_s.php",
                        method:"POST",
                        data:{admno:admno, role:role},
                        success:function(data){
                            $('#user_data').html(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>