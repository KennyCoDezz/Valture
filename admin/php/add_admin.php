<?php


    include 'admin_db.php';

    $d = date('Y-m-d H:i:s');

    mysqli_query($conn, "INSERT INTO `regular_admin` (`admin_email`, `admin_pass`, `date_created`, `f_name` , `l_name`, `contact_no`) VALUES ('" . $_POST['email'] . "','" . md5($_POST['password']) . "' ,'" . $d . "', '" . $_POST['f_name'] . "', '" . $_POST['l_name'] . "','" . $_POST['contact_no'] . "')");

    echo "200";
    mysqli_close($conn);




?>