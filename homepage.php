<?php
    
    $user = $_SESSION['user_email'];
    $slot = 0;
    require '/xampp/htdocs/Valture/admin/php/book_db.php';
    require 'php-homepage/user_db.php';

    if ($user == "") {

        header('Location: /Valture/LogSign/log_sign.html');

    } else {
        
    }

    //check if the borrowed books are greater than the current time, means not expired yet
    $borrow_query = mysqli_query($conn_users, "SELECT * FROM users_borrow WHERE renter = '" . $user . "' AND returned_date >= CURRENT_TIMESTAMP");

    $row = mysqli_num_rows($borrow_query); 

    if ($row == 0) {

        $book = mysqli_query($conn_users, "SELECT `rented_book` FROM users_borrow WHERE renter = '" . $user . "' AND returned_date <= CURRENT_TIMESTAMP");
    
        while ($row = mysqli_fetch_assoc($book)) {
            mysqli_query($conn, "UPDATE `book_record` SET book_slot = book_slot + 1 WHERE book_title = '" . $row['rented_book'] . "'");
        }
        
        mysqli_query($conn_users, "DELETE FROM users_borrow WHERE renter = '" . $user . "' AND returned_date <= CURRENT_TIMESTAMP");
        mysqli_query($conn_users, "ALTER TABLE `users_borrow` DROP COLUMN id");
        mysqli_query($conn_users, "ALTER TABLE `users_borrow` ADD COLUMN `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");   


    } else {
        
        //do nothing
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
    
    nav.main-nav ul li:hover>ul {
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
        nav.main-nav ul li:hover>ul {
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
                <p>
                    Not Sure What to Read Next? Explore Our Collection to Discover the Perfect Chapter for You!
                </p>
                <a href="document_categories.php">
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
        <div class="carousel-slider">
                <div class="container">
                    <button class="handle left-handle">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    
                    <div class="slider">

                        <?php
                            
                            $sql = "SELECT event_title, date_of_event, id FROM events ORDER BY date_of_event ASC";
                            $id_no = 0;
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)) { 
                            
                                echo "<button type='button' id = '{$id_no}' onclick = 'eventBtn(this.id, {$row['id']})'> ";
                                echo "<span id = 'eventsPaneTitle{$id_no}'>" .  date("d F Y", strtotime($row['date_of_event'])) . "<br></span> ";
                                echo "<span id = 'eventsPanelDesc{$id_no}'>" .  $row['event_title'] . "</span>";           
                                echo "</button>";

                                $id_no++;
                            }
                            
                            
                        ?>

                    </div>
                        <button class="handle right-handle">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                </div>
            <div class="header">
                <div class="progress-bar"></div>
            </div>
        </div>

        <div class="article-shortview">
            <div class="container img-container">
                <img src="assets/images/1.jpg" alt="eventimage"  id = "event-image" style = "object-fit: fill;">
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
                        echo "<a href='#' onclick = 'redirectEventsPage()'>View More</a>";
                       
                    }
                    
                   
                ?>
                    
                
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
    <div class="carousel-slider">
            <div class="container">
                <button class="handle left-handle">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                
            <div class="slider">

                 <?php
                    
                    $book = "SELECT * FROM `book_record` WHERE featured = 'yes'";
                   // $id_no = 0;
                   // $id = 0;
                    $result = mysqli_query($conn, $book);

                    while($row = mysqli_fetch_assoc($result)) { 

                        echo "<div>";
                        echo " <img src='admin/php/". $row['book_image'] . "' alt=''>";
                        echo "<a href= '#' onclick = 'bookOverview(this.id)' id = '{$row['book_title']}'>{$row['book_title']}<br>{$row['book_author']}</a>";           
                        echo "</div>";

                      //$id_no++;
                      //$id = $row['id'];
                    }
                    
                ?> 

                
            </div>
                <button class="handle right-handle">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        <div class="header">
            <div class="progress-bar"></div>
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
    <div class="carousel-slider">
        <div class="container">
                <button class="handle left-handle">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <div class="slider">

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
                
                </div>
                <button class="handle right-handle">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        <div class="header">
            <div class="progress-bar"></div>
        </div>
    </div>
