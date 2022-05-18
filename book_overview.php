<?php

    include 'includes/registered-nav.php';
    include "php-homepage/book_db.php";
    include 'php-homepage/user_db.php';

    $_SESSION['title'] = "";
    $email = $_SESSION['user_email'];
    $sentinel_value = 0;
    $title = $_GET['title'];
    $myArray = array();
    $keywords = "";
    $newTime = 0;
    $getDateTime = "";
    $date_of_return = "";

    /////////////////////////////////////////////////////////////////////////////////////////////////

    //check if the book has been bookmark already
    $bookmark_value = 0;
    $bookmark_query = $conn_users -> query("SELECT * FROM user_bookmark WHERE book_title = '". $title . "' AND email = '" . $email . "';");

    $row = mysqli_num_rows($bookmark_query);

    if ($row == 0) {
       
        $bookmark_value = 0;
    } else {
        $bookmark_value = 1;
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $result = mysqli_query($conn,"SELECT * FROM `book_record` WHERE book_title = '". $_GET['title'] . "'");
    /////////////////////////////////////////////////////////////////////////
    while ($row = mysqli_fetch_array($result)) {

        $isbn = $row['book_isbn'];
        $author = $row['book_author'];
        $pages = $row['page_no'];
        $year = $row['date_added'];
        $return = $row['time_limit'];
        $book_title = $row['book_title'];
        $desc = $row['book_desc'];
        $keywords = $row['keywords'];
        $image = $row['book_image'];
       
    }
    //////////////////////////////////////////////////////////////////////////
    $check_book = mysqli_query($conn_users, "SELECT * FROM `users_borrow` WHERE renter = '" . $email . "' AND rented_book = '" . $title . "'");

    $rows = mysqli_num_rows($check_book);

    if ($rows == 0) {

        $sentinel_value = 0;

    } else {

        $sentinel_value = 1;

    }
    //////////////////////////////////////////////////////////////////////////

    mysqli_close($conn);

    //////////////////////////////////////////////////////////////////////////
    $myArray = explode(',', $keywords);
    $days = 24;
    $_SESSION['title'] = $book_title;
    ///////////////////////////////////////////////////////////////////////

    $borrow_query = mysqli_query($conn_users, "SELECT * FROM users_borrow WHERE renter = '" . $email . "'");

    $row = mysqli_num_rows($borrow_query); 

    if ($row == 0) {
        
        

    } else {
        
        $details = mysqli_query($conn_users, "SELECT `returned_date` FROM `users_borrow` WHERE renter = '" . $email . "' AND rented_book = '" . $book_title. "'");

        while ($row = mysqli_fetch_assoc($details)) {
            $date_of_return = $row['returned_date'];
        }

        // $dateTime = strtotime('May 05, 2022 21:00:00');
        $getDateTime = $date_of_return;
        //date("F d, Y H:i:s", $dateTime); 
         mysqli_close($conn_users);

    }
   

?>


<head>
    <link rel="stylesheet" href="assets/css/book_overview.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="modal-container" id="modal_container">
        <div class="modal">
            <button id="close_modal" onclick = "closeBtn()"><i class="fa-solid fa-xmark"></i></button>
            <i class="fa-solid fa-check"></i>
            <h3>Successfully added to the library</h3>
        </div>
    </div>
    <section class="book_overview">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>book overview</h2>
            </div>
        </div>
        <div class="document-container">
            <div class="document-info">
                <div class="document_image_title">
                    <div class="image-container">
                        <img src=
                        
                        <?php
                            echo "'admin/php/" . $image . "'";
                        ?>
                        
                        alt = "Image Cover">
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
                    <div class="document-title">
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
                                echo $desc;
                            ?>
                        </p>
                        <div class="return_time">
                            <span id = "return-time">To be returned in: 
                                <?php

                                    if ($return < 24) {
                                        echo $return . " hour(s)";
                                    } else {
                                        $newTime = $return/$days;
                                        echo $newTime . " days";
                                    } 
                                ?>
                            </span>
                        </div>
                        <div class="buttons">
                            <button id="borrow" class="borrow">Borrow Now</button>
                            <button id="read" class="read" onclick = "readBtn()">Read Now</button>
                            <button id="return" class="return" onclick="returnBtn()">Return</button>
                            <button id="open_modal" onclick = "addBookmark()">Add To
                                <i class="fa-solid fa-bookmark"></i>
                            </button>
                        </div>
                        <div class="document-keywords">
                            <h3>keywords</h3>
                            <div class="keywords-wrapper">

                                <?php

                                    foreach ($myArray as $value){
                                        echo "<span>#". $value . "</span>";
                                    }
                                ?>

                                <!--<span>#Lorem</span>
                                <span>#Lorem</span>
                                <span>#Lorem</span>
                                <span>#Lorem</span> -->
                            </div>
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
                                    <img isrc="assets/images/1.jpg" alt="">
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolores eaque ullam nulla vero vitae, fugiat, accusantium sit id tempore sunt sed corrupti impedit maiores. Rem nesciunt quidem doloremque omnis!
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolores eaque ullam nulla vero vitae, fugiat, accusantium sit id tempore sunt sed corrupti impedit maiores. Rem nesciunt quidem doloremque omnis!
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
               
            </div>
        </div>
    </section>
</body>
<script>


    $(function() {
        
        var val = <?php echo "" .@$sentinel_value . ""?>;
        var bookmarkVal = <?php echo "" .@$bookmark_value . ""?>;

        if (val == 1) {
            

            var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                var now = new Date().getTime();
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="counter"11

                if (days == 0) {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + hours + "H";
                } else {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + days + " D" + hours + "H";
                }

                if (hours == 0) {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + minutes + " Minutes";
                } else {
                    document.getElementById("return-time").innerHTML = "To be returned in: " + hours + "H" + minutes + " Minutes";
                }
                
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    
                }
            }, 1000);

            var read = document.getElementById('read');
            var ret = document.getElementById('return');
            var borrow = document.getElementById('borrow');

            read.classList.add('show');
            ret.classList.add('show');
            borrow.classList.add('hide');

        } else {
            
            
        }

        if (bookmarkVal == 0) {

            var open_modal = document.getElementById('open_modal');

            open_modal.style.display = "block";

        } else {
            var open_modal = document.getElementById('open_modal');

            open_modal.style.display = "none";
        }


    });

    /** For Add to Bookmark**/
    var open_modal = document.getElementById('open_modal');
    var modal_container = document.getElementById('modal_container');
    var close_modal = document.getElementById('close_modal');

    open_modal.addEventListener('click', () => {
        modal_container.classList.add('show');
    })
    close_modal.addEventListener('click', () => {
        modal_container.classList.remove('show');
    }) 

    /** For Borrow & Return **/
    var borrow = document.getElementById('borrow');
    var read = document.getElementById('read');
    var ret = document.getElementById('return');

    borrow.addEventListener('click', () => {
        borrow.classList.add('hide');
        read.classList.add('show');
        ret.classList.add('show');
        open_modal.classList.add('hide');
    }) 


    ret.addEventListener('click', () => {
        borrow.classList.remove('hide');
        read.classList.remove('show');
        ret.classList.remove('show');
        open_modal.classList.remove('hide');
    })

    function readBtn() {

        var addDate = <?php echo "" .@$return . ""?>;
        var isbn = <?php echo "'" .@$isbn . "'"?>;
        var title = <?php echo "'" .@$book_title . "'"?>;
        var email = <?php echo "'" .@$_SESSION['user_email'] . "'"?>;
        var author = <?php echo "'" .@$author . "'"?>;
        var image = <?php echo "'" .@$image . "'"?>;
        var val = <?php echo "" .@$sentinel_value . ""?>;

        $.ajax({
            type: "POST", //type of method
            url: "php-homepage/borrow_details.php", //your page
            data: { 
                book: title,
                isbn_no: isbn, 
                numberAdded: addDate,
                user: email,
                author: author,
                image: image,
                controlValue: val
            }, // passing the values
            success: function(res) {
                
                if (res == "200") {
                    window.location.href = "reading_mode.php";
                } else {
                    alert("There is no slot available");
                }
              
        
            },

            error: function(error_get_last) {
                console.log(error_get_last);
            }
        });
        
    }

    function addBookmark() {
        var title = <?php echo "'" .@$book_title . "'"?>;
        var author = <?php echo "'" .@$author . "'"?>;
        var image = <?php echo "'" .@$image . "'"?>;
        var email = <?php echo "'" .@$_SESSION['user_email'] . "'"?>;

        $.ajax({
            type: "POST", //type of method
            url: "php-homepage/add_bookmark.php", //your page
            data: { 
                book: title,
                user: email,
                author: author,
                image: image
            }, // passing the values
            success: function(res) {
                
                if (res == "200") {
                    console.log("success");
                   
                    
                } else {
                    console.log(res);
                }
              
        
            },

            error: function(error_get_last) {
                console.log(error_get_last);
            }
        });
    }

    function closeBtn() {

        console.log("clicked");

        var open_modal = document.getElementById('open_modal');

            open_modal.style.display = "none";
    }


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
                    window.location.reload();
                    
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