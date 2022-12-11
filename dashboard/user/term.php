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
                            <h5 class="card-title mb-4">Settings > Term <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
                                <div>
                                    <form class="form-inline" role="form" id="insert_form">
                                      <div class="form-group">
                                        <select name="termtype" class="form-control" id="termtype" required="required">
                                            <option value="">--- Select Term Type ---</option>
                                            <?php 
                                                echo load_termtype($conn);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;
                                      <div class="form-group">
                                        <select name="session" class="form-control" id="session" required="required">
                                            <option value="">-- Select Session --</option>
                                            <?php 
                                                echo load_session($conn);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;&nbsp;
                                      <input type="hidden" value="" id="edit_id" name="">
                                      <button type="submit" class="btn btn-primary add"><i class="fa fa-download"></i>Add</button>
                                    </form>
                                </div>
                                <br>
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
                    url:"ServerSide/fetch/fetch_term.php",
                    method:"POST",
                    data:{},
                    success:function(data){
                        $('#user_data').html(data);
                    }
                });
            };

        });

        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"ServerSide/delete/delete_term.php",
                method:"POST",
                data:{user_id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_term.php",
                        method:"POST",
                        data:{},
                        success:function(data){
                            $('#user_data').html(data);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"ServerSide/edit/edit_term.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data){
                    $('#session').val(data.session);
                    $('#termtype').val(data.termtype);
                    $('.form-inline').attr("id", 'edit_form');
                    $('#edit_id').val(data.id);
                }
            });
        });

        $(document).on('submit', '#insert_form', function(event){
        event.preventDefault();
            var session = $('#session').val();
            var termtype = $('#termtype').val();
            $.ajax({
                url:"ServerSide/insert/insert_term.php",
                method:"POST",
                data:{session:session, termtype:termtype},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_term.php",
                        method:"POST",
                        data:{},
                        success:function(data){
                            $('#user_data').html(data);
                        }
                    });
                }
            });
        });

        $(document).on('submit', '#edit_form', function(event){
        event.preventDefault();
            var user_id = $('#edit_id').val();
            var termtype = $('#termtype').val();
            var session = $('#session').val();
            $.ajax({
                url:"ServerSide/update/update_term.php",
                method:"POST",
                data:{termtype:termtype, session:session, id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    $("#edit_form")[0].reset();
                    $('#termtype').val();
                    $('#session').val();
                    $('.form-inline').attr("id", 'insert_form');
                    $('#edit_id').val();
                    $.ajax({
                        url:"ServerSide/fetch/fetch_term.php",
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