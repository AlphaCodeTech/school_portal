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
                            <h5 class="card-title mb-4">Result | Result Check <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div id="myalert"></div>
                                <form action="" method="post" enctype="multipart/form-data" role="form" id="check_form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="myclass" class="form-control" id="myclass" required="required">
                                                    <option value="">Please Select Class</option>
                                                    <?php 
                                                        echo load_class($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="term" class="form-control" id="term" required="required">
                                                    <option value="">Please Select Term</option>
                                                    <?php 
                                                        echo load_term($conn);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="card" id="card" placeholder="Enter Scratch Card Pin" required min="1" />
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Check Result &nbsp; <i class="fa fa-download"></i></button>
                                        </div>
                                    </div>
                                </form>
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
        $(document).on('submit', '#check_form', function(event){
        event.preventDefault();
            var myclass = $('#myclass').val();
            var term = $('#term').val();
            var card = $('#card').val();
            var myadmno = '<?php echo $_SESSION['sd']['admno'] ?>';
            if (myclass == '' || term == '' || card == '') {
                $('#myalert').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please make sure all field are selected or filled correctly.</div>');
            }else{
                $.ajax({
                    url:"ServerSide/result/checkCard.php",
                    method:"POST",
                    data:{admno:myadmno, card:card, term:term, class:myclass},
                    success:function(data){
                        var resultAjax = data;
                        if (resultAjax == 'invalid card') {
                            $('#myalert').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please the entered PIN is incorrect try again or contact administrator for help.</div>');
                        }else if(resultAjax == 'invalid') {
                            $('#myalert').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Invalid Request try again.</div>');
                        }else if(resultAjax == 'used by another') {
                            $('#myalert').html('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warining!</strong> Card Has already been used by another Student.</div>');
                        }else if(resultAjax == 'used by me' || resultAjax == 'used by none') {

                            /*window.location = "pdfTest.php?msg=" + msg;*/
                            /*document.location.href="getResult.php?admno="+myadmno+"&card="+card+"&term="+term+"&class="+myclass;*/
                            $.ajax({
                                url:"ServerSide/result/checkResult.php",
                                method:"POST",
                                data:{admno:myadmno, card:card, term:term, class:myclass},
                                success:function(data){
                                    var resultAjax = data;
                                    if (resultAjax == 'not avaliable') {
                                        $('#myalert').html('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Notice! </strong> Please the requested result is not avaliable try again later.</div>');
                                    }else if(resultAjax == 'avaliable') {
                                        var res = myclass.substring(0, 3);
                                        if (res == 'SSS') {
                                            document.location.href="getResult.php?admno="+myadmno+"&card="+card+"&term="+term+"&class="+myclass;
                                        }else if(res == 'JSS'){
                                            document.location.href="getResult_J.php?admno="+myadmno+"&card="+card+"&term="+term+"&class="+myclass;
                                        }
                                    } 
                                }
                            });

                        }
                    }
                });
            }
        });
    </script>
</body>
</html>