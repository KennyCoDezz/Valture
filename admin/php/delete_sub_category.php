<?php

    session_start();
    include 'book_db.php';

    $id = $_POST['id'];
    $sub_categ = $_SESSION['sub_categ'];

    mysqli_query($conn, "DELETE FROM `{$sub_categ}` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `{$sub_categ}` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE {$sub_categ} ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   
                  
    echo "200";
    mysqli_close($conn);



?>