<?php

    session_start();
    $_SESSION['adminType'] = "superadmin";
    

?>


<!DOCTYPE html>
<html>

<head>
    <title>Super Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="AdminStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3f349edde5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="content_box">
        <div class="super-img"></div>
        <div class="form_page_super">

            <a href="AdminPlatform.html"> <img src="img/backbutton.png" class="back">
                <p class="backtext">Back </p>
                </img>
            </a>

            <form class="form">

                <h2>SUPER ADMIN</br>LOG IN</h2>

                <span class="input-group">
                                <label>Username</label>
                                <input type="text"  id="username" onkeyup="validateUser()">   <img src="img/user.png" class="user_icon"></img>			
                                <p id="usererror"></p>
    
            </span>

                <span class="input-group">
                            <label>Password</label>
                            <input type="password"  id="password" onkeyup="validatePassword()"/> <img src="img/passlock.png" class="password_icon"></img>	
                            <p id="passworderror"></p>
            </span>


                <input type="button" value="LOG IN" id="login_btn" onclick="validateLogin()" />

            </form>
        </div>
    </div>
    </div>





    <script type="text/javascript" src="adminScript.js"></script>

</body>

</html>