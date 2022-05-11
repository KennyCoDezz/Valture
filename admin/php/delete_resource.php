<?php

    include 'book_db.php';

    $id = $_POST['id'];

    $result = mysqli_query($conn, "SELECT * FROM `book_record` WHERE id = {$id}");

    
    while($row = mysqli_fetch_array($result)) {
                            
        $image = $row['book_image'];
        $file = $row['book_file'];

        unlink($image);
        unlink($file);
        
    }


    mysqli_query($conn, "DELETE FROM `book_record` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `book_record` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE  book_record ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   
    mysqli_close($conn);                

    echo "200";


?>