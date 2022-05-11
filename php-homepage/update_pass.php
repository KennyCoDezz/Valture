<?php

    session_start();

    $email = $_SESSION['user_email'];

    require '/xampp/htdocs/Valture/admin/php/user_db.php';

    $current_pass = md5($_POST['current_pass']);
    $new_password = $_POST['new_pass'];
    $retype = $_POST['retype_pass'];
    $temp_pass = "";

    $result = mysqli_query($conn,"SELECT `password` FROM users WHERE email = '" . $email . "'");

    while($row = mysqli_fetch_assoc($result)) {
        $temp_pass = $row['password'];
    }

    if ($temp_pass != $current_pass) {

        echo "500";

    } else {

        if ($new_password != $retype) {
            
            echo "300";

        } else {

            if($new_password == $retype) {
                
                $password = md5($new_password);

                mysqli_query($conn, "UPDATE `users` SET `password` = '" . $password . "' WHERE email = '" . $email . "'");
                mysqli_close($conn);
                echo "200";
            }

        }
    
    }
    







?>