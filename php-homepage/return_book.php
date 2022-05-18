<?php

    include 'book_db.php';
    include 'user_db.php';

    $book_title = $_POST['book'];
    $user = $_POST['email'];

    mysqli_query($conn, "UPDATE `book_record` SET book_slot = book_slot + 1 WHERE book_title = '" . $book_title . "'");

    mysqli_query($conn_users, "DELETE FROM users_borrow WHERE renter = '" . $user . "' AND rented_book = '" . $book_title ."'");
    mysqli_query($conn_users, "ALTER TABLE `users_borrow` DROP COLUMN id");
    mysqli_query($conn_users, "ALTER TABLE `users_borrow` ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   



    mysqli_close($conn);
    mysqli_close($conn_users);

    echo "200";







?>