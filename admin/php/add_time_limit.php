<?php

    include 'book_db.php';

    mysqli_query($conn, "UPDATE `book_record` SET time_limit = '". $_POST['time'] ."'");

    mysqli_close($conn);

    echo "200";


?>