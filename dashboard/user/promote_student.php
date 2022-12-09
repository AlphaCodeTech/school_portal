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
                            <h5 class="card-title mb-4">Student | Promote Student <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <form action="" method="post" enctype="multipart/form-data" role="form" id="promote_form">
                                          <div class="form-group">
                                            <label for="employee_email">From</label>
                                            <select name="old_class" class="form-control" id="old_class" required="required">
                                                <option value="">--- Select Class ---</option>
                                                <?php 
                                                    echo load_class($conn);
                                                ?>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="pwd">To</label>
                                            <select name="new_class" class="form-control" id="new_class" required="required">
                                                <option value="">--- Select Class ---</option>
                                                <?php 
                                                    echo load_class($conn);
                                                ?>
                                                <option value="Archive">Archive</option>
                                            </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Promote &nbsp; <i class="fa fa-download"></i></button>
                                        </form>                                       
                                    </div>
                                    <div class="col-sm-3"></div>
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
        $(document).on('submit', '#promote_form', function(event){
        event.preventDefault();
            var old_class = $('#old_class').val();
            var new_class = $('#new_class').val();
            $.ajax({
                url:"ServerSide/update/promote_student.php",
                method:"POST",
                data:{old_class:old_class, new_class:new_class},
                success:function(data){
                    $('#myalert').html(data);
                }
            });
        });
    </script>
</body>
</html>