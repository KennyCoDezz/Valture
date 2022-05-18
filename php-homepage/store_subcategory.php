<?php

    session_start();

    $subcategory = $_POST['row_id'];

    $_SESSION['sub_category_value'] = $subcategory;
    
    echo $_SESSION['sub_category_value'];

?>