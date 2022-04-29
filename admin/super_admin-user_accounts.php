<?php

    include 'php/user_db.php';

    $result = mysqli_query($conn,"SELECT * FROM users");
    $GLOBALS['check_table'] = mysqli_num_rows($result);
    $GLOBALS['id'] = 1;


?>


<head>
    <link rel="stylesheet" href="assets/css/user_account2.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header class="title">
        <div class="container">
            <a href="/Valture/AdminLogin/AdminsPanel/superadmincells.html"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">user accounts</h1>
        </div>
    </header>
    <section class="user2-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="view_user2" onclick="displayUserData();">view user</button>
                <button type="button" id="remove_user2" onclick="removeSelectedRow();">remove user</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody id="table">
                
                <?php

                    if ($GLOBALS['check_table'] == 0) {

                    // echo "<script>console.log(".$result.") </script>";

                        echo "<tr>";
                        echo "<td colspan = '4'> No Data Found! </td>";
                        echo "</tr>";

                    } else {

                        while($row = mysqli_fetch_array($result)) {
                        
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['f_name'] . "</td>";
                            echo "<td>" . $row['l_name'] . "</td>";
                            echo "<td>" . $row['email_verified_at'] . "</td>";
                            echo "</tr>";
                            
                            $GLOBALS['id']++;
                        }
                    }
                    mysqli_close($conn);

                ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="edit-user" id="user_container">
        <div class="wrapper">
            <button id="close_user2">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="image-editor">
                    <div class="image-container">
                        <img src="assets/images/3.jpg" alt="">
                    </div>
                </div>
                <div class="details-editor">
                    <form action="#">
                        <label for="fn">First Name</label>
                        <input type="text" id="fn" placeholder="First Name Here..." disabled="disabled">
                        <label for="ln">Last Name</label>
                        <input type="text" id="ln" placeholder="Last Name Here..." disabled="disabled">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" placeholder="Email Here..." disabled="disabled">
                        <label for="contact">Contact No.</label>
                        <input type="text" id="contact" placeholder="Contact Here..." disabled="disabled">
                        
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>
<script>
    var rIndex = -1;
    var id = "";
    var table = document.getElementById("table");
    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var email = document.getElementById("email");
    var contact = document.getElementById("contact");
    
    var user2Container = document.getElementById("user_container");
    var viewUser2 = document.getElementById("view_user2");
    var removeUser2 = document.getElementById("remove_user2");
    var closeUser2 = document.getElementById("close_user2");

    var clicked = false;
    viewUser2.disabled = true;
    removeUser2.disabled = true;

    //Showing the view modal for updating/viewing data of selected row
    viewUser2.addEventListener('click', () => {
        user2Container.classList.add('show');
    })
    //Closing the view modal
    closeUser2.addEventListener('click', () => {
        user2Container.classList.remove('show');
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {     
        for(var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked; 
                removeUser2.disabled = !removeUser2.disabled;
                viewUser2.disabled = !viewUser2.disabled;

                if(clicked) {
                    /*CSS related functions, on click disable 
                    * or show buttons and highlight row
                    */
                    removeUser2.classList.add('show');
                    viewUser2.classList.add('show');
                    this.classList.add('highlight');

                    /*If user clicked on table row and clicked view, 
                    * changes the value of form inputs on view 
                    */
                    id = this.cells[0].innerHTML;
                    fn.value = this.cells[1].innerHTML;
                    ln.value = this.cells[2].innerHTML;

                }
                if(!clicked) {
                    /*CSS related functions
                    * Turns back all css to default on unclick
                    */
                    removeUser2.classList.remove('show');
                    viewUser2.classList.remove('show');
                    fn.value = null;
                    ln.value = null;
                    /* If user removes unclicked, removes highlight
                    */
                    for(var j = 0; j < table.rows.length; j++){
                        table.rows[j].classList.remove('highlight');
                    }
                    //Sets rowIndex to -1 if no table row is clicked
                    rIndex = -1;
                }

            };
        }
    }

    //runs the function to find clicked rows and returns rIndex
    selectedRowToInput(); 
    
    //Removes the selected row
    function removeSelectedRow() {

        var newID = parseInt(id);

        if(rIndex == -1) {
            return;
        }

        $.ajax({
            type: "POST", //type of method
            url: "php/delete_user.php", //your page
            data: { id_no: newID}, // passing the values
            success: function(res) {

                if (res == "200") {

                    window.location.reload(1);

                } else {
                    console.log(res);
                }
            }
        });

        //deletes the selected row
        //table.deleteRow(rIndex-1);

        //CSS related functions
        removeUser2.classList.remove('show');
        viewUser2.classList.remove('show');

        //After removing a row
        removeUser2.disabled = !removeUser2.disabled;
        viewUser2.disabled = !viewUser2.disabled;
        clicked = !clicked;
        fn.value = null;
        ln.value = null;
        rIndex = -1;
    }

    function displayUserData() {

        var newID = parseInt(id);
        console.log(newID);
        
        $.ajax({
            type: "POST", //type of method
            url: "php/display_user.php", //your page
            data: { id_no: newID}, // passing the values
            dataType: 'json', //expected return format
            success: function(result) {
                
                document.getElementById("email").value = result.email;
                document.getElementById("contact").value = result.contactNo;
            }
        });
    }

</script>