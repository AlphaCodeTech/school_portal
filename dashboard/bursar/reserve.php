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
                            <h5 class="card-title mb-4">Settings > Level <i class="menu-icon mdi mdi-setting"></i></h5>
                            <div class="fluid-container">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="user_data">
                                        <thead>
                                            <th>S/N</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div contenteditable>1</div></td>
                                                <td><div contenteditable>Jss1</div></td>
                                                <td><button class="edit" id="1">Edit</button></td>
                                            </tr>
                                        </tbody>
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

    <!--  cdns  -->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
    <?php include "../partials/user/bottom.php" ?>
    
    <script>
        $(document).ready(function(){

            
            
            $('#user_data').DataTable({

            });

            fetch_level();

            function fetch_level(){
                $.ajax({
                    url:"ServerSide/fetch/fetch_level.php",
                    method:"POST",
                    data:{},
                    success:function(data){
                        $('tbody1').html(data);
                    }
                })
            };
        });

        $(document).on('click', '.edit', function(){
            /*var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
                $tds = $row.find("td");             // Finds all children <td> elements

            $.each($tds, function() {               // Visits every single <td> element
                alert($(this).text());              // Prints out the text within the <td>
            });*/

            var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
                $tds = $row.find("td:nth-child(1)"); // Finds the 1nd <td> element
                $td2 = $row.find("td:nth-child(2)"); // Finds the 2nd <td> element

            $.each($tds, function() {                 // Visits every single <td> element
                $name = $(this).text();               // Prints out the text within the <td>
            });

            $.each($td2, function() {                // Visits every single <td> element
                $phone = $(this).text();             // Prints out the text within the <td>
            });

            alert($name);
            alert($phone);

        });
    </script>
</body>
</html>