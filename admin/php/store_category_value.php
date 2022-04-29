<?php

    session_start();

    $_SESSION['sub_categ'] = $_POST['current_categ'];

    if ($_SESSION['sub_categ'] == $_POST['current_categ']) {
        echo "200";
    } else {
        echo "500";
    }




?>