<?php

    include 'book_db.php';

    mysqli_query($conn, "UPDATE `book_record` SET book_slot = '".$_POST['slot']."'");
    mysqli_close($conn);

    echo "200";



?>