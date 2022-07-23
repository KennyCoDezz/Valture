<?php

    $event = $_GET['name'];

    include 'includes/registered-nav.php';
    include 'php-homepage/book_db.php';

    $sql = "SELECT * FROM `events` WHERE id = '" . $event . "'";

?>
<html> 

<head>
	<title>Reading Icon</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/root.css">
	<link rel="stylesheet" href="assets/css/footer.css">
	<link rel="stylesheet" href="assets/css/soloeventstyle.css">
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
    nav.main-nav ul li:hover > ul {
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
        nav.main-nav ul li:hover > ul {
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
			echo "<div class='side-box1'>";
			echo "<img src='/Valture/admin/php/{$row['event_image']}'>";
			echo "</div>";
            echo "<div class='event-info'>";
            echo "<div class='event-date'>";
            echo "<span> <i class='fa-solid fa-calendar-days'></i>" ;
            echo " " . date("F d, Y l", strtotime($row['date_of_event'])) . " - " . $row['start_time'] . "am-". $row['end_time']. "pm"; 
            echo "</span>";
            echo "</div>";
            echo "<h1 class='event-title' id = {$row['event_title']} onclick = 'redirectEventsPage(this.id)'>" . $row['event_title'] . "</h1>";
            echo "<p class='event-desc'>" . $row['event_description'] . "</p> ";
            echo "</div>";
            echo "</div>";

        
        }


    ?>
		
        <!--<div class="event">
			<div class="side-box1">
				<img src="assets/images/3.jpg">
			</div>
		
		
			<div class="event-info">
				<div class="event-date">
					<span> <i class="fa-solid fa-calendar-days"></i> January 2021, 2022 Friday 9:00am - 2:00pm </span>
				</div>
				<h1 class= "event-title"> READING ICON </h1>
				<p class="event-desc">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Hic, incidunt quo consectetur
                    saepe minus eum quidem. Explicabo, dolorum iure
                    voluptate quo repellendus quam quia incidunt
                    natus similique, qui reprehenderit at!Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. <br> <br> Hic, incidunt quo consectetur
                    saepe minus eum quidem. Explicabo, dolorum iure
                    voluptate quo repellendus quam quia incidunt
                    natus similique, qui reprehenderit at!  </p>
			
			</div>
		</div> -->
		
		
		
		
		
		
		
		
    <?php

        include 'includes/footer.html';

    ?>

</html>