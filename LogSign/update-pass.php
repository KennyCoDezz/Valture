<?php

    session_start();

    include 'db.php';

    $email = $_SESSION['email'];    
    $password = md5($_POST['password']);

    mysqli_query($conn, "UPDATE `users` SET `password` = '".$password."' WHERE email = '".$email."'");

    echo "200";

    
?>