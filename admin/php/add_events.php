<?php


    include 'book_db.php';

    $d = date('Y-m-d H:i:s');

  
    $destination = "events-images/";
    $file_name = $destination . $_FILES['file']['name'];
 
    if(isset($_FILES['file']) and !$_FILES['file']['error']){
    
        move_uploaded_file($_FILES['file']['tmp_name'], $destination . $_FILES['file']['name']);
        mysqli_query($conn, "INSERT INTO `events` (`event_title`, `date_created`, `date_of_event`, `event_image` , `start_time`, `end_time`, `event_description`) VALUES ('" . $_POST['event_title'] . "','" . $d . "' ,'" . $_POST['event_date'] . "','" . $file_name . "', '" . $_POST['start_time'] . "', '" . $_POST['end_time'] . "','" . $_POST['desc'] . "')");
    }


    echo "200";
   
    mysqli_close($conn);




?>