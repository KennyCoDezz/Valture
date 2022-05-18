<?php

    include 'includes/registered-nav.php';
    include 'php-homepage/book_db.php';
    ini_set('display_errors', '0');
    $subcateg = ucwords($_SESSION['sub_category_value']);

    $category = $conn -> query ("SELECT * FROM `book_category`");

?>


<head>
    <link rel="stylesheet" href="assets/css/document_categories.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<section class="document_categories">
    <div class="search">
        <div class="wrapper">
            <input type="text" placeholder="Search Here...">
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <a href="advance_search.php">advance search</a>
    </div>
    <div class="section-wrapper">
        <div class="section-title">
            <h2>categories</h2>
        </div>
    </div>
    <div class="document_categories_wrapper">
        <div class="categories-wrapper">
            <ul>


                <?php

                    $id = 1;
                    while($row = mysqli_fetch_assoc($category)) {
                        echo "<li>";            
                        echo "<label for='button-{$id}' id = '{$row['categ']}'onclick = 'getCateg(this.id)'>";
                        echo $row['categ'];
                        echo " <i class='fa-solid fa-caret-down' ></i>";                       
                        echo "</label>";  
                        $sub = strtolower($row['categ']);
                        
                        $sub_category = $conn -> query ("SELECT * FROM `{$sub}`");
                        echo "<input type='checkbox' id='button-{$id}'>"; 
                        echo "<ul>";
                        while($sub_row = mysqli_fetch_assoc($sub_category)) {
                           
                            echo "<li id = '{$sub_row['list_sub_categ']}' onclick = 'getSubCateg(this.id)'>{$sub_row['list_sub_categ']}</li>";
                        }
                        echo "</ul>";
                        echo "</li>";
                        $id++;
                    }



                ?>
                
            </ul>
        </div>
        <div class="documents-wrapper" id = "book-pane">

            <?php

                if ($subcateg == "") {
                    //display nothing
                } else {

                    $book_query = $conn -> query("SELECT `book_image`, `book_title`, `book_author` FROM book_record WHERE sub_category = '" . $subcateg . "'");

                    while($row = mysqli_fetch_assoc($book_query)) {

                        echo "<div>";
                        echo "<img src='admin/php/" . $row['book_image'] . "' alt=''>";
                        echo "<a href='#' id = '{$row['book_title']}' onclick = 'bookOverview(this.id)' >{$row['book_title']}<br>{$row['book_author']}</a>";
                        echo "</div>";

                    }
                }
                
            ?>
          
        </div>
    </div>
</section>

<script>

    var newID = "";

    function getSubCateg(id) {

        $.ajax({

            type: "POST", //type of method
            url: "php-homepage/store_subcategory.php", //your page
            data: { row_id: id }, // passing the values
            success: function(res) {
                
                $("#book-pane").load(" #book-pane > *");
                
                console.log(res);
        
            },

            error: function(error_get_last) {
                console.log(error_get_last);
            }

        });


        console.log(id + " " + newID);
    }

    function getCateg(categ) {
        
        newID = categ;
    }

    function bookOverview(id) {

        window.location.href = "book_overview.php?title=" + id;

    }

</script>