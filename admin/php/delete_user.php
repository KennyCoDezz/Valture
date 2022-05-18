<?php


    include 'user_db.php';

    $id = $_POST['id_no'];

    mysqli_query($conn_user, "DELETE FROM `users` WHERE id = '".$id."'");
    mysqli_query($conn_user, "ALTER TABLE `users` DROP COLUMN id");
    mysqli_query($conn_user, "ALTER TABLE users ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");                        
    echo "200";
    mysqli_close($conn_user);



?>