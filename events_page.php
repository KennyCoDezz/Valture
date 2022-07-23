<?php

    include 'includes/registered-nav.php';
    include 'php-homepage/book_db.php';

    $sql = "SELECT * FROM `events`";

    

?>

<html>

<head>
    <title>Events</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
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
    
    @media screen and (max-width: 850px) {
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

<!-- IMAGE HEADER -->

<header class="homepage_header">
    <div class="carousel">
        <div class="carousel__item carousel__item--visible">
            <img src="assets/images/3.jpg">
            <div class="aboutus_header">
                <h2> UPCOMING EVENTS </h2>
            </div>
        </div>
    </div>
</header>


<!-- CONTENT-->

    <?php

        $result = $conn -> query($sql);

        while($row = mysqli_fetch_assoc($result)) {

            echo "<div class='event'>";
            echo "<div class='side-box1'></div>";
            echo "<div class='event-info'>";
            echo "<div class='event-date'>";
            echo "<span> <i class='fa-solid fa-calendar-days'></i>" ;
            echo " " . date("F d, Y l", strtotime($row['date_of_event'])) . " - " . $row['start_time'] . "am-". $row['end_time']. "pm"; 
            echo "</span>";
            echo "</div>";
            echo "<a href='#' class='event-title' id = {$row['id']} onclick = 'redirectEventsPage(this.id)'>" . $row['event_title'] . "</a>";
            echo "<p class='event-desc'>" . $row['event_description'] . "</p> ";
            echo "</div>";
            echo "</div>";
            
        }

    ?>


<script>

    function redirectEventsPage(id) {

        window.location.href = "solo_events.php?name=" + id;
    }


</script>






<?php

    include 'includes/footer.html';

?>

</html>