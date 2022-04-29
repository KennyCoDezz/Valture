<?php


    include 'book_db.php';

    $id = $_POST['id'];
    $sub_categ = $_POST['sub_category'];

    mysqli_query($conn, "DELETE FROM `book_category` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `book_category` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE book_category ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   
    mysqli_query($conn, "DROP TABLE {$sub_categ};");                     
    echo "200";
    mysqli_close($conn);



?>