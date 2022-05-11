<?php

    include '/xampp/htdocs/Valture/admin/php/user_db.php';

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact_no'];

    mysqli_query($conn, "UPDATE `users` SET f_name = '" .$f_name . "', l_name = '" . $l_name . "', email = '" . $email . "' , contact_no = '" . $contact ."' WHERE email = '" . $email . "'");

    mysqli_close($conn);

    echo "200";






?>