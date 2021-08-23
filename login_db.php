<?php
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']) ;
        $password = mysqli_real_escape_string($conn, $_POST['password']) ;

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if(empty($password)) {
            array_push($errors, "password is required");
        }

        if (count($errors) == 0 ) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username ;
                $_SESSION['success'] = "You are login" ;
                header("location: index.php");
            }else {
                array_push($errors, "Wroing username/pasword conbination");
                $_SESSION['error'] = "You are login agein" ;
                header("location: login.php");
            }
        }else {
            array_push($errors, "username/pasword is required");
            $_SESSION['error'] = "username/pasword is required" ;
            header("location: login.php");
        }
        
    }

?>