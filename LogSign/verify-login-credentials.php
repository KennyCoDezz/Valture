<?php

    session_start();

    $_SESSION['user_email'] = "";

    include "db.php";
    $pass = md5($_POST['password']);
    $email = $_POST['email'];
        
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $row = mysqli_num_rows($result);

    if ($row > 0) {

        $pass_result = mysqli_query($conn,"SELECT password FROM users WHERE email='" . $_POST['email'] . "'");
        $string_pass = $pass_result->fetch_array()['password'] ?? '';
        

        if ($pass == $string_pass) {

            $_SESSION['user_email'] = $email;
           
            echo "200";
           
        } else {
            echo "500";
        }

    } else {
        echo "600";
    }

?>

