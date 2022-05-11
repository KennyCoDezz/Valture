<?php
    session_start();
    session_destroy();
    unset($_SESSION['adminType']);
    header('Location: /Valture/AdminLogin/AdminPlatform.php');

?>