</section>
<!--End of Categories-->


<script>

    var eventID = 0;
    
    document.addEventListener("click", e => {
        let handle
        if (e.target.matches(".handle")) {
            handle = e.target
        } else {
            handle = e.target.closest(".handle")
        }
        if (handle != null) onHandleClick(handle)
    })

    const throttleProgressBar = throttle(() => {
        document.querySelectorAll(".progress-bar").forEach(calculateProgressBar)
    }, 250)
    window.addEventListener("resize", throttleProgressBar)

    document.querySelectorAll(".progress-bar").forEach(calculateProgressBar)

    function calculateProgressBar(progressBar) {
        progressBar.innerHTML = ""
        const slider = progressBar.closest(".carousel-slider").querySelector(".slider")
        const itemCount = slider.children.length
        const itemsPerScreen = parseInt(
            getComputedStyle(slider).getPropertyValue("--items-per-screen")
        )
        let sliderIndex = parseInt(
            getComputedStyle(slider).getPropertyValue("--slider-index")
        )
        const progressBarItemCount = Math.ceil(itemCount / itemsPerScreen)

        if (sliderIndex >= progressBarItemCount) {
            slider.style.setProperty("--slider-index", progressBarItemCount - 1)
            sliderIndex = progressBarItemCount - 1
        }

        for (let i = 0; i < progressBarItemCount; i++) {
            const barItem = document.createElement("div")
            barItem.classList.add("progress-item")
            if (i === sliderIndex) {
                barItem.classList.add("active")
            }
            progressBar.append(barItem)
        }
    }

    function onHandleClick(handle) {
        const progressBar = handle.closest(".carousel-slider").querySelector(".progress-bar")
        const slider = handle.closest(".container").querySelector(".slider")
        const sliderIndex = parseInt(
            getComputedStyle(slider).getPropertyValue("--slider-index")
        )
        const progressBarItemCount = progressBar.children.length
        if (handle.classList.contains("left-handle")) {
            if (sliderIndex - 1 < 0) {
                slider.style.setProperty("--slider-index", progressBarItemCount - 1)
                progressBar.children[sliderIndex].classList.remove("active")
                progressBar.children[progressBarItemCount - 1].classList.add("active")
            } else {
                slider.style.setProperty("--slider-index", sliderIndex - 1)
                progressBar.children[sliderIndex].classList.remove("active")
                progressBar.children[sliderIndex - 1].classList.add("active")
            }
        }

        if (handle.classList.contains("right-handle")) {
            if (sliderIndex + 1 >= progressBarItemCount) {
                slider.style.setProperty("--slider-index", 0)
                progressBar.children[sliderIndex].classList.remove("active")
                progressBar.children[0].classList.add("active")
            } else {
                slider.style.setProperty("--slider-index", sliderIndex + 1)
                progressBar.children[sliderIndex].classList.remove("active")
                progressBar.children[sliderIndex + 1].classList.add("active")
            }
        }
    }

    function throttle(cb, delay = 1000) {
        let shouldWait = false
        let waitingArgs
        const timeoutFunc = () => {
            if (waitingArgs == null) {
                shouldWait = false
            } else {
                cb(...waitingArgs)
                waitingArgs = null
                setTimeout(timeoutFunc, delay)
            }
        }

        return (...args) => {
            if (shouldWait) {
                waitingArgs = args
                return
            }

            cb(...args)
            shouldWait = true
            setTimeout(timeoutFunc, delay)
        }
    }

    function eventBtn(id, bookID) {
        eventID = bookID;
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


    function redirectEventsPage() {

        var id = parseInt(eventID);

        window.location.href = "solo_events.php?name=" + id;
        console.log(id);
    }


    
</script>