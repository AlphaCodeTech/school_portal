<?php
    session_start();

    if(isset($_GET['login'])){

        $dbuser="root";
        $dbpass="";
        $host="localhost";
        $dbname = "dfisportal";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        $username = $_GET['username'];
        $password = md5($_GET['password']);

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

    if(isset($_GET['login'])){

        $dbuser="root";
        $dbpass="";
        $host="localhost";
        $dbname = "dfisportal";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

        $username = $_GET['username'];
        $password = md5($_GET['password']);

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
