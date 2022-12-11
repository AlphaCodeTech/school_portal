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
                            <h5 class="card-title mb-4">Settings > Assign Subject to class <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
                                <div>
                                    <form class="form-inline" role="form" id="insert_form">
                                      <div class="form-group">
                                        <select name="myclass" class="form-control" id="myclass" required="required">
                                            <option value="">--- Select Class ---</option>
                                            <?php 
                                                echo load_class($conn);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;
                                      <div class="form-group">
                                        <select name="subject" class="form-control" id="subject" required="required">
                                            <option value="">--- Select Subject ---</option>
                                            <?php 
                                                echo load_subject($conn);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;
                                      <div class="form-group">
                                        <select name="tech" class="form-control" id="tech" required="required">
                                            <option value="">-- Select Subject Teacher --</option>
                                            <?php 
                                                echo load_tech($conn);
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
                    url:"ServerSide/fetch/fetch_classsubject.php",
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
                url:"ServerSide/delete/delete_classsubject.php",
                method:"POST",
                data:{user_id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_classsubject.php",
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
                url:"ServerSide/edit/edit_classsubject.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data){
                    $('#myclass').val(data.class);
                    $('#subject').val(data.subject);
                    $('#tech').val(data.subjectTeacher);
                    $('.form-inline').attr("id", 'edit_form');
                    $('#edit_id').val(data.id);
                }
            });
        });

        $(document).on('submit', '#insert_form', function(event){
        event.preventDefault();
            var myclass = $('#myclass').val();
            var mysubject = $('#subject').val();
            var mytech = $('#tech').val();
            $.ajax({
                url:"ServerSide/insert/insert_classsubject.php",
                method:"POST",
                data:{myclass:myclass, subject:mysubject, tech:mytech},
                success:function(data){
                    $('#myalert').html(data);
                    $.ajax({
                        url:"ServerSide/fetch/fetch_classsubject.php",
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
            var myclass = $('#myclass').val();
            var mysubject = $('#subject').val();
            var mytech = $('#tech').val();
            $.ajax({
                url:"ServerSide/update/update_classsubject.php",
                method:"POST",
                data:{class:myclass, subject:mysubject, tech:mytech, id:user_id},
                success:function(data){
                    $('#myalert').html(data);
                    $("#edit_form")[0].reset();
                    $('#myclass').val();
                    $('#subject').val();
                    $('#tech').val();
                    $('.form-inline').attr("id", 'insert_form');
                    $('#edit_id').val();
                    $.ajax({
                        url:"ServerSide/fetch/fetch_classsubject.php",
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