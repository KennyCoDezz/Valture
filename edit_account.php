<?php

    require '/xampp/htdocs/Valture/admin/php/user_db.php';
    include 'includes/registered-nav.php';

    $first_name = "";
    $last_name = "";
    $email = "";
    $contact = "";

    $user_email = $_SESSION['user_email'];

    $result = mysqli_query($conn,"SELECT f_name, l_name, email, contact_no FROM users WHERE email = '".$user_email."'");
   
    while($row = mysqli_fetch_assoc($result)) { 
        
        $first_name = $row['f_name'];
        $last_name = $row['l_name'];
        $email = $row['email'];
        $contact = $row['contact_no'];

    }

?>







<head>
    <link rel="stylesheet" href="assets/css/edit_account.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <section class="user_profile">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>edit account</h2>
            </div>
        </div>
        <div class="edit-account">
            <img src="assets/images/1.jpg" alt="">
            <form action="#">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" placeholder= <?php  echo $first_name   ?>>
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" placeholder= <?php  echo $last_name   ?>>
                <label for="email">Email</label>
                <input type="text" id="email" placeholder= <?php  echo $email  ?>>
                <label for="contact">Contact No.</label>
                <input type="text" id="contact" placeholder= <?php  echo $contact  ?>>
                <input id="save_changes" type="submit" value="Save Changes" onclick="updateDetails()">
            </form>
        </div>
    </section>
</body>

<script>


    function updateDetails() {

        var firstNameP = document.getElementById('firstname').placeholder;
        var lastNameP = document.getElementById('lastname').placeholder;
        var emailP = document.getElementById('email').placeholder;
        var contactNoP = document.getElementById('contact').placeholder;

        var firstName = document.getElementById('firstname').value;
        var lastName = document.getElementById('lastname').value;
        var email = document.getElementById('email').value;
        var contactNo = document.getElementById('contact').value;

        console.log(lastName);

        if (firstName == "") {
            firstName = firstNameP;
        } 

        if (lastName == "") {
            lastName = lastNameP;
        }
        if (email == "") {
            email = emailP;
        } 
        if (contactNo == "") {
            contactNo = contactNoP;
        }

        console.log(lastName);

        $.ajax({
            type: "POST", //type of method
            url: "php-homepage/update_account_details.php", //your page
            data: {
                first_name: firstName,
                last_name: lastName,
                email: email,
                contact_no: contactNo
            }, 
            success: function(res) {

                if (res == "200") {
                    window.reload(1);
                } else {
                    console.log(res);
                }
                
            }, 

            error: function() {
                console.log(error_get_last);
            }
        });
    }



</script>

<?php

    include 'includes/footer.html';

?>