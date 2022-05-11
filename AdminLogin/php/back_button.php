<?php
    session_start();

    $adminType = $_SESSION['adminType'];

    if ($adminType == "superadmin") {

        echo "superadmincells.html";

    } else {

        echo "regadmincells.html";
    }



?>