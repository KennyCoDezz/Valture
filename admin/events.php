<?php

    include 'php/book_db.php';

    $result = mysqli_query($conn,"SELECT * FROM events");
    $GLOBALS['check_table'] = mysqli_num_rows($result);

    mysqli_error($conn);
?>




<head>
    <link rel="stylesheet" href="assets/css/events.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</head>

<body>
    <header class="title">
        <div class="container">
            <a href="/Valture/AdminLogin/AdminsPanel/webcontentscells.html"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">Events</h1>
        </div>
    </header>
    <section class="events-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="add_events">add events</button>
                <button type="button" id="remove_events" onclick="removeSelectedRow();">remove events</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Event No.</th>
                        <th>Event Title</th>
                        <th>Date Created</th>
                        <th>Date of Event</th>
                    </tr>
                </thead>
                <tbody id="table">
                  <?php

                        if ($GLOBALS['check_table'] == 0) {

                            //echo "<script> removeEvents.disabled = true; </script>";


                            echo "<tr>";
                            echo "<td colspan = '4'> No Data Found! </td>";
                            echo "</tr>";

                        } else {

                            while($row = mysqli_fetch_array($result)) {
                            
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['event_title'] . "</td>";
                                echo "<td>" . $row['date_created'] . "</td>";
                                echo "<td>" . $row['date_of_event'] . "</td>";
                                
                                echo "</tr>";
                                
                            }
                        }
                        mysqli_close($conn);

                  ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="edit-events" id="events_container">
        <div class="wrapper">
            <button id="close_events">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="image-editor">
                    <div class="image-container">
                       <img id = "img" src="assets/images/3.jpg" alt= ""> 
                    </div>
                    <div class="button-container">
                        <button onclick = "uploadImage(event)">Upload photo</button>
                    </div>
                </div>
                <div class="details-editor">
                    <form action="#">
                        <label for="event_title">Event Title</label>
                        <input type="text" id="event_title" placeholder="Event Title Here...">
                        <label for="date">Date</label>
                        <input type="date" id="date" placeholder="Date Here (YYYY-MM-DD)">
                        <label for="start_time">Start Time</label>
                        <input type="text" id="start_time" placeholder="Start Time Here...">
                        <label for="end_time">End Time</label>
                        <input type="text" id="end_time" placeholder="End Time Here...">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" placeholder="Description Here..."></textarea>
                        <input id="add_newEvents" type="submit" value="Add Events" onclick="addNewRow()">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var rIndex = -1;
    var image = "";
    var table = document.getElementById("table");
    var eventTitle = document.getElementById("event_title");
    var date = document.getElementById("date");
    var id = "";
    var eventsContainer = document.getElementById("events_container");
    var addEvents = document.getElementById("add_events");
    var removeEvents = document.getElementById("remove_events");
    var closeEvents = document.getElementById("close_events");

    var addNewEvents = document.getElementById("add_newEvents");

    var clicked = false;
    removeEvents.disabled = true;
    addEvents.disabled = false;



    //Showing the edit modal for adding new data
    addEvents.addEventListener('click', () => {
            eventsContainer.classList.add('show');
            addNewEvents.classList.remove('hide');
        })
        //Closing the edit modal
    closeEvents.addEventListener('click', () => {
        eventsContainer.classList.remove('show');
        document.getElementById("img").src = "assets/images/3.jpg";
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked;
                addEvents.disabled = !addEvents.disabled;
                removeEvents.disabled = !removeEvents.disabled;

                if (clicked) {
                    /*CSS related functions, on click disable 
                     * or show buttons and highlight row
                     */

                    id = this.cells[0].innerHTML;
                    addEvents.classList.add('disable');
                    removeEvents.classList.add('show');
                    this.classList.add('highlight');
                }
                if (!clicked) {
                    /*CSS related functions
                     * Turns back all css to default on unclick
                     */
                    addEvents.classList.remove('disable');
                    removeEvents.classList.remove('show');
                    eventTitle.value = null;
                    date.value = null;
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

        if (rIndex == -1) {
            return;
        }

        $.ajax({
            type: "POST", //type of method
            url: "php/delete_events.php", //your page
            data: { id: newID }, // passing the values
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
        addEvents.classList.remove('disable');
        removeEvents.classList.remove('show');

        //After removing a row
        addEvents.disabled = !addEvents.disabled;
        removeEvents.disabled = !removeEvents.disabled;
        clicked = !clicked;
        eventTitle.value = null;
        date.value = null;
        rIndex = -1;
    }

    function addNewRow() {

        var eventTitle = document.getElementById("event_title").value;
        var eventDate = document.getElementById("date").value;
        var startTime = document.getElementById("start_time").value;
        var endTime = document.getElementById("end_time").value;
        var desc = document.getElementById("description").value;

        var formData = new FormData()
        formData.append('file', image);
        formData.append('event_title', eventTitle);
        formData.append('event_date', eventDate);
        formData.append('start_time', startTime);
        formData.append('end_time', endTime);
        formData.append('desc', desc);

        $.ajax({
            type: "POST", 
            url: "php/add_events.php", 
            data: formData, 
            processData: false,
            contentType: false,
            success: function(res) {

                if (res == "200") {

                   window.location.reload();

                } else {
                    console.log(res);
                }
            }
        });

        //adds new row and cells.
       /* var newRow = table.insertRow(table.length),
          cell0 = newRow.insertCell(0),
            cell1 = newRow.insertCell(1),
            cell2 = newRow.insertCell(2);
        cell3 = newRow.insertCell(3);

        //sets the cell value according to the input
            cell0.innerHTML = table.rows.length;
            cell1.innerHTML = eventTitle.value;
            cell3.innerHTML = date.value;
            eventTitle.value = null;
             date.value = null; */

        //allows the new row to be selectable
        selectedRowToInput();
        eventsContainer.classList.remove('show');

    }

    function uploadImage() {

        var el = window._protected_reference = document.createElement("INPUT");
            
            el.type = "file";
            el.accept = "image/*";
           // el.multiple = "multiple"; // remove to have a single file selection
            
            // (cancel will not trigger 'change')
            el.addEventListener('change', function(ev2) {
                // access el.files[] to do something with it (test its length!)
                
                // add first image, if available
                if (el.files.length) {
                    document.getElementById('img').src = URL.createObjectURL(el.files[0]);
                    var name = el.files[0].name;
                    
                }


                // test some async handling
                new Promise(function(resolve) {
                    setTimeout(function() { 
                       
                        image = el.files[0];
                        console.log(image);

                     }, 1000);
               
                })
                .then(function() {
                    // clear / free reference
                    el = window._protected_reference = undefined;
                });

            });

            el.click(); // open
    }


</script>