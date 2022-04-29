<?php

    session_start();

    include '/xampp/htdocs/Valture/AdminLogin/php/db.php';
    $pass = md5($_POST['pass']);

    if ($_SESSION['adminType'] == "superadmin") {

        $result = mysqli_query($conn,"SELECT * FROM super_admin WHERE super_admin_user = '" . $_POST['userName'] . "'");
        $row = mysqli_num_rows($result);

        
        if ($row > 0) {

            $pass_result = mysqli_query($conn,"SELECT super_admin_pass FROM super_admin WHERE super_admin_user='" . $_POST['userName'] . "'");
            $string_pass = $pass_result->fetch_array()['super_admin_pass'] ?? '';

            if ($pass == $string_pass) {
           
                echo "200";
               
            } else {
                echo "500";
            }
    
           
        } else {
            echo  "600";;
        }

        
    } else {
        $result = mysqli_query($conn,"SELECT * FROM regular_admin WHERE admin_email = '" . $_POST['userName'] . "'");
        $row = mysqli_num_rows($result);

        if ($row > 0) {

            $pass_result = mysqli_query($conn,"SELECT admin_pass FROM regular_admin WHERE admin_email ='" . $_POST['userName'] . "'");
            $string_pass = $pass_result->fetch_array()['admin_pass'] ?? '';

            if ($pass == $string_pass) {
           
                echo "300";
               
            } else {
                echo "500";
            }
        }
    }




?>