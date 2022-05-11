<?php

    require 'php/user_db.php';


?>



<head>
    <link rel="stylesheet" href="assets/css/logs.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
</head>
<body>
    <header class="title">
        <div class="container">
            <a href="/Valture/AdminLogin/AdminsPanel/transactioncells.php"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">Logs</h1>
        </div>
    </header>
    <section class="list-table">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Borrower</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                        $result = mysqli_query($conn, "SELECT * FROM `users_borrow`");

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>" .$row['book_isbn'] . "</td>";
                            echo "<td>" .$row['rented_book']. "</td>";
                            echo "<td>" .$row['book_author']. "</td>";
                            echo "<td>" .$row['date_of_borrowing']. "</td>";
                            echo "<td>" .$row['returned_date']. "</td>";
                            echo "</tr>";

                        }


                    ?>
                    
                    <!--<tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe1</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr>
                    <tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe2</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr>
                    <tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe3</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr>
                    <tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe4</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr>
                    <tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe5</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr>
                    <tr>
                        <td>978-3-16</td>
                        <td>Book Title</td>
                        <td>John Doe6</td>
                        <td>2021-12-11</td>
                        <td>2021-12-11</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </section>
</body>