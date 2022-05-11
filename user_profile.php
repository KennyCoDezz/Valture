<?php

    include 'includes/registered-nav.php';
    include 'php-homepage/user_db.php';
    include 'php-homepage/book_db.php';

    $user_name = $_SESSION['user_email'];

    $book_author ="";

    $user_query = mysqli_query($conn_users,"SELECT `f_name`, `l_name` FROM `users` WHERE email = '" . $user_name . "'");

    while($row = mysqli_fetch_assoc($user_query)) {
        $f_name = $row['f_name'];
        $l_name = $row['l_name'];
    }



?>

<head>
    <link rel="stylesheet" href="assets/css/user_profile.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <section class="user_profile">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>hello there, 
                    <?php
                        echo $f_name;
                    ?>
                </h2>
            </div>
        </div>
        <div class="profile-container">
            <div class="image-container">
                <img src="assets/images/1.jpg" alt="">
            </div>
            <div class="name">
                <div class="wrapper">
                    <img src="assets/images/2.jpg" alt="">
                    <h3>
                        <?php
                            echo "" . $f_name . "" . " " . $l_name . "";
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <section class="borrowed_documents">
        <div class="section-wrapper">
            <div class="section-title">
                <h2 style="font-size: 20px;">borrowed books</h2>
            </div>
        </div>
        <div class="borrowed_docs-list">
            <div class="carousel-borrowed_docs">
                <div class="carousel__borrowed_docs">

                    <?php
                        
                        $borrow_query = mysqli_query($conn_users, "SELECT * FROM users_borrow WHERE renter = '" . $user_name . "'");

                        while($row = mysqli_fetch_assoc($borrow_query)) {
                            $book_title = $row['rented_book'];
                            $book_image = $row['book_image'];
                            $book_author = $row['book_author'];

                            echo "<div>";
                            echo "<img src='admin/php/" . $book_image ."' alt='Book Cover'>";
                            echo "<a href='#' onclick = 'readMode(this.id)' id = '{$book_title}'> " . $book_title . "<br>" . $book_author ."</a>";
                            echo "</div>";
                            

                        }

                      

                    ?>
                
                <!--    <div>
                        <img src="assets/images/1.jpg" alt="">
                        <a href="#">Book Title<br>Author Name</a>
                    </div>
                    <div>
                        <img src="assets/images/1.jpg" alt="">
                        <a href="#">Book Title<br>Author Name</a>
                    </div>
                    <div>
                        <img src="assets/images/1.jpg" alt="">
                        <a href="#">Book Title<br>Author Name</a>
                    </div>
                    <div>
                        <img src="assets/images/1.jpg" alt="">
                        <a href="#">Book Title<br>Author Name</a>
                    </div> -->
                </div>
            </div>
        </div>   
    </section>
</body>

<script>

    function readMode(title) {
       var title = title;

       $.ajax({
            type: "POST", //type of method
            url: "php-homepage/store_book_title.php", //your page
            data: { book: title }, // passing the values
            success: function(res) {
                
              if (res == "200") {
                  window.location.href = "reading_mode.php";
              } else {
                  console.log(res);
              }
        
            },

            error: function(error_get_last) {
                console.log(error_get_last);
            }
        });


    }

</script>

<?php

    include 'includes/footer.html';

?>