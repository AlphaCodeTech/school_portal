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
                            <h5 class="card-title mb-4">Result | Publish Results <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert" style="position:fixed;top:0; right: 0;z-index:100000000;"></div>
                                <button type="submit" class="btn btn-primary publish">Click Publish Completed Result &nbsp; <i class="fa fa-hourglass-start "></i></button>
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

        $(document).on('click', '.publish', function(){

            $.ajax({
                url:"ServerSide/insert/publish_result.php",
                method:"POST",
                data:{},
                success:function(data){
                    $("#myalert").fadeIn("slow").html(data);
                    $("#myalert").fadeOut(15000);
                }
            });
            
        });
    </script>
</body>
</html>