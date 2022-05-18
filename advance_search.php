<?php

    include 'includes/registered-nav.php';

?>
<head>
    <link rel="stylesheet" href="assets/css/advance_search.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
</head>

<section class="advance_search">
    <div class="section-wrapper">
        <div class="section-title">
            <h2>advance search</h2>
        </div>
    </div>
    
    <form action="#" class="input-wrapper">
        <div>
            <label for="">Find documents with:</label>
        </div>
        <div>
            <label for="all_words">Category:</label>
            <input type="text" id="all_words" placeholder="Search here...">
        </div>
        <div>
            <label for="exact_words">Date Released:</label>
            <input type="text" id="exact_words" placeholder="Search here...">
        </div>
        <div>
            <label for="any_words">ISBN:</label>
            <input type="text" id="any_words" placeholder="Search here...">
        </div>
        <div>
            <label for="none_words">Keywords:</label>
            <input type="text" id="none_words" placeholder="Search here...">
        </div>
        <div>
            <input type="submit" value="Search">
        </div>
    </form>
    
</section>
