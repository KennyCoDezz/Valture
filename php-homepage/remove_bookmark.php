<?php

    require 'user_db.php';

    $id = $_POST['row_id'];

    mysqli_query($conn_users, "DELETE FROM user_bookmark WHERE id = {$id}");
    mysqli_query($conn_users, "ALTER TABLE `user_bookmark` DROP COLUMN id");
    mysqli_query($conn_users, "ALTER TABLE `user_bookmark` ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST"); 
    mysqli_close($conn_users);  

    echo "200";







?>