<?php

    require 'book_db.php';

    $destination_img = "book-cover-image/";
    $destination_pdf = "book-file/";
    $validator = $_POST['validator'];
    $id = $_POST['id'];
    $file_name= $_POST['name_of_file'];
    $category = $_POST['category'];
    $sub_id = $_POST['subcategory'];
    $new_subcategory = "";
    
   
    if ($validator == "500") {

        if ($sub_id == "select") {
            //do nothing
        } else {
            $result = mysqli_query($conn, "SELECT * FROM $category WHERE id = $sub_id");
    
            while($row = mysqli_fetch_array($result)) {
                                
                $new_subcategory = $row['list_sub_categ'];
    
            }
    
            mysqli_query($conn, "UPDATE `book_record` SET sub_category = '$new_subcategory' WHERE id = {$id}");
           
        }
    
        

        mysqli_query($conn, "UPDATE `book_record` SET book_author = '" . $_POST['author'] . "', book_isbn = '" . $_POST['isbn'] . "', book_desc = '" . $_POST['des'] . "', date_added = '" . $_POST['date'] . "', page_no = '" . $_POST['pageNo'] . "', book_title = '" . $_POST['title'] . "', featured = '" . $_POST['feature'] . "', keywords = '" . $_POST['keywords'] . "', category = '" . $_POST['category'] . "' WHERE id = {$id}");

        mysqli_close($conn);


    } else if ($validator == "300") {
            
        if ($file_name == "image_file") {

            if ($sub_id == "select") {
                //do nothing
            } else {
                $result = mysqli_query($conn, "SELECT * FROM $category WHERE id = $sub_id");
        
                while($row = mysqli_fetch_array($result)) {
                                    
                    $new_subcategory = $row['list_sub_categ'];
        
                }
        
                mysqli_query($conn, "UPDATE `book_record` SET sub_category = '$new_subcategory' WHERE id = {$id}");
                mysqli_close($conn);
            }
        

            $result = mysqli_query($conn, "SELECT * FROM `book_record` WHERE id = {$id}");

    
            while($row = mysqli_fetch_array($result)) {
                            
                $data = $row['book_image'];
                unlink($data);
        
            }

            $name = $_FILES[$file_name]['name'];
            $directory = $destination_img . $name;

            move_uploaded_file($_FILES['image_file']['tmp_name'], $destination_img . $_FILES['image_file']['name']);
            
            mysqli_query($conn, "UPDATE `book_record` SET book_image = '$directory', book_author = '" . $_POST['author'] . "', book_isbn = '" . $_POST['isbn'] . "', book_desc = '" . $_POST['des'] . "', date_added = '" . $_POST['date'] . "', page_no = '" . $_POST['pageNo'] . "', book_title = '" . $_POST['title'] . "', featured = '" . $_POST['feature'] . "', keywords = '" . $_POST['keywords'] . "', category = '" . $_POST['category'] . "' WHERE id = {$id}");

            mysqli_close($conn);
    

        } else {

            if ($sub_id == "select") {
                //do nothing
            } else {
                $result = mysqli_query($conn, "SELECT * FROM $category WHERE id = $sub_id");
        
                while($row = mysqli_fetch_array($result)) {
                                    
                    $new_subcategory = $row['list_sub_categ'];
        
                }
        
                mysqli_query($conn, "UPDATE `book_record` SET sub_category = '$new_subcategory' WHERE id = {$id}");
               
            }
        

            $result = mysqli_query($conn, "SELECT * FROM `book_record` WHERE id = {$id}");

    
            while($row = mysqli_fetch_array($result)) {
                            
                $data = $row['book_file'];
                unlink($data);
        
            }

            $name = $_FILES[$file_name]['name'];
            $directory = $destination_pdf . $name;

            move_uploaded_file($_FILES['pdf_file']['tmp_name'], $destination_pdf . $_FILES['pdf_file']['name']);

            mysqli_query($conn, "UPDATE `book_record` SET book_file = '$directory', book_author = '" . $_POST['author'] . "', book_isbn = '" . $_POST['isbn'] . "', book_desc = '" . $_POST['des'] . "', date_added = '" . $_POST['date'] . "', page_no = '" . $_POST['pageNo'] . "', book_title = '" . $_POST['title'] . "', featured = '" . $_POST['feature'] . "', keywords = '" . $_POST['keywords'] . "', category = '" . $_POST['category'] . "' WHERE id = {$id}");

            mysqli_close($conn);
        }

    } else if ($validator == "200") {

        if ($sub_id == "select") {
            //do nothing
        } else {
            $result = mysqli_query($conn, "SELECT * FROM $category WHERE id = $sub_id");
    
            while($row = mysqli_fetch_array($result)) {
                                
                $new_subcategory = $row['list_sub_categ'];
    
            }
    
            mysqli_query($conn, "UPDATE `book_record` SET sub_category = '$new_subcategory' WHERE id = {$id}");
           
        }

        $directory_img = $destination_img . $_FILES['image_file']['name'];
        $directory_pdf = $destination_pdf .  $_FILES['pdf_file']['name'];

        move_uploaded_file($_FILES['image_file']['tmp_name'], $directory_img);
        move_uploaded_file($_FILES['pdf_file']['tmp_name'], $directory_pdf);

        mysqli_query($conn, "UPDATE `book_record` SET book_file = '$directory_pdf', book_image = '$directory_img', book_author = '" . $_POST['author'] . "', book_isbn = '" . $_POST['isbn'] . "', book_desc = '" . $_POST['des'] . "', date_added = '" . $_POST['date'] . "', page_no = '" . $_POST['pageNo'] . "', book_title = '" . $_POST['title'] . "', featured = '" . $_POST['feature'] . "', keywords = '" . $_POST['keywords'] . "', category = '" . $_POST['category'] . "' WHERE id = {$id}");

    } else {
        echo "malas";
    }

    echo "200";

?>