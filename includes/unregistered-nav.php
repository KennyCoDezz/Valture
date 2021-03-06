<?php
    session_start();
    ob_start();
    error_reporting(0);

    $user = $_SESSION['user_email'];

    if ($user == "") {
       // header('Location: /Valture/LogSign/log_sign.html');
    } else {
        header('Location: /Valture/homepage-registered.php');
    }

?>

<head>
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <style>
        @media screen and (max-width: 600px) {
            /**    Start of <--  NAVIGATION / MENU  -->   **/
            nav.main-nav .logo {
                display: block;
            }
            nav.main-nav .nav-wrapper {
                margin: 0px 10px;
            }
            nav.main-nav .logo {
                padding-left: 15px;
                width: 100%;
            }
            nav.main-nav .show {
                display: block;
                color: var(--link-color);
                font-size: 14px;
                padding: 0px 15px;
                line-height: 70px;
                font-weight: 600;
                cursor: pointer;
                -webkit-transition: 0.2s ease-in-out;
                transition: 0.2s ease-in-out;
            }
            nav.main-nav .icon {
                display: block;
                color: var(--link-color);
                position: absolute;
                margin: 20px 30px 20px 20px;
                top: 0;
                right: 0;
                font-size: 25px;
                cursor: pointer;
            }
            nav.main-nav .show+a,
            nav.main-nav ul {
                display: none;
            }
            nav.main-nav .show:hover {
                color: var(--linkhover-lightcolor);
            }
            nav.main-nav ul {
                margin-right: 0px;
                width: 100%;
                float: left;
            }
            nav.main-nav ul li,
            nav.main-nav ul ul li {
                display: block;
                text-align: center;
                width: 100%;
            }
            nav.main-nav ul li i.fa-caret-down {
                padding: 10px 3px !important;
            }
            nav.main-nav ul ul {
                top: 70px;
                position: static;
                border-top: none;
                float: none;
                display: none;
                opacity: 1;
                visibility: visible;
            }
            nav.main-nav ul ul li {
                border-bottom: 0px;
            }
            nav.main-nav ul ul a {
                padding-left: 40px;
            }
            nav.main-nav ul li a:hover {
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            [id^="btn"]:checked+ul {
                display: block;
            }
            /**    End of <--  NAVIGATION / MENU  -->   **/
        }
    </style>
</head>

<nav class="main-nav">
    <div class="nav-wrapper">
        <div class="logo">Valture</div>
        <label for="btn" class="icon">
            <i class="fa-solid fa-bars"></i>
        </label>
        <input type="checkbox" id="btn">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a class="register signup" href="">Sign up</a></li>
            <li><a class="register login" href="LogSign/log_sign.html">Log in</a></li>
        </ul>
    </div>
</nav>