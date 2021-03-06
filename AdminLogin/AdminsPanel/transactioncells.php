
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/transactions.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <style>
        @media screen and (max-width: 500px) {
            /**    Start of <--  NAVIGATION / MENU  -->   **/
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
        <div class="logo">
            <span>Valture</span>
            <i class="fa-solid fa-circle"></i>
            <span class="panel_text">Admin's Panel</span>
        </div>
        <label for="btn" class="icon">
					<i class="fa-solid fa-bars"></i>
				</label>
        <input type="checkbox" id="btn">
        <ul>
            <li><a class="logout" href="/Valture/AdminLogin/php/log_out.php">SIGN OUT</a></li>
        </ul>

    </div>
</nav>

<body>



    <hr />

    <header class="title">
        <div class="container">
            <a href="#" onclick="redirectBtn()"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">WEBSITE CONTENTS</h1>
        </div>
    </header>

    <hr />



    <div class="row">

        <div class="column">
            <a href="/Valture/admin/logs.php">
                <div class="card">
                    <img src="assets/images/logs.png" alt="Avatar" style="width:100%">
                    <div class="container">
                        <h4><b>LOGS</b></h4>
                    </div>
                </div>
            </a>
        </div>


        <div class="column">
            <a href="/Valture/admin/settings.html">
                <div class="card">
                    <img src="assets/images/settings.png" alt="Avatar" style="width:100%">
                    <div class="container">
                        <h4><b>SETTINGS</b></h4>
                    </div>
                </div>
            </a>
        </div>
    </div>



    <!--- FOOTER -->

    <style>
        footer {
            background: var(--bg-graycolor);
            position: absolute;
            bottom: 0;
        }
        
        footer .footer-1 .footer-text {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 25px 0 0 0;
        }
        
        footer .footer-1 .footer-text h2 {
            font-size: 20px;
            color: var(--text-darkcolor);
        }
    </style>

    <footer>
        <div class="footer-wrapper">
            <div class="footer-section footer-1">
                <div class="footer-text">
                    <h2>VALTURE</h2>
                    <h2>All rights reserved</h2>
                    <h2>2021</h2>
                </div>
            </div>
        </div>
    </footer>


</body>

<script>

    function redirectBtn() {

        $.ajax({
            type: "POST", //type of method
            url: "/Valture/AdminLogin/php/back_button.php", //your page
            success: function(res) {

                window.location.href = res;
               
            }
        });
    }


</script>

</html>