<?php

    include 'includes/registered-nav.php';
    require 'php-homepage/user_db.php';


?>

<head>
    <link rel="stylesheet" href="assets/css/bookmark.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <section class="bookmarked_documents">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>my bookmarks</h2>
            </div>
        </div>
        <div class="bookmark">
            <div class="bookmark-container" id = "bookmark">
               
            <?php
                    
                $sql = "SELECT * FROM `user_bookmark`";
                $result = mysqli_query($conn_users, $sql);

                while($row = mysqli_fetch_assoc($result)) { 

                    $src = $row['book_image'];
                    
                    echo "<div>";
                    echo "<i id = {$row['id']} class='fa-solid fa-xmark' onclick = 'removeBookmark(this.id)'></i>";
                    echo "<img src= 'admin/php/{$src}'>";
                    echo "<a href='#'>" . $row['book_title'] . "<br>" . $row['book_author']. "</a>";
                    echo "</div>";

                }
                
                mysqli_close($conn_users);
                    
            ?>
               
            </div>
        </div>   
    </section>
</body>

<?php

    include 'includes/footer.html';

?>

<script>

    function removeBookmark(id) {

        $.ajax({
            type: "POST", //type of method
            url: "php-homepage/remove_bookmark.php", //your page
            data: { row_id: id }, // passing the values
            success: function(res) {
                
              if (res == "200") {
                $("#bookmark").load(" #bookmark > *");
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


