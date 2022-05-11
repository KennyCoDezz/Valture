<?php
    
    require 'book_db.php';
       
    header('Content-type: application/json');

    $date_of_event = "";
    $event_image = "";
    $start_time = "";
    $end_time = "";
    $event_desc = "";
    $event_title = "";
    $date = "";

    $result = mysqli_query($conn, "SELECT * FROM `events` WHERE event_title = '" . $_POST['eventName'] . "'");
   
    while($row = mysqli_fetch_array($result)) {

        $date_of_event = $row['date_of_event'];
        $event_image = $row['event_image'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $event_desc = $row['event_description'];
        $event_title = $row['event_title'];

    }

    $date = date("F d, Y l", strtotime($date_of_event));

    $data = [

        'date' => $date, 
        'imageSrc' => $event_image,
        'start' => $start_time,
        'end' => $end_time,
        'desc' => $event_desc,
        'title' => $event_title
    ];

    
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