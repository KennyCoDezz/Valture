<?php

    session_start();
    $_SESSION['sub_categ'] = "";
    include 'php/book_db.php';

    $result = mysqli_query($conn,"SELECT * FROM book_category");
    $GLOBALS['check_table'] = mysqli_num_rows($result);

    mysqli_error($conn);
?>


<head>
    <link rel="stylesheet" href="assets/css/categories.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <header class="title">
        <div class="container">
            <a href="/Valture/AdminLogin/AdminsPanel/webcontentscells.html"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">Categories</h1>
        </div>
    </header>
    <section class="category-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="add_category">add category</button>
                <a href= "" id="edit_category" onclick = "subCategory(); return false">edit subcategory</a>
                <button type="button" id="remove_category" onclick="removeSelectedRow();">remove category</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Category No.</th>
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
                                echo "<td>" . $row['categ'] . "</td>";
                                
                                echo "</tr>";
                                
                            }
                        }
                        mysqli_close($conn);

                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="edit-category" id="category_container">
        <div class="wrapper">
            <button id="close_category">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="details-editor">
                    <form>
                        <label for="category_title">Category Title</label>
                        <input type="text" id="category_title" placeholder="Category Title Here...">
                        <input id="add_newCategory" type="submit" value="Add Category" onclick="addNewRow(); return false">
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
    var categoryTitle = document.getElementById("category_title");
    var currentCategory = "";
    var categoryContainer = document.getElementById("category_container");
    var addCategory = document.getElementById("add_category");
    var editCategory = document.getElementById("edit_category");
    var removeCategory = document.getElementById("remove_category");
    var closeCategory = document.getElementById("close_category");

    var addNewCategory = document.getElementById("add_newCategory");

    var clicked = false;
    removeCategory.disabled = true;
    addCategory.disabled = false;


    //Showing the edit modal for adding new data
    addCategory.addEventListener('click', () => {
            categoryContainer.classList.add('show');
            addNewCategory.classList.remove('hide');
        })
        //Showing the edit modal for updating/editing data of selected row
    editCategory.addEventListener('click', () => {
            //Backend here
           // console.log(table.rows[rIndex - 1].cells[1].innerHTML);
        })
        //Closing the edit modal
    closeCategory.addEventListener('click', () => {
        categoryContainer.classList.remove('show');
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked;
                addCategory.disabled = !addCategory.disabled;
                removeCategory.disabled = !removeCategory.disabled;

                if (clicked) {
                    /*CSS related functions, on click disable 
                     * or show buttons and highlight row
                     */
                    
                    currentCategory = this.cells[1].innerHTML;
                    console.log(currentCategory);
                    id = this.cells[0].innerHTML;
                    addCategory.classList.add('disable');
                    editCategory.classList.add('show');
                    removeCategory.classList.add('show');
                    this.classList.add('highlight');
                }
                if (!clicked) {
                    /*CSS related functions
                     * Turns back all css to default on unclick
                     */
                    addCategory.classList.remove('disable');
                    editCategory.classList.remove('show');
                    removeCategory.classList.remove('show');
                    categoryTitle.value = null;
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
        var category = currentCategory;

        if (rIndex == -1) {
            return;
        }

        $.ajax({
            type: "POST", //type of method
            url: "php/delete_category.php", //your page
            data: { id: newID, sub_category: category}, // passing the values
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
        addCategory.classList.remove('disable');
        editCategory.classList.remove('show');
        removeCategory.classList.remove('show');
        editCategory.classList.remove('show');

        //After removing a row
        addCategory.disabled = !addCategory.disabled;
        removeCategory.disabled = !removeCategory.disabled;
        clicked = !clicked;
        categoryTitle.value = null;
        rIndex = -1;
    }

    function addNewRow() {

       // var newID = parseInt(id);
        var category = document.getElementById("category_title").value;

        $.ajax({
            type: "POST", //type of method
            url: "php/add_category.php", //your page
            data: { categ: category}, // passing the values
            success: function(res) {

                if (res == "200") {

                    window.location.reload(1);

                } else {
                    console.log(res);
                }
            }
        });

        //adds new row and cells.
       // var newRow = table.insertRow(table.length),
         //   cell0 = newRow.insertCell(0),
         //   cell1 = newRow.insertCell(1);

        //sets the cell value according to the input
        cell0.innerHTML = table.rows.length;
        cell1.innerHTML = categoryTitle.value;
        categoryTitle.value = null;

        //allows the new row to be selectable
        selectedRowToInput();
        categoryContainer.classList.remove('show');
    }

    function subCategory() {
        
        var current = currentCategory;
        
        $.ajax({
            type: "POST", //type of method
            url: "php/store_category_value.php", //your page
            data: { current_categ: current}, // passing the values
            success: function(res) {

                if (res == "200") {

                    window.location.href = "subcategories.php";

                } else {
                    console.log(res);
                }
            }
        });
        
    }

</script>
