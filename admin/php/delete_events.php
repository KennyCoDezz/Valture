<?php

    include 'book_db.php';

    $id = $_POST['id'];

    $result = mysqli_query($conn, "SELECT * FROM events WHERE id = {$id}");

    
    while($row = mysqli_fetch_array($result)) {
                            
        $data = $row['event_image'];
        unlink($data);
        
    }


    mysqli_query($conn, "DELETE FROM `events` WHERE id = '".$id."'");
    mysqli_query($conn, "ALTER TABLE `events` DROP COLUMN id");
    mysqli_query($conn, "ALTER TABLE  events ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   
                    
    echo "200";
    mysqli_close($conn);


?>