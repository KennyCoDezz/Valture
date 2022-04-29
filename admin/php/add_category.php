<?php


    include 'book_db.php';

    $sub_categ = $_POST['categ'];

    mysqli_query($conn, "INSERT INTO `book_category` (`categ`) VALUES ('" . $_POST['categ'] . "')");
    mysqli_query($conn, "
    
            CREATE TABLE {$sub_categ} (
                id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                list_sub_categ VARCHAR(250) NOT NULL
            );
    
    
    ");

    echo "200";
    mysqli_close($conn);




?>