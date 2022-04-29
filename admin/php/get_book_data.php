<?php

    require 'book_db.php';

    $id = $_POST['id_no'];

    $book_cover = "";
    $book_file = "";
    $page_no = "";
    $isbn_no = "";
    $description = "";
    $keywords = "";
    $featured = "";
    $category = "";
    $sub_category = "";

    $result = mysqli_query($conn, "SELECT * FROM `book_record` WHERE id = '".$id."'");
   
    while($row = mysqli_fetch_array($result)) {

        $book_cover = $row['book_image'];
        $book_file = $row['book_file'];
        $page_no = $row['page_no'];
        $isbn_no = $row['book_isbn'];
        $description = $row['book_desc'];
        $keywords = $row['keywords'];
        $featured = $row['featured'];
        $category = $row['category'];
        $sub_category = $row['sub_category'];

    }

    $result_sub = mysqli_query($conn, "SELECT * FROM `$category`");

    $data = [ 

        'bookImage' => $book_cover, 
        'bookFile' => $book_file, 
        'pageNo' => $page_no, 
        'isbn' => $isbn_no, 
        'desc' => $description, 
        'keywords' => $keywords, 
        'featured' => $featured, 
        'category' => $category, 
        'subCategory' => $sub_category
    ];

    header('Content-type: application/json');
    
    $json = json_encode($data);
    
    if ($json === false) {
        // Avoid echo of empty string (which is invalid JSON), and
        // JSONify the error message instead:
        $json = json_encode(["jsonError" => json_last_error_msg()]);
        if ($json === false) {
            // This should not happen, but we go all the way now:
            $json = '{"jsonError":"unknown"}';
        }
        // Set HTTP response status code to: 500 - Internal Server Error
        http_response_code(500);
    }
    echo $json;   





?>