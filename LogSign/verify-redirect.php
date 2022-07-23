<!DOCTYPE html>

<head>
    <title>Account Verification Successful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">

    <style>
        body {
            background-color: #fafafa;
            font-family: Century-Gothic;
        }
        
        div.content {
            display: inline-flex;
            height: 200px;
            width: 750px;
            background-color: beige;
            background-color: #fafafa;
            border-radius: 8px;
            border: 1px solid #dfe3e6;
            box-shadow: 10px 10px 5px grey;
            text-align: center;
            align-items: center;
            justify-content: center;
            text-shadow: 2px 2px 2px 2px orange;
        }
    </style>
</head>

<body>


<?php
        if($_GET['key'] && $_GET['token']) {
            
            include "db.php";
            
            $email = $_GET['key'];
            $token = $_GET['token'];
            $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email_verification_link`='".$token."' and `email`='".$email."';");
            $d = date('Y-m-d H:i:s');

            if (mysqli_num_rows($query) > 0) {
                
                $row = mysqli_fetch_array($query);
                
                if($row['email_verified_at'] == NULL) {
                    
                    mysqli_query($conn,"UPDATE users set email_verified_at = '" . $d ."' , status = 'active' WHERE email='" . $email . "'");
                        
                    $msg = "Congratulations! Your email has been verified.";

                    echo '<script>';
                    echo '$(function() {
                        setTimeout(redirectPage(), 3000);
                        
                         function redirectPage() {
                            window.close();
                        }
                      });';
                    echo '</script>';
                    
                } else {
                    
                    $msg = "You have already verified your account with us";
                }

            } else {
                
                $msg = "This email has been not registered with us";
            }
        } else {
            
            $msg = "Something goes wrong!";
        }
    ?>

<center>
        <div class="content">
            <h1>
                <?php
                    echo $msg;
                ?>
            </h1>
        </div>
    </center>
</body>

</html>