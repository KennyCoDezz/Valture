<?php

    include 'php/book_db.php';

    $result = mysqli_query($conn,"SELECT * FROM book_record");
    $GLOBALS['check_table'] = mysqli_num_rows($result);

    $result_categ = mysqli_query($conn, "SELECT * FROM `book_category`");

?>



<head>
    <link rel="stylesheet" href="assets/css/resources.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <header class="title">
        <div class="container">
            <a href="/Valture/AdminLogin/AdminsPanel/webcontentscells.html"><i class="fa-solid fa-arrow-left"></i>Back</a>
            <h1 class="page_title">Resources</h1>
        </div>
    </header>
    <section class="resources-list-table">
        <div class="container">
            <div class="buttons">
                <button type="button" id="add_res">add resource</button>
                <button type="button" id="edit_res" onclick = "editResource()">edit resource</button>
                <button type="button" id="remove_res" onclick="removeSelectedRow();">remove resource</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Book No.</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Date Added</th>
                        <th>Featured</th>
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

                                $featured = "";

                                if ($row['featured'] == "yes") {
                                    $featured = "<span class='text'>yes</span><i class='fa-solid fa-star highlight'></i>";
                                    
                                } else {
                                    $featured = "<span class='text'>yes</span><i class='fa-solid fa-star'></i>";
                                }
                            
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['book_title'] . "</td>";
                                echo "<td>" . $row['book_author'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                                echo "<td>" . $featured. "</td>";
                                echo "</tr>";
                                
                            }
                        }
                        mysqli_close($conn);

                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="edit-resources" id="resources_container">
        <div class="wrapper">
            <button id="close_res">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="editor-wrapper">
                <div class="image-editor">
                    <div class="image-container">
                        <img id = "img" src="assets/images/3.jpg" alt="">
                    </div>
                    <div class="button-container">
                        <button id = "imgBtn" onclick = "uploadImage(event)">Upload Photo</button>
                        <button id = "pdfBtn" onclick = "uploadPDF(event)">Upload a File (PDF)</button>
                    </div>
                </div>
                <div class="details-editor">
                    <form action="#">
                        <label for="title">Title</label>
                        <input type="text" id="title" placeholder="Title Here..." required>
                        <label for="author">Author Name</label>
                        <input type="text" id="author" placeholder="Author Here..." required>
                        <label for="date">Date Added</label>
                        <input type="date" id="date" placeholder="Date Here..." required>
                        <label for="page">Page No.</label>
                        <input type="text" id="page" placeholder="Page Here..." required>
                        <label for="isbn">ISBN No.</label>
                        <input type="text" id="isbn" placeholder="ISBN Here..." required>
                        <label for="description">Description</label>
                        <textarea type="text" id="description" placeholder="Description Here..." required></textarea>
                        <label for="keywords">Keywords</label>
                        <input type="text" id="keywords" placeholder="Keywords Here..." required>
                        <label for="category">Featured</label>
                        <select id="featured" value="" required>
                            <option value="" selected>--Select an option--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <label for="category">Category</label>
                        <select name = "categ" id="category">
                            <option value="select" selected>--Select a category--</option>

                            <?php

                                while($row_categ = mysqli_fetch_array($result_categ)) {
                                                            
                                    echo "<option value = '{$row_categ['categ']}'>" . $row_categ['categ'] . "</option>";
                                    
                                }

                            ?>
                        </select>
                        <label for="subcategory">Subcategory</label>
                       
                        <select name = "subcateg" id="subcategory">
                            <option value="" selected>--Select a subcategory--</option>
                        </select>
                        <input id="save_changes" type="submit" value="Save Changes" onclick="editSelectedRow(); return false">
                        <input id="add_newRes" type="submit" value="Add Resource" onclick="addNewRow(); return false">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var rIndex = -1;

    var table = document.getElementById("table");
    var title = document.getElementById("title");
    var author = document.getElementById("author");
    //var date = document.getElementById("date");
    var featured = document.getElementById('featured');
    var image = "";
    var pdf = "";
    var id = "";
    var subCateg = document.getElementById('subcategory').value;
    var subCategEdit = "";
    var inputs = document.getElementsByTagName('input');
    var select = document.getElementsByTagName('select');
    var resContainer = document.getElementById("resources_container");
    var addRes = document.getElementById("add_res");
    var editRes = document.getElementById("edit_res");
    var removeRes = document.getElementById("remove_res");
    var closeRes = document.getElementById("close_res");

    var addNewRes = document.getElementById("add_newRes");
    var saveChanges = document.getElementById("save_changes");

    var clicked = false;
    editRes.disabled = true;
    removeRes.disabled = true;
    addRes.disabled = false;

    

    //Showing the edit modal for adding new data
    addRes.addEventListener('click', () => {
        resContainer.classList.add('show');
        saveChanges.classList.add('hide');
        addNewRes.classList.remove('hide');
    })
    //Showing the edit modal for updating/editing data of selected row
    editRes.addEventListener('click', () => {
        resContainer.classList.add('show');
        addNewRes.classList.add('hide');
        saveChanges.classList.remove('hide');
    })
    //Closing the edit modal
    closeRes.addEventListener('click', () => {
        resContainer.classList.remove('show');
    })

    //Outputs the index of selected table row
    function selectedRowToInput() {     
        for(var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                clicked = !clicked; 
                addRes.disabled = !addRes.disabled;
                editRes.disabled = !editRes.disabled;
                removeRes.disabled = !removeRes.disabled;

                if(clicked) {
                    /*CSS related functions, on click disable 
                    * or show buttons and highlight row
                    */
        
                    id  = this.cells[0].innerHTML;
                    addRes.classList.add('disable');
                    editRes.classList.add('show');
                    removeRes.classList.add('show');
                    this.classList.add('highlight');

                    /*If user clicked on table row and clicked edit, 
                    * changes the value of form inputs on edit 
                    */
                    title.value = this.cells[1].innerHTML;
                    author.value = this.cells[2].innerHTML;
                    date.value = this.cells[3].innerHTML;
                    featured.value = this.cells[4].querySelector('.text').innerHTML;
                }
                if(!clicked) {
                    /*CSS related functions
                    * Turns back all css to default on unclick
                    */
                    addRes.classList.remove('disable');
                    editRes.classList.remove('show');
                    removeRes.classList.remove('show');
                    title.value = null;
                    author.value = null;
                    date.value = null;
                    featured.value = '';
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
        if(rIndex == -1) {
            return;
        }
        //deletes the selected row
        table.deleteRow(rIndex-1);

        //CSS related functions
        addRes.classList.remove('disable');
        editRes.classList.remove('show');
        removeRes.classList.remove('show');

        //After removing a row
        addRes.disabled = !addRes.disabled;
        editRes.disabled = !editRes.disabled;
        removeRes.disabled = !removeRes.disabled;
        clicked = !clicked;
        title.value = null;
        author.value = null;
        date.value = null;
        featured.value = '';
        rIndex = -1;
    }

    function editSelectedRow() {

        var id_no = parseInt(id);
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var page = document.getElementById("page").value;
        var pageNo = parseInt(page);
        var isbnNo = document.getElementById("isbn").value;
        var date = document.getElementById("date").value;
        var desc = document.getElementById("description").value;
        var keywords = document.getElementById("keywords").value;
        var feature = document.getElementById("featured").value;
        var categ = document.getElementById("category").value;
        var formData = new FormData();

        var sub = "";

        console.log(date);
        console.log(image);

        for (var index = 0; index < inputs.length; index++) {
            if(inputs[index].value === "") {
                return;
            }
        }

        if (subCateg != "") {
            sub = subCateg;
        } else {
            sub = subCategEdit;
        }

        if (image == "" && pdf == "") {

            var empty = "500";

            formData.append('name_of_file', "");
            formData.append('title', title);
            formData.append('author', author);
            formData.append('pageNo', pageNo);
            formData.append('isbn', isbnNo);
            formData.append('des', desc);
            formData.append('keywords', keywords);
            formData.append('feature', feature);
            formData.append('category', categ);
            formData.append('subcategory', sub);
            formData.append('date', date);
            formData.append('validator', empty);
            formData.append('id', id_no);

        } else if (image == "" || pdf == "") {

            var validator = "300";
            var file = "";
            var fileType = "";

            if (image != "") {
                file = image;
                fileType = "image_file";
            } else {
                file = pdf;
                fileType = "pdf_file";
            }

            formData.append('name_of_file', fileType);
            formData.append(fileType, file);
            formData.append('title', title);
            formData.append('author', author);
            formData.append('pageNo', pageNo);
            formData.append('isbn', isbnNo);
            formData.append('des', desc);
            formData.append('keywords', keywords);
            formData.append('feature', feature);
            formData.append('category', categ);
            formData.append('subcategory', sub);
            formData.append('date', date);
            formData.append('validator', validator);
            formData.append('id', id_no);

            console.log(fileType);

        } else if (image != "" && pdf != "") {

            var validator = "200";

            formData.append('name_of_file', "");
            formData.append('image_file', image);
            formData.append('pdf_file', pdf);
            formData.append('title', title);
            formData.append('author', author);
            formData.append('pageNo', pageNo);
            formData.append('isbn', isbnNo);
            formData.append('des', desc);
            formData.append('keywords', keywords);
            formData.append('feature', feature);
            formData.append('category', categ);
            formData.append('subcategory', sub);
            formData.append('date', date);
            formData.append('validator', validator);
            formData.append('id', id_no);

        }

        
        $.ajax({
            type: "POST", 
            url: "php/update_book_details.php", 
            data: formData, 
            processData: false,
            contentType: false,
            success: function(res) {

                if (res == "200") {

                   //window.location.reload(1);
                   console.log(res);

                } else {
                    console.log(res);
                }
            }
        });  

        //changes the value of rows into the input in edit resource
        table.rows[rIndex-1].cells[1].innerHTML=title.value;
        table.rows[rIndex-1].cells[2].innerHTML=author.value;
        table.rows[rIndex-1].cells[3].innerHTML=date.value;

        //removes the modal on save
        resContainer.classList.remove('show');
    }

    function addNewRow() {

        for (var index = 0; index < inputs.length; index++) {
            if(inputs[index].value === "") {
                return;
            }
        }

        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var page = document.getElementById("page").value;
        var pageNo = parseInt(page);
        var isbnNo = document.getElementById("isbn").value;
        var date = document.getElementById("date").value;
        var desc = document.getElementById("description").value;
        var keywords = document.getElementById("keywords").value;
        var feature = document.getElementById("featured").value;
        var categ = document.getElementById("category").value;

        console.log(date);

        var formData = new FormData()
        formData.append('image_file', image);
            formData.append('pdf_file', pdf);
            formData.append('title', title);
            formData.append('author', author);
            formData.append('pageNo', pageNo);
            formData.append('isbn', isbnNo);
            formData.append('des', desc);
            formData.append('keywords', keywords);
            formData.append('feature', feature);
            formData.append('category', categ);
            formData.append('subcategory', subCateg);
            formData.append('date', date);

        
        $.ajax({
            type: "POST", 
            url: "php/add_resources.php", 
            data: formData, 
            processData: false,
            contentType: false,
            success: function(res) {

                if (res == "200") {

                   window.location.reload(1);
                   console.log(res);

                } else {
                    console.log(res);
                }
            }
        }); 



        //adds new row and cells.
        /*var newRow = table.insertRow(table.length),
        cell0 = newRow.insertCell(0), 
        cell1 = newRow.insertCell(1),
        cell2 = newRow.insertCell(2); 
        cell3 = newRow.insertCell(3); 
        cell4 = newRow.insertCell(4); 

        //sets the cell value according to the input
        cell0.innerHTML = table.rows.length;
        cell1.innerHTML = title.value;
        cell2.innerHTML = author.value;
        cell3.innerHTML = date.value;
        title.value = null;
        author.value = null;
        date.value = null;

        //if document is featured or not
        if(featured.value=='yes') {
            cell4.innerHTML="<span class='text'>yes</span><i class='fa-solid fa-star highlight'></i>";
        } else if(featured.value=='no') {
            cell4.innerHTML="<span class='text'>no</span><i class='fa-solid fa-star'></i>";
        } else {
            cell4.innerHTML="<span class='text'></span><i class='fa-solid fa-star'></i>";
        } */

        //allows the new row to be selectable
        selectedRowToInput();
       // resContainer.classList.remove('show');

    }

    $("select[name='categ']").change(function () {
    
        var stateID = $(this).val();
        console.log(stateID);

        if(stateID != "select") {

            $.ajax({

                url: "php/store_sub_categ_value.php",
                dataType: 'Json',
                data: {'column': stateID},
                success: function(data) {
                    
                    $('select[name="subcateg"]').empty();
                    $.each(data, function(key, value) {
                        //subCateg = value;
                       console.log(key);
                        $('select[name="subcateg"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });


        } else {
            $('select[name="subcateg"]').empty();
            $('select[name="subcateg"]').append("<option value='select' selected>--Select a subcategory--</option>");
        } 
    });

    function uploadImage() {

        var input = window._protected_reference = document.createElement("INPUT");
            
            input.type = "file";
            input.accept = "image/*";
        // el.multiple = "multiple"; // remove to have a single file selection
            
            // (cancel will not trigger 'change')
            input.addEventListener('change', function(ev2) {
               
                // add first image, if available
                if (input.files.length) {
                    document.getElementById('img').src = URL.createObjectURL(input.files[0]);
                    document.getElementById('imgBtn').innerHTML = input.files[0].name;
                    document.getElementById('imgBtn').disabled = true;
                }


                // test some async handling
                new Promise(function(resolve) {
                    setTimeout(function() { 
                    
                        image = input.files[0];
                        console.log(image);

                    }, 1000);
            
                })
                .then(function() {
                    // clear / free reference
                    el = window._protected_reference = undefined;
                });

            });

            input.click(); // open


    }

    function uploadPDF() {

        var input = window._protected_reference = document.createElement("INPUT");
            
            input.type = "file";
            input.accept = "application/pdf";
        // el.multiple = "multiple"; // remove to have a single file selection
            
            // (cancel will not trigger 'change')
            input.addEventListener('change', function(ev2) {
            
                // add first image, if available
                if (input.files.length) {
                    document.getElementById('pdfBtn').innerHTML =   input.files[0].name;
                    document.getElementById('pdfBtn').disabled = true;
                }


                // test some async handling
                new Promise(function(resolve) {
                    setTimeout(function() { 
                    
                        pdf = input.files[0];
                        console.log(pdf);

                    }, 1000);
            
                })
                .then(function() {
                    // clear / free reference
                    input = window._protected_reference = undefined;
                });

            });

            input.click(); // open


    }

    function editResource() {
        
        var newID = parseInt(id);
        console.log(newID);
        
        $.ajax({
            type: "POST", 
            url: "php/get_book_data.php", 
            data: { id_no: newID}, 
            dataType: 'json', 
            success: function(result) {
                console.log(result.bookImage);
                
                $("#img").attr("src", "php/" + result.bookImage);
                $("#page").val(result.pageNo);
                $("#isbn").val(result.isbn);
                $("#description").val(result.desc);
                $("#keywords").val(result.keywords);
                $("#isbn").val(result.isbn);
                $("#featured").val(result.featured);
                $("#category").val(result.category);
                $('#subcategory').append("<option value='select' selected>" + result.subCategory + "</option>");
                subCategEdit = result.subCategory;
                console.log(subCateg);
                
            }
        });        
    }
      

</script>