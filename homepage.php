<?php
    
    $user = $_SESSION['user_email'];

    require '/xampp/htdocs/Valture/admin/php/book_db.php';

    if ($user == "") {

        header('Location: /Valture/LogSign/log_sign.html');

    } else {
        
    }

?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Valture - Homepage</title>
</head>
<style>
    nav.main-nav {
        position: absolute;
        background: transparent;
    }
    nav.main-nav .logo {
        color: var(--link-lightcolor);
    }
    nav.main-nav ul li a {
        color: var(--link-lightcolor);
    }
    nav.main-nav ul li:hover > ul {
        background: var(--transparentnav-darkcolor);
    }

    @media screen and (max-width: 885px) {
        nav.main-nav {
            position: relative;
            background: var(--transparentnav-lightcolor);
        }
        nav.main-nav .icon {
            color: var(--link-color);
        }
        nav.main-nav .logo {
            color: var(--link-color);
        }
        nav.main-nav ul li a {
            color: var(--link-color);
        }
        nav.main-nav ul li:hover > ul {
            background: var(--transparentnav-lightcolor);
        }
        nav.main-nav ul li i {
            font-size: 20px;
            padding: 0 3px;
        }
    }
</style>
<!--Start of Header-->
<header class="homepage_header">
    <div class="carousel">
        <div class="carousel__item carousel__item--visible">
            <img src="assets/images/2.jpg"/>
            <div>
                <span>SEARCH FOR THE BOOK</span>
                <p>Super idol de xiào róng
                    Dōu méi nǐ de tián
                    Bā yuè zhèng wǔ de yáng guāng
                    Dōu méi nǐ yào yǎn
                    Rè ài yì bǎi líng wǔ dù de nǐ
                    Dī dī qīng chún de zhēng liú shuǐ,
                </p>
                <a href="#">
                    View Collections
                </a>
            </div>
        </div>
    </div>
</header>
<!--End of Header-->

<!--Start of Upcoming Events-->
<section class="upcoming_events">
    <div class="section-wrapper">
        <div class="section-title">
            <h2>upcoming events</h2>
        </div>
        <div class="article-list">
            <div class="carousel-upcoming_events">
                <div class="carousel__upcoming_events carousel__upcoming_events--visible">

                <?php
                    
                    $sql = "SELECT event_title, date_of_event FROM events ORDER BY date_of_event ASC LIMIT 4";
                    $id_no = 0;
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) { 
                       
                        echo "<button type='button' id = '{$id_no}' onclick = 'eventBtn(this.id)'> ";
                        echo "<span id = 'eventsPaneTitle{$id_no}'>" .  date("d F Y", strtotime($row['date_of_event'])) . "<br></span> ";
                        echo "<span id = 'eventsPanelDesc{$id_no}'>" .  $row['event_title'] . "</span>";           
                        echo "</button>";

                        $id_no++;
                    }
                    
                    
                ?>


                   <!-- <button type="button">
                        <span>January 21, 2022<br>READING ICON</span>
                    </button>
                    <button type="button">
                        <span>January 21, 2022<br>READING ICON</span>
                    </button>
                    <button type="button">
                        <span>January 21, 2022<br>READING ICON</span>
                    </button> -->
                </div>
                <div class="carousel__upcoming_events">

                   <!-- <button type="button">
                        <span>January 22, 2022<br>READING ICON</span>
                    </button>
                    <button type="button">
                        <span>January 22, 2022<br>READING ICON</span>
                    </button>
                    <button type="button">
                        <span>January 21, 2022<br>READING ICON</span>
                    </button> -->
                </div>
            </div>
        </div>
        <div class="article-shortview">
            <div class="container img-container">
                <img src="assets/images/1.jpg" alt="eventimage"  id = "event-image">
            </div>
            <div class="container intro-container">


                <?php
                    
                    $sql = "SELECT * FROM events ORDER BY date_of_event ASC LIMIT 1";
                   
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) { 
                       
                        echo "<span id = 'event-date'>";
                        echo "<i class='fa-solid fa-calendar-days'></i>";
                        echo date("F d, Y l", strtotime($row['date_of_event'])) . " - " . $row['start_time'] . "am-". $row['end_time']. "pm" ; 
                        echo "</span>";
                        echo "<h3 id = 'event-title'>".$row['event_title']."</h3>";
                        echo "<p id = 'event-description'>".$row['event_description']."</p>"; 
                        echo "<script> document.getElementById('event-image').src = 'admin/php/" . $row['event_image'] . "'; </script>";
                        
                    }
                    
                ?>
                    
                <!--<span id = "event-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    January 2021, 2022 - Friday 9:00am-2:00pm 
                </span>
                <h3 id = "event-title">READING ICON</h3>
                <p id = "event-description">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Hic, incidunt quo consectetur
                    saepe minus eum quidem. Explicabo, dolorum iure
                    voluptate quo repellendus quam quia incidunt
                    natus similique, qui reprehenderit at!
                </p> -->
                <a href="#">View More</a>
            </div>
        </div>
    </div>
</section>
<!--End of Upcoming Events-->


<!--Start of Featured Works-->
<section class="featured_works">
    <div class="section-wrapper">
        <div class="section-title">
            <h2>featured works</h2>
        </div>
    </div>
    <div class="featured_works-list">
        <div class="carousel-featured_works">
            <div class="carousel__featured_works carousel__featured_works--visible">


                 <?php
                    
                    $book = "SELECT * FROM `book_record` WHERE featured = 'yes' LIMIT 4";
                   // $id_no = 0;
                    $result = mysqli_query($conn, $book);

                    while($row = mysqli_fetch_assoc($result)) { 
                       
                        echo "<div>";
                        echo " <img src='admin/php/". $row['book_image'] . "' alt=''>";
                        echo "<a href= '#' onclick = 'bookOverview(this.id)' id = '{$row['book_title']}'>{$row['book_title']}<br>{$row['book_author']}</a>";           
                        echo "</div>";

                      //  $id_no++;
                    }
                    
                ?> 

                <!--<div>
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
            <div class="carousel__featured_works">
              <!--  <div>
                    <img src="assets/images/1.jpg" alt="">
                    <a href="#">Book Title<br>Author Name</a>
                </div> -->
            </div> 

            <div class="featured_works__actions">
                <button id="featured_works__button--prev" aria-label="Previous slide"><</button>
                <button id="featured_works__button--next" aria-label="Next slide">></button>
            </div>
        </div>
    </div>
</section>
<!--End of Featured Works-->


<!--Start of Categories-->
<section class="categories">
    <div class="section-wrapper">
        <div class="section-title">
            <h2>categories</h2>
        </div>
    </div>
    <div class="categories-list">
        <div class="carousel-categories">
            <div class="carousel__categories carousel__categories--visible">

            <?php
                    
                    $category = "SELECT * FROM `book_category`";
                   // $id_no = 0;
                    $result = mysqli_query($conn, $category);

                    while($row = mysqli_fetch_assoc($result)) { 
                       
                        echo "<div>";
                        echo "<a href='#'>";
                        echo "<img src='assets/images/1.jpg' alt=''>";
                        echo "<span>".$row['categ']."</span>";
                        echo "</a>";
                        echo "</div>";

                      //  $id_no++;
                    }
                    
                    mysqli_close($conn); 
                ?> 


                    
             <!--   <div>
                    <a href="#">
                        <img src="assets/images/1.jpg" alt="">
                        <span>books</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="assets/images/1.jpg" alt="">
                        <span>newspaper clippings</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="assets/images/1.jpg" alt="">
                        <span>magazines</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="assets/images/1.jpg" alt="">
                        <span>souvenir programs</span>
                    </a>
                </div> 
                <div>
                   <a href="#">
                        <img src="assets/images/1.jpg" alt="">
                        <span>souvenir programs</span>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="link">
            <a href="#">View More</a>
        </div>
    </div>
</section>
<!--End of Categories-->

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
    //start of carousel-featured-works
    let slidePosition2 = 0;
    const slides2 = document.getElementsByClassName('carousel__featured_works');
    const totalSlides2 = slides2.length;

    
    document.
        getElementById('featured_works__button--next')
        .addEventListener("click", function() {
            moveToNextSlide2();
    });
    document.
        getElementById('featured_works__button--prev')
        .addEventListener("click", function() {
            moveToPrevSlide2();
    });

    function updateSlidePosition2() {
        for (let slide of slides2) {
            slide.classList.remove('carousel__featured_works--visible');
            slide.classList.add('carousel__featured_works--hidden');
        }

            slides2[slidePosition2].classList.add('carousel__featured_works--visible');
    }

    function moveToNextSlide2() {
        if (slidePosition2 === totalSlides2 - 1) {
            slidePosition2 = 0;
        } else {
            slidePosition2++;
        }

            updateSlidePosition2();
    }

    function moveToPrevSlide2() {
        if (slidePosition2 === 0) {
            slidePosition2 = totalSlides2 - 1;
        } else {
            slidePosition2--;
        }

            updateSlidePosition2();
    }

    function eventBtn(id) {

        var event = document.getElementById("eventsPanelDesc" + id).textContent;
        console.log(id);

        $.ajax({
            type: "POST", //type of method
            dataType: 'JSON',
            url: "php-homepage/display_events.php", //your page
            data: { eventName: event }, // passing the values
            success: function(res) {
                
              document.getElementById('event-date').innerHTML = " <i class='fa-solid fa-calendar-days'></i>" + res.date + " - " + res.start + "am-" + res.end + "pm";
              document.getElementById('event-title').innerHTML = res.title;
              document.getElementById('event-description').innerHTML = res.desc;
              document.getElementById('event-image').src = "admin/php/" + res.imageSrc;
              console.log(res.imageSrc);
        
            },

            error: function(error_get_last) {
                console.log(error_get_last);
            }
        });
        
    }

    function bookOverview(id) {

        window.location.href = "book_overview.php?title=" + id;
        
    }
    
</script>