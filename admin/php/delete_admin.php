<?php


    include 'admin_db.php';

    $id = $_POST['id_no'];

    mysqli_query($conn, "DELETE FROM `regular_admin` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `regular_admin` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE regular_admin ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");                        
    echo "200";
    mysqli_close($conn);



?>