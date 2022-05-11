<?php

    include 'user_db.php';
    include 'book_db.php';

    $controllerValue = $_POST['controlValue'];
    $user = $_POST['user'];
    $book_title = $_POST['book'];
    $isbn = $_POST['isbn_no'];
    $plus_date = $_POST['numberAdded'];
    $book_author = $_POST['author'];
    $book_image = $_POST['image'];
    $new_date = "";
    $day = 24;

    if ($controllerValue == 1) {
        
        echo "200";

    } else {

        if ($plus_date < 24) {

            $book_query = mysqli_query($conn, "SELECT `book_slot` FROM book_record WHERE book_title = '" . $book_title . "' ");

            while($row = mysqli_fetch_assoc($book_query)) {
                $slot = $row['book_slot'];
            }

            if ($slot == 0) {

                echo "404";

            } else {

                $current_date = "";
                $current_date = date("Y-m-d H:i:s");
                $new_date =  date("Y-m-d H:i:s", strtotime('+'.$plus_date .' hours'));


                $new_slot = $slot - 1;

                mysqli_query($conn, "UPDATE `book_record` SET book_slot = '" . $new_slot . "' WHERE book_title = '" . $book_title . "' ");
                mysqli_close($conn);
        
                mysqli_query($conn_users, "INSERT INTO `users_borrow` (`rented_book`, `book_author`, `book_image`, `date_of_borrowing`, `book_isbn`, `returned_date`, `renter`) VALUES ('" . $book_title . "','" . $book_author . "' , '" . $book_image . "','" . $current_date . "', '" . $isbn . "', '" . $new_date . "',  '" . $user . "')");
                mysqli_close($conn_users);
        
                echo "200";
    

            }

            
        } else {

            $book_query = mysqli_query($conn, "SELECT `book_slot` FROM book_record WHERE book_title = '" . $book_title . "' ");

            while($row = mysqli_fetch_assoc($book_query)) {
                $slot = $row['book_slot'];
            }

            if ($slot == 0) {

                echo "404";
                
            } else {
    
                $current_date = "";
                $current_date = date("Y-m-d H:i:s");

                $newTime = $plus_date/$day;
        
                $new_date =  date("Y-m-d H:i:s", strtotime('+'.$newTime .' days'));

                $new_slot = $slot - 1;

                mysqli_query($conn, "UPDATE `book_record` SET book_slot = '" . $new_slot . "' WHERE book_title = '" . $book_title . "' ");
                mysqli_close($conn);
        
                mysqli_query($conn_users, "INSERT INTO `users_borrow` (`rented_book`, `book_author`, `book_image`, `date_of_borrowing`, `book_isbn`, `returned_date`, `renter`) VALUES ('" . $book_title . "','" . $book_author . "' , '" . $book_image . "','" . $current_date . "', '" . $isbn . "', '" . $new_date . "',  '" . $user . "')");
                mysqli_close($conn_users);
        
                echo "200";
            }
        }

    }


?>