<?php


    include 'user_db.php';

    $id = $_POST['id_no'];

    mysqli_query($conn, "DELETE FROM `users` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `users` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE users ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");                        
    echo "200";
    mysqli_close($conn);



?>