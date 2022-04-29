<?php


    include 'book_db.php';

    $destination_img = "book-cover-image/";
    $destination_pdf = "book-file/";
    $file_name_img = $destination_img .$_FILES['image_file']['name'];
    $file_name_pdf =  $destination_pdf . $_FILES['pdf_file']['name'];

    if(isset($_FILES['image_file']) and !$_FILES['image_file']['error']){

       mysqli_query($conn, "INSERT INTO `book_record` (`book_file`, `book_image`, `book_author` , `book_isbn`, `book_desc`, `date_added`, `page_no`, `book_title`, `featured`, `keywords`, `category`, `sub_category`) VALUES ('$file_name_pdf','$file_name_img' ,'" . $_POST['author'] . "','" . $_POST['isbn'] . "', '" . $_POST['des'] . "', '" . $_POST['date'] . "','" . $_POST['pageNo'] . "', '" . $_POST['title'] . "', '" . $_POST['feature'] . "' , '" . $_POST['keywords'] . "', '" . $_POST['category'] . "', '" . $_POST['subcategory'] . "')");

       mysqli_close($conn);
        
       move_uploaded_file($_FILES['image_file']['tmp_name'], $file_name_img);
       move_uploaded_file($_FILES['pdf_file']['tmp_name'], $file_name_pdf);


    }

    echo "200";




?>