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
                            <h5 class="card-title mb-4">Settings / Scratch Card <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
                                <div>
                                    <form class="form-inline" role="form" id="insert_form">
                                      &nbsp;
                                      <div class="form-group">
                                        <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter Quantity" required>
                                      </div>
                                      &nbsp;&nbsp;
                                      <input type="hidden" value="" id="edit_id" name="">
                                      <button type="submit" class="btn btn-primary add"><i class="fa fa-download"></i>Add</button>
                                    </form>
                                </div>
                                <hr>
                                <div>                                    
                                    <a href="print_card.php" style="color: white; text-decoration: none;margin:2px;" class="btn btn-primary print_card"><i class="fa fa-print"></i>Print Scratch Card</a>

                                    <button class="btn btn-primary clear_card"><i class="fa fa-broom"></i>Clear Printed Card</button>
                                </div>
                                <hr>
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
                $.ajax({
                    url:"ServerSide/fetch/fetch_card.php",
                    method:"POST",
                    data:{},
                    success:function(data){
                        $('#user_data').html(data);
                    }
                });
            };

        });
        $(document).on('click', '.clear_card', function(){
            var user_id = 'wipe';
            $.ajax({
                url:"ServerSide/delete/wipe_card.php",
                method:"POST",
                data:{wipe:user_id},
                success:function(data){
                    $('#myalert').html(data);
                }
            });
        });

        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"ServerSide/delete/delete_card.php",
                method:"POST",
                data:{user_id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_card.php",
                        method:"POST",
                        data:{},
                        success:function(data){
                            $('#user_data').html(data);
                        }
                    });
                }
            });
        });

        $(document).on('submit', '#insert_form', function(event){
        event.preventDefault();
            var qty = $('#qty').val();
            $.ajax({
                url:"ServerSide/insert/insert_card.php",
                method:"POST",
                data:{qty:qty},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_card.php",
                        method:"POST",
                        data:{},
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