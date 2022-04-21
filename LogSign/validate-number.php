<?php 


    include 'db.php';

    $result = mysqli_query($conn,"SELECT email FROM users WHERE contact_no = '" . $_POST['number'] . "'");
    $row = mysqli_num_rows($result);

    if ($row > 0) {

      
        echo "200";
           

    } else {
        echo "600";
    }




?>