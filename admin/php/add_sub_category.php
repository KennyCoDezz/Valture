<?php

    session_start();

    include 'book_db.php';
    $column = $_SESSION['sub_categ'];
    $sub_categ = $_POST['sub_categ'];

    mysqli_query($conn, "INSERT INTO `{$column}` (`list_sub_categ`) VALUES ('" . $sub_categ. "')");
    //mysqli_query($conn, "ALTER TABLE book_sub_category ADD `{$sub_categ}` VARCHAR(300) NOT NULL");

    echo "200";
    mysqli_close($conn);




?>