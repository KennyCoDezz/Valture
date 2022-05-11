<?php

    include 'php/admin_db.php';

    $result = mysqli_query($conn,"SELECT * FROM regular_admin");
    $GLOBALS['check_table'] = mysqli_num_rows($result);
    $GLOBALS['id'] = 1;


?>


<head>
    <link rel="stylesheet" href="assets/css/administrators.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <header class="title">
        <div class="container">
            <a href = "/Valture/AdminLogin/AdminsPanel/superadmincells.html"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">Administrators</h1>
        </div>
    </header>
    <section class="admin-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="add_admin">add admin</button>
                <button type="button" id="edit_admin">edit admin</button>
                <button type="button" id="remove_admin" onclick="removeSelectedRow();">remove admin</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Admin No.</th>
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
                                echo "<td>" .$row['id'] . "</td>";
                                echo "<td>" . $row['f_name'] . "</td>";
                                echo "<td>" . $row['l_name'] . "</td>";
                                echo "<td>" . $row['date_created'] . "</td>";
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
    <div class="edit-admin" id="admin_container">
        <div class="wrapper">
            <button id="close_admin">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="image-editor">
                    <div class="image-container">
                        <img src="assets/images/3.jpg" alt="">
                    </div>
                </div>
                <div class="details-editor">
                    <form id = "add-admin">
                    <label for="fn">First Name</label>
                        <input type="text" id="fn" placeholder="First Name Here..." required>
                        <label for="ln">Last Name</label>
                        <input type="text" id="ln" placeholder="Last Name Here..." required>
                        <label for="email">E-mail</label>
                        <input type="text" id="email" placeholder="Email Here..." required>
                        <label for="contact">Contact No.</label>
                        <input type="text" id="contact" placeholder="Contact Here..." required>
                        <label for="pw">Password</label>
                        <div>
                            <input type="password" id="pw" placeholder="Password Here..." required>
                            <i id="toggle_password" class="fa-solid fa-eye one"></i>
                        </div>
                        <input id="save_changes" type="submit" value="Save Changes" onclick="editSelectedRow();">
                        <input id="add_newAdmin" type="submit" value="Add Admin" onclick="addNewRow();">
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
    var pw = document.getElementById("pw");
    var inputs = document.getElementsByTagName('input');

    var togglePassword = document.getElementById('toggle_password');
    var adminContainer = document.getElementById("admin_container");
    var addAdmin = document.getElementById("add_admin");
    var editAdmin = document.getElementById("edit_admin");
    var removeAdmin = document.getElementById("remove_admin");
    var closeAdmin = document.getElementById("close_admin");

    var addNewAdmin = document.getElementById("add_newAdmin");
    var saveChanges = document.getElementById("save_changes");

    var clicked = false;
    editAdmin.disabled = true;
    removeAdmin.disabled = true;
    addAdmin.disabled = false;



    //Showing the edit modal for adding new data
    addAdmin.addEventListener('click', () => {
            adminContainer.classList.add('show');
            saveChanges.classList.add('hide');
            addNewAdmin.classList.remove('hide');
        })

    //Showing the edit modal for updating/editing data of selected row
    editAdmin.addEventListener('click', () => {
            adminContainer.classList.add('show');
            addNewAdmin.classList.add('hide');
            saveChanges.classList.remove('hide');
    })
    
    //Closing the edit modal
    closeAdmin.addEventListener('click', () => {
        adminContainer.classList.remove('show');
    })

    //Toggle for eye in password
    togglePassword.addEventListener('click', () => {
        const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
        pw.setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye-slash');
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked;
                addAdmin.disabled = !addAdmin.disabled;
                editAdmin.disabled = !editAdmin.disabled;
                removeAdmin.disabled = !removeAdmin.disabled;

                if (clicked) {
                    /*CSS related functions, on click disable 
                     * or show buttons and highlight row
                     */
                    addAdmin.classList.add('disable');
                    editAdmin.classList.add('show');
                    removeAdmin.classList.add('show');
                    this.classList.add('highlight');

                    /*If user clicked on table row and clicked edit, 
                     * changes the value of form inputs on edit 
                     */
                    id = this.cells[0].innerHTML;
                    fn.value = this.cells[1].innerHTML;
                    ln.value = this.cells[2].innerHTML;
                }
                if (!clicked) {
                    /*CSS related functions
                     * Turns back all css to default on unclick
                     */
                    addAdmin.classList.remove('disable');
                    editAdmin.classList.remove('show');
                    removeAdmin.classList.remove('show');
                    fn.value = null;
                    ln.value = null;
                    /* If user removes unclicked, removes highlight
                     */
                    for (var j = 0; j < table.rows.length; j++) {
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
        console.log(newID);

        if (rIndex == -1) {
            return;
        }

        $.ajax({
            type: "POST", //type of method
            url: "php/delete_admin.php", //your page
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
        //table.deleteRow(rIndex - 1);

        //CSS related functions
        addAdmin.classList.remove('disable');
        editAdmin.classList.remove('show');
        removeAdmin.classList.remove('show');

        //After removing a row
        addAdmin.disabled = !addAdmin.disabled;
        editAdmin.disabled = !editAdmin.disabled;
        removeAdmin.disabled = !removeAdmin.disabled;
        clicked = !clicked;
        fn.value = null;
        ln.value = null;
        rIndex = -1;
    }

    function editSelectedRow() {

        var newID = parseInt(id);
        var firstName = document.getElementById("fn").value;
        var lastName = document.getElementById("ln").value;
        var email = document.getElementById("email").value;
        var contactNo = document.getElementById("contact").value;
        var password = document.getElementById("pw").value;
        console.log(newID);
        $.ajax({
            type: "POST", //type of method
            url: "php/edit_admin.php", //your page
            data: { 
                id_no: newID, 
                f_name: firstName, 
                l_name: lastName, 
                email: email, 
                contact_no: contactNo, 
                password: password 
            }, // passing the values
            success: function(res) {

                if (res == "200") {

                    console.log(res);
                    //changes the value of rows into the input in edit resource
                    table.rows[rIndex - 1].cells[1].innerHTML = fn.value;
                    table.rows[rIndex - 1].cells[2].innerHTML = ln.value;

                    //removes the modal on save
                    adminContainer.classList.remove('show');

                } else {
                    console.log(res);
                }
            }
        });

    }

    function addNewRow() {

        //loops stops function if any input is empty
        for (var index = 0; index < inputs.length; index++) {
            if(inputs[index].value === "") {
                return;
            } 
        }

        var firstName = document.getElementById("fn").value;
        var lastName = document.getElementById("ln").value;
        var email = document.getElementById("email").value;
        var contactNo = document.getElementById("contact").value;
        var password = document.getElementById("pw").value;

        $.ajax({
            type: "POST", //type of method
            url: "php/add_admin.php", //your page
            data: { 
                f_name: firstName, 
                l_name: lastName, 
                email: email, 
                contact_no: contactNo, 
                password: password 
            }, 
            success: function(res) {

                if (res == "200") {

                    console.log(res);
                    
                    //adds new row and cells.
                   var newRow = table.insertRow(table.length),
                        cell0 = newRow.insertCell(0),
                        cell1 = newRow.insertCell(1),
                        cell2 = newRow.insertCell(2);
                    cell3 = newRow.insertCell(3);

                    //sets the cell value according to the input
                    cell0.innerHTML = table.rows.length;
                    cell1.innerHTML = fn.value;
                    cell2.innerHTML = ln.value;
                    fn.value = null;
                    ln.value = null;

                    //allows the new row to be selectable
                    selectedRowToInput();
                    adminContainer.classList.remove('show'); 
               
                } else {
                    console.log(res);
                }
            }
        });



    }
</script>