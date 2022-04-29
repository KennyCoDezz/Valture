<?php


    include 'admin_db.php';

    $id = $_POST['id_no'];

    mysqli_query($conn, "UPDATE regular_admin SET admin_email = '" . $_POST['email'] . "', admin_pass = '" . md5($_POST['password']) . "' , f_name ='" . $_POST['f_name'] . "', l_name = '" . $_POST['l_name'] . "', contact_no = '" . $_POST['contact_no'] . "' where id = '".$id."'");
    //admin_email = '" . $_POST['email'] . "', admin_pass = '" . md5($_POST['password']) . "' , f_name ='" . $_POST['f_name'] . "', l_name = '" . $_POST['l_name'] . "', contact_no = '" . $_POST['contact_no'] . "' where id = '".$id."'"

    echo "200";
    mysqli_close($conn);



?>