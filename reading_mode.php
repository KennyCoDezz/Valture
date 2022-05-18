<?php

    include 'includes/registered-nav.php';
    include "/xampp/htdocs/Valture/admin/php/book_db.php";
    include "php-homepage/user_db.php";

    $file_name = $_SESSION['title'];
    $user = $_SESSION['user_email'];
    $isbn = "";
    $author = "";
    $pages = "";
    $year = "";
    $return = "";
    $book_title = "";
    $image = "";
    $book_file = "";      
    $result = mysqli_query($conn,"SELECT * FROM book_record WHERE book_title = '$file_name'");

    while ($row = mysqli_fetch_array($result)) {

        $isbn = $row['book_isbn'];
        $author = $row['book_author'];
        $pages = $row['page_no'];
        $year = $row['date_added'];
        $return = $row['time_limit'];
        $book_title = $row['book_title'];
        $image = $row['book_image'];
        $book_file = $row['book_file'];
        $description = $row['book_desc'];
    }
    
    $days = 24;

    $details = mysqli_query($conn_users, "SELECT `returned_date` FROM `users_borrow` WHERE renter = '" . $user . "' AND rented_book = '" . $file_name . "'");
    
    while ($row = mysqli_fetch_assoc($details)) {
        $date_of_return = $row['returned_date'];
    }

   // $dateTime = strtotime('May 05, 2022 21:00:00');
    $getDateTime = date("F d, Y H:i:s", strtotime($date_of_return));
    //date("F d, Y H:i:s", $dateTime); 

   
?>


<head>
    <link rel="stylesheet" href="assets/css/book_reading_mode.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <section class="book_reading_mode">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>book reading mode</h2>
            </div>
        </div>
        <div class="document-container">
            <div class="document-info">
                <div class="document_image_title">
                    <div class="pdf_viewer">
                        <iframe src="admin/php/<?php echo $book_file;?>.#toolbar=0";></iframe>
                    </div>
                    <div class="document-title">
                        <div class="image-container">
                            <img src=

                            <?php
                                echo "'admin/php/" . $image . "'";
                            ?>
                            
                            alt="">
                        </div>
                        <div class="title-author">
                            <h2>
                                <?php
                                    echo $book_title;
                                ?>
                            </h2>
                            <span>
                                <?php
                                    echo $author;
                                ?>
                            </span>
                            <div class="stars">
                                <span>(20)</span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>          
                            </div>
                        </div>
                        <p>
                        
                            <?php

                                echo $description;

                            ?>
                        </p>
                        <div class="return_time">
                        <span id = "return-time" >To be returned in: <br>

                             <?php
                                /* if ($return < 24) {
                                     echo $newTime . " hours";
                                 } else {
                                     $newTime = $return/$days;
                        
                                     echo $newTime . " days";
                                 } */
                             ?>
                        </span>
                        </div>
                        <div class="buttons">
                            <button id = "returnButton" onclick = "returnBtn()">Return</button>
                        </div>
                        <div class="document-details">
                            <h3>book details</h3>
                            <span>year released: 
                                <?php
                                    echo $year;
                                ?>
                            </span>
                            <span>page no: 
                                <?php
                                    echo $pages;
                                ?>
                            </span>
                            <span>
                                isbn: 
                                <?php
                                    echo $isbn;
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="document-reviews">
                <div class="comments_reviews_wrapper">
                    <div class="reviews">
                        <h3>reviews</h3>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>   
                            <span>(4.0)</span>       
                        </div>
                        <div class="comments-wrapper">
                            <div class="user">
                                <div class="image">
                                    <img src="assets/images/1.jpg" alt="">
                                </div>
                                <div class="user-ratings-comments">
                                    <h4>username</h4>
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>   
                                    </div>
                                    <p>Lorem ipsum dolor sit amet 
                                        consectetur adipisicing elit. 
                                        Ipsum dolores eaque ullam 
                                        nulla vero vitae, fugiat, 
                                        accusantium sit id tempore 
                                        sunt sed corrupti impedit 
                                        maiores. Rem nesciunt quidem 
                                        doloremque omnis!
                                    </p>
                                </div>
                            </div>
                            <div class="user">
                                <div class="image">
                                    <img src="assets/images/1.jpg" alt="">
                                </div>
                                <div class="user-ratings-comments">
                                    <h4>username</h4>
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>   
                                    </div>
                                    <p>Lorem ipsum dolor sit amet 
                                        consectetur adipisicing elit. 
                                        Ipsum dolores eaque ullam 
                                        nulla vero vitae, fugiat, 
                                        accusantium sit id tempore 
                                        sunt sed corrupti impedit 
                                        maiores. Rem nesciunt quidem 
                                        doloremque omnis!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment">
                        <h3>leave a comment</h3>
                        <form action="#" class="comment-box">
                            <div class="profile-box">
                                <div class="image-container">
                                    <img src="assets/images/1.jpg" alt="">
                                </div>
                                <input type="text" placeholder="Comment here...">
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter">
        <div class="carousel_newsletter">
            <div class="carousel__item_newsletter">
                <img src="assets/images/2.jpg" />
                <div>
                    <h2>Stay in touch with us!</h2>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <form action="#" method="post">
                        <input type="text" id="fname" name="firstname" placeholder="Enter Email...">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function returnBtn() {

            var title = <?php echo "'" .@$book_title . "'"?>;
            var email = <?php echo "'" .@$_SESSION['user_email'] . "'"?>;

            $.ajax({
                        
                type: "POST", //type of method
                url: "php-homepage/return_book.php", //your page
                data: { 
                    book: title,
                    email: email
                }, // passing the values
                success: function(res) {
                    
                    if (res == "200") {
                        console.log("success");
                        window.location.href = "book_overview.php?title=" + title;
                        
                    } else {
                        console.log(res);
                    }
                
            
                },

                error: function(error_get_last) {
                    console.log(error_get_last);
                }
            });
        }

        $(function() {
            console.log( "ready!" );
        });

        $ (function() {

            var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
            
            // Update the count down every 1 second
            var x = setInterval(function() {
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="counter"11
                //document.getElementById("return-time").innerHTML = "To be returned in: <br>" + days + " Day(s) : " + hours + "h " +
                //minutes + "m " + seconds + "s ";
                if (days == 0) {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + hours + "H";
                } else {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + days + " D" + hours + "H";
                }

                if (hours == 0) {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + minutes + " Minutes " + seconds + "s";
                } else {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + hours + "H" + minutes + " Minutes";
                }
                // If the count down is over, write some text 
                if (distance < 0) {
                    var title = <?php echo "'" .@$file_name . "'"?>;
                    var user = <?php echo "'" .@$user . "'"?>;
                    clearInterval(x);

                    $.ajax({
                        
                        type: "POST", //type of method
                        url: "php-homepage/return_book.php", //your page
                        data: { 
                            book: title,
                            email: user
                        }, // passing the values
                        success: function(res) {
                            
                            if (res == "200") {
                                console.log("success");
                                window.location.href = "book_overview.php?title=" + title;
                                
                            } else {
                                console.log(res);
                            }
                        
                    
                        },

                        error: function(error_get_last) {
                            console.log(error_get_last);
                        }
                    });
                }
            }, 1000);

        });
       
    </script>
</body>