<?php 
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbnaem = 'register';

    $conn = mysqli_connect($server, $user, $password, $dbnaem);

    if (!$conn) {
        die('connect failed' . mysqli_connect_error());
    }
?>