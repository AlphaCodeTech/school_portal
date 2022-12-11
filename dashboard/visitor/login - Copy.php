<?php
session_start();

    if(isset($_POST['login'])){

        $dbuser="root";
        $dbpass="";
        $host="localhost";
        $dbname = "dfisportal";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = " SELECT * FROM employee_data where admno = '$username' && password = '$password'  ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows == 1 ) {
            $_SESSION['sd'] = $row;
            header("Location: ../user/dashboard.php");
        }else{
            echo "<script>
                    window.alert('Error: username or Password is Incorrect');
                    </script>";
        }


    }

    if(isset($_POST['login'])){

        $dbuser="root";
        $dbpass="";
        $host="localhost";
        $dbname = "dfisportal";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = " SELECT * FROM student_data where admno = '$username' && password = '$password'  ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows == 1 ) {
            $_SESSION['sd'] = $row;
            header("Location: ../user/dashboard.php");
        }else{
            echo "<script>
                    window.alert('Error: username or Password is Incorrect');
                </script>";
        }


    }

?>

<!DOCTYPE html>
<html>
<head>
	<?php include "../partials/visitor/head.php" ?>
</head>
<body>
    <div class="container-scroller">
        <header>
            <?php include "../partials/visitor/header.php" ?>
        </header>
        <main>
            <div class="container">

                <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"></p>
                    <form action="login.php" method="post" class="form-signin">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Admission Number" required autofocus>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button name="login" class="btn btn-lg btn-danger btn-block btn-signin" type="submit">Sign in &nbsp;&nbsp; <span class="fa fa-sign-in"></span></button>
                    </form><!-- /form -->

                    <a href="#" class="forgot-password">
                        Forgot the password?
                    </a>
                </div><!-- /card-container -->
            </div><!-- /container -->
        </main>
        <footer>
            <?php include "../partials/visitor/footer.php" ?>
        </footer>            
    </div>
    <style>
        main{
            margin-top:85px;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../resources/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/owl.carousel.min.js"></script>
    <script src="../resources/js/wow.js"></script>
    <script src="../resources/js/main.js"></script>
</body>
</html>