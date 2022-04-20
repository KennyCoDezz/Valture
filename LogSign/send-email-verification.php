<?php
    
    include "db.php";
        
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $row = mysqli_num_rows($result);

    if($row <= 0) {
        
        $token = md5($_POST['email']).rand(10,9999);
        mysqli_query($conn, "INSERT INTO users(name, email, email_verification_link ,password, contact_no) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "','" . $_POST['contact'] . "')");
        //$link = "<p><a href='localhost/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a></p>";


        $to = $_POST['email']; 
        $from = 'plv@valture'; 
        $fromName = 'ADMIN'; 
        $subject = "Verify Your Account"; 

        $headers  = "From: " . $from. "\r\n";
        $headers .= "CC: valture@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $message = "<a href='localhost/Valture/LogSign/verify-redirect.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        
        if(mail($to, $subject, $message, $headers)) {
            echo "Check Your Email box and Click on the email verification link.".$row;
        }
        else{
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }
    mysqli_close($conn);
?>