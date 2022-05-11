<?php
    session_start();
    session_destroy();
    unset($_SESSION['user_email']);
    ob_end_clean();
    header('Location: /Valture/LogSign/log_sign.html');

?>