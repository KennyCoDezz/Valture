<?php 

    session_start();
    include 'db.php';

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $email = $_POST['email'];
        $no_result = mysqli_query($conn,"SELECT contact_no FROM users WHERE email = '" . $_POST['email'] . "'");
        $string_no = $no_result->fetch_array()['contact_no'] ?? '';
        $_SESSION['email'] = $email;
        $_SESSION['number'] = $string_no;
        echo "200";
           

    } else {
        echo "600";
    }




?>