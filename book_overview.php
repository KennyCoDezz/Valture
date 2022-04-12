<?php

    include "db.php";

    $result = mysqli_query($conn,"SELECT * FROM book_data WHERE book_name = 'SoloLeveling'");

    while ($row = mysqli_fetch_array($result)) {

        $book_name = $row{'book_name'};
        $isbn = $row{'isbn_number'};
        $author = $row{'author'};
        $pages = $row{'page_no'};
        $year = $row{'year_released'};
        $return = $row{'return_time'};
        $book_title = $row{'book_title_name'};
    }
    

?>


<head>
    <link rel="stylesheet" href="assets/css/book_overview.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
</head>

<body>
    <div class="modal-container" id="modal_container">
        <div class="modal">
            <button id="close_modal"><i class="fa-solid fa-xmark"></i></button>
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
                        <img src="assets/images/1.jpg" alt="">
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolorem, odit distinctio corrupti nulla blanditiis adipisci id possimus molestias hic quo, enim quasi eius ipsa quam exercitationem vitae inventore quaerat?
                        </p>
                        <div class="return_time">
                            <span>To be returned on: 
                                <?php
                                    echo $return;
                                ?>
                            </span>
                        </div>
                        <div class="buttons">
                            <button id="borrow" class="borrow">Borrow Now</button>
                            <button id="read" class="read"><a href= 'book_reading_mode.php?name=SoloLeveling'>Read Now</a></button>
                            <button id="return" class="return">Return</button>
                            <button id="open_modal">Add To
                                <i class="fa-solid fa-bookmark"></i>
                            </button>
                        </div>
                        <div class="document-keywords">
                            <h3>keywords</h3>
                            <div class="keywords-wrapper">
                                <span>#Lorem</span>
                                <span>#Lorem</span>
                                <span>#Lorem</span>
                                <span>#Lorem</span>
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
</body>
<script>
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
</script>