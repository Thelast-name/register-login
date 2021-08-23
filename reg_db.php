<?php
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['but'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    }

    if (empty($username)){
        array_push($errors, "Username is required");
        $_SESSION['error'] = "Username is required";
    }
    if (empty($password_1)){
        array_push($errors, "password is required");
        $_SESSION['error'] = "password is required";
    }

    $user_chack = "SELECT * FROM users WHERE username = '$username' ";
    $query = mysqli_query($conn, $user_chack);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] === $username){
            array_push($errors, "username is exists");

        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("location: index.php");
        
    }else {
        array_push($errors, "Wroing username");
        $_SESSION['error'] = "You are username" ;
        header('location: reg.php');
    }

?>