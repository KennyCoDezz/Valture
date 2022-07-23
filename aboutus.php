<?php

    include 'includes/registered-nav.php';

?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">

    <title>About Us</title>
</head>



<style>
    nav.main-nav {
        position: absolute;
        background: transparent;
    }
    
    nav.main-nav .logo {
        color: var(--link-lightcolor);
    }
    
    nav.main-nav ul li a {
        color: var(--link-lightcolor);
    }
    
    nav.main-nav ul li:hover>ul {
        background: var(--transparentnav-darkcolor);
    }
    
    @media screen and (max-width: 850px) {
        nav.main-nav {
            position: relative;
            background: var(--transparentnav-lightcolor);
        }
        nav.main-nav .icon {
            color: var(--link-color);
        }
        nav.main-nav .logo {
            color: var(--link-color);
        }
        nav.main-nav ul li a {
            color: var(--link-color);
        }
        nav.main-nav ul li:hover>ul {
            background: var(--transparentnav-lightcolor);
        }
        nav.main-nav ul li i {
            font-size: 20px;
            padding: 0 3px;
        }
    }
</style>

<!-- IMAGE HEADER -->

<header class="homepage_header">
    <div class="carousel">
        <div class="carousel__item carousel__item--visible">
            <img src="assets/images/1.jpg">
            <div class="aboutus_header">
                <h2> ABOUT US </h2>
            </div>
        </div>
    </div>
</header>


<!-- CONTENT  BOX 1-->
<div>
    <div class="first-box">

        <div class="box1">
            <h2> <b>  WHO WE ARE </b> </h2>
            <p class="desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel fringilla est ullamcorper eget nulla
                facilisi etiam dignissim diam quisLorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo,
                vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam quis </p>
        </div>

        <div class="box2">
            <img class="pic1" src="assets/images/3.jpg">
        </div>

    </div>

    <!-- CONTENT  BOX 2-->

    <div class="second-box">

        <div class="box3">
            <img class="pic2" src="assets/images/2.jpg">
        </div>

        <div class="box4">
            <h2> <b>  MISSION - VISION </b> </h2>
            <p class="desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel fringilla est ullamcorper eget nulla
                facilisi etiam dignissim diam quisLorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo,
                vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam quis </p>
        </div>



    </div>
</div>






<footer>
    <div class="footer-wrapper">
        <div class="footer-section footer-1">
            <div class="footer-text">
                <h2>VALTURE</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, modi quis? Inventore voluptatem aut omnis quasi sint ex itaque laboriosam facere officia dolorem maxime, placeat quos veritatis voluptas repellendus ea.
                </p>
            </div>
        </div>
        <div class="footer-section footer-2">
            <a href="#"><i class="fa-brands fa-facebook-square"></i></a>
            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
            <a href="#"><i class="fa-brands fa-twitter-square"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </div>
</footer>

</html>