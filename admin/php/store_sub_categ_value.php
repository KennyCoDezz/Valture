<?php

    require('book_db.php');

    $sql = "SELECT * FROM {$_GET['column']}"; 

    $column = [];
        
    $result = $conn->query($sql);


    
    while($row = mysqli_fetch_array($result)){
        $column[$row['id']] = $row['list_sub_categ'];
    }

    header('Content-type: application/json');
    
    $json = json_encode($column);
    
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