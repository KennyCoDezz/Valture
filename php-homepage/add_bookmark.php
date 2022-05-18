<?php

    require 'user_db.php';

    $user = $_POST['user'];
    $book_title = $_POST['book'];
    $book_author = $_POST['author'];
    $book_image = $_POST['image'];


    mysqli_query($conn_users, "INSERT INTO user_bookmark (`book_title`, `book_author`, `book_image`, `email`) VALUES ('" . $book_title . "', '" . $book_author . "', '" . $book_image . "', '" . $user . "')");
    mysqli_close($conn_users);

    echo "200";

?>