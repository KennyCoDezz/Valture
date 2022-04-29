<?php

    session_start();

    $_SESSION['adminType'] = "";



?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Platform</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="AdminStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">	
        <script src="https://kit.fontawesome.com/3f349edde5.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    
    <body>

        <div class = "content_box">
        <div class="img"></div>
            <div class="form_page">

                <a href="none.html"> <img src="img/backbutton.png" class="back"> <p class="backtext">Back </p></img></a>

                <div class ="platform">

                    <h2>Hi there!</h2>	
                    <p>which admin are you?</p>
        
                    <a href="SuperAdminLog.php" ><button>SUPER ADMIN</button> </a> 
                    <a href="AdminLog.php"> <button> ADMIN </button> </a>


             </div>
        </div>
       



        
            <script type="text/javascript" src="adminScript.js"></script>
    
    </body>
    </html>

    