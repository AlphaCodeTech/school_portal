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
                            <h5 class="card-title mb-4">Result | Enter Student Score <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div>
                                    <form class="form-inline" role="form" id="insert_form">
                                      <div class="form-group">
                                        <select name="myclass" class="form-control" id="myclass" required="required">
                                            <option value="">--- Select Class ---</option>
                                            <?php 
                                                echo load_class_spec($conn, $_SESSION['sd']['admno']);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;
                                      <div class="form-group">
                                        <select name="subject" class="form-control" id="subject" required="required">
                                            <option value="">-- Select Subject --</option>
                                            <?php 
                                                echo load_subject_spec1($conn, $_SESSION['sd']['admno']);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;
                                      <div class="form-group">
                                        <select name="term" class="form-control" id="term" required="required">
                                            <option value="">-- Select Term --</option>
                                            <?php 
                                                echo load_term($conn);
                                            ?>
                                        </select>
                                      </div>
                                      &nbsp;&nbsp;
                                      <button type="submit" class="btn btn-primary add">Start &nbsp; <i class="fa fa-hourglass-start "></i></button>
                                    </form>
                                </div>
                                <div id="myalert" style="position:fixed;top:0; right: 0;z-index:100000000;"></div>
                                
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
        $(document).on('submit', '#insert_form', function(event){
        event.preventDefault();
            var myclass     = $('#myclass').val();
            var myterm      = $('#term').val();
            var mysubject   = $('#subject').val();
            $.ajax({
                url:"ServerSide/fetch/fetch_live_result.php",
                method:"POST",
                data:{myclass:myclass, term:myterm, subject:mysubject},
                success:function(data){
                    $('#user_data').html(data);
                }
            });
        });

        $(document).on('click', '.apply', function(){

            var id = $(this).attr("id");

            var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
                $td4 = $row.find("td:nth-child(4)"); // Finds the 4nd <td> element
                $td5 = $row.find("td:nth-child(5)"); // Finds the 5nd <td> element
                $td6 = $row.find("td:nth-child(6)"); // Finds the 6nd <td> element
                $td7 = $row.find("td:nth-child(7)"); // Finds the 7nd <td> element
                $td8 = $row.find("td:nth-child(8)"); // Finds the 8nd <td> element

            $.each($td4, function() {                 // Visits every single <td> element
                $firstTest = $(this).text();               // Prints out the text within the <td>
            });

            $.each($td5, function() {                // Visits every single <td> element
                $secondTest = $(this).text();             // Prints out the text within the <td>
            });

            $.each($td6, function() {                 // Visits every single <td> element
                $assignment = $(this).text();               // Prints out the text within the <td>
            });

            $.each($td7, function() {                // Visits every single <td> element
                $project = $(this).text();             // Prints out the text within the <td>
            });

            $.each($td8, function() {                 // Visits every single <td> element
                $exam = $(this).text();               // Prints out the text within the <td>
            });


            if ($firstTest == '' || $secondTest == '' || $assignment == '' || $project == '' || $exam == '') {
                $("#myalert").fadeIn("slow").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Pls Make sure no box or cell is empty (minimun of 0) </div>');
                $("#myalert").fadeOut(10000);
            }else if($firstTest > 10 || $secondTest > 10 || $assignment > 10 || $project > 10 || $exam > 60) {
                $("#myalert").fadeIn("slow").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Pls Make sure values entered is not greater than Expected </div>');
                $("#myalert").fadeOut(10000);
            }else{

                var firstTest   =   $firstTest;
                var secondTest  =   $secondTest;
                var assignment  =   $assignment;
                var project     =   $project;
                var exam        =   $exam;

                $.ajax({
                    url:"ServerSide/update/update_live_result.php",
                    method:"POST",
                    data:{id:id, firstTest:firstTest, secondTest:secondTest, assignment:assignment, project:project, exam:exam},
                    success:function(data){
                        $("#myalert").fadeIn("slow").html(data);
                        $("#myalert").fadeOut(6000);
                    }
                });

            }

        });
    </script>
</body>
</html>