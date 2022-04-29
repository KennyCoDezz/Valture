<?php

    include 'user_db.php';

    $id = $_POST['id_no'];

    $email = "";
    $contact = "";
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$id."'");
   
    while($row = mysqli_fetch_array($result)) {

        $email = $row['email'];
        $contact = $row['contact_no'];

    }

    $data = [ 'email' => $email, 'contactNo' => $contact];
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