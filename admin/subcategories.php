<?php

    session_start();

    include 'php/book_db.php';

    $column = $_SESSION['sub_categ'];
 
    $result = mysqli_query($conn,"SELECT * FROM {$column}");

   // echo "<script> var column = {$column}; </script>";
   
    $GLOBALS['check_table'] = mysqli_num_rows($result);

?>



<head>
    <link rel="stylesheet" href="assets/css/subcategories.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <header class="title">
        <div class="container">
            <a href="categories.php"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">subcategories -
                <?php

                    echo "".$column."";

                ?>
            </h1>
        </div>
    </header>
    <section class="subcategory-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="add_subcategory">add subcategory</button>
                <button type="button" id="remove_subcategory" onclick="removeSelectedRow();">remove subcategory</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Subcategory No.</th>
                        <th>Title</th>
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
                                echo "<td>" . $row['list_sub_categ'] . "</td>";
                                
                                echo "</tr>";
                                
                            }
                        }
                        mysqli_close($conn);

                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="edit-subcategory" id="subcategory_container">
        <div class="wrapper">
            <button id="close_subcategory">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="details-editor">
                    <form action="#">
                        <label for="subcategory_title">Subcategory Title</label>
                        <input type="text" id="subcategory_title" placeholder="Subcategory Title Here...">
                        <input id="add_newSubcategory" type="submit" value="Add Subcategory" onclick="addNewRow(); return false">
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
    var subcategoryTitle = document.getElementById("subcategory_title");

    var subcategoryContainer = document.getElementById("subcategory_container");
    var addSubcategory = document.getElementById("add_subcategory");
    var removeSubcategory = document.getElementById("remove_subcategory");
    var closeSubcategory = document.getElementById("close_subcategory");

    var addNewSubcategory = document.getElementById("add_newSubcategory");

    var clicked = false;
    removeSubcategory.disabled = true;
    addSubcategory.disabled = false;



    //Showing the edit modal for adding new data
    addSubcategory.addEventListener('click', () => {
            subcategoryContainer.classList.add('show');
            addNewSubcategory.classList.remove('hide');
        })
        //Closing the edit modal
    closeSubcategory.addEventListener('click', () => {
        subcategoryContainer.classList.remove('show');
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked;
                addSubcategory.disabled = !addSubcategory.disabled;
                removeSubcategory.disabled = !removeSubcategory.disabled;

                if (clicked) {
                    /*CSS related functions, on click disable 
                     * or show buttons and highlight row
                     */
                    
                    id = this.cells[0].innerHTML;
                    console.log(this.cells[0].innerHTML);
                    addSubcategory.classList.add('disable');
                    removeSubcategory.classList.add('show');
                    this.classList.add('highlight');
                    
                   
                }
                if (!clicked) {
                    /*CSS related functions
                     * Turns back all css to default on unclick
                     */
                    addSubcategory.classList.remove('disable');
                    removeSubcategory.classList.remove('show');
                    subcategoryTitle.value = null;
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
        var newColumn = column;

        if (rIndex == -1) {
            return;
        }

        $.ajax({
            type: "POST", //type of method
            url: "php/delete_sub_category.php", //your page
            data: { id: newID}, // passing the values
            success: function(res) {

                if (res == "200") {

                    window.location.reload(1);

                } else {
                    console.log(res);
                }
            }
        });

        //deletes the selected row
       // table.deleteRow(rIndex - 1);

        //CSS related functions
        addSubcategory.classList.remove('disable');
        removeSubcategory.classList.remove('show');

        //After removing a row
        addSubcategory.disabled = !addSubcategory.disabled;
        removeSubcategory.disabled = !removeSubcategory.disabled;
        clicked = !clicked;
        subcategoryTitle.value = null;
        rIndex = -1;
    }

    function addNewRow() {

        var subCategory = document.getElementById("subcategory_title").value;

        $.ajax({
            type: "POST", //type of method
            url: "php/add_sub_category.php", //your page
            data: { sub_categ: subCategory}, // passing the values
            success: function(res) {

                if (res == "200") {

                    window.location.reload(1);

                } else {
                    console.log(res);
                }
            }
        });

        //allows the new row to be selectable
        selectedRowToInput();
        subcategoryContainer.classList.remove('show');

    }
</script>