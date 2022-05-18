<?php
  
    include 'php-homepage/user_db.php';
    include 'includes/registered-nav.php';

    $email = $_SESSION['user_email'];

    if ($email == "") {
        header('Location: /Valture/LogSign/log_sign.html');
    } else {
        
    }

    $fname = "";
    $lname = "";

    $result = mysqli_query($conn_users, "SELECT f_name, l_name FROM users WHERE email = '" . $email . "'");

    while($row = mysqli_fetch_assoc($result)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
    }



?>




<head>
    <link rel="stylesheet" href="assets/css/change_password.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <section class="user_profile">
        <div class="section-wrapper">
            <div class="section-title">
                <h2>change password</h2>
            </div>
        </div>
        <div class="edit-account">
            <div class="img-wrapper">
                <img src="assets/images/1.jpg" alt="">
                <h3>
                    <?php

                        echo $fname . " " . $lname;

                    ?>
                </h3>
            </div>
            <form action="#">
                <div>
                    <input type="password" id="current_pass" placeholder="Enter Current Password" onfocus="showEye()" required>
                    <i id="toggle_passwordOne" class="fa-solid fa-eye one"></i>
                </div>
                <div>
                    <input type="password" id="new_pass" placeholder="Enter New Password" onfocus="showEye()" required>
                    <i id="toggle_passwordTwo" class="fa-solid fa-eye"></i>
                </div>
                <div>
                    <input type="password" id="redo_pass" placeholder="Re-enter New Password" onfocus="showEye()" required>
                    <i id="toggle_passwordThree" class="fa-solid fa-eye"></i>
                </div>
                <input id="save_changes" type="submit" value="Save Changes" onclick = "changePass()">
            </form>
        </div>
    </section>
</body>

<script>
    var currentPass = document.getElementById('current_pass');
    var newPass = document.getElementById('new_pass');
    var redoPass = document.getElementById('redo_pass');

    var togglePasswordOne = document.getElementById('toggle_passwordOne');
    var togglePasswordTwo = document.getElementById('toggle_passwordTwo');
    var togglePasswordThree = document.getElementById('toggle_passwordThree');

    togglePasswordOne.addEventListener('click', () => {
        const type = currentPass.getAttribute('type') === 'password' ? 'text' : 'password';
        currentPass.setAttribute('type', type);
        togglePasswordOne.classList.toggle('fa-eye-slash');
    })
    togglePasswordTwo.addEventListener('click', () => {
        const type = newPass.getAttribute('type') === 'password' ? 'text' : 'password';
        newPass.setAttribute('type', type);
        togglePasswordTwo.classList.toggle('fa-eye-slash');
    })
    togglePasswordThree.addEventListener('click', () => {
        const type = redoPass.getAttribute('type') === 'password' ? 'text' : 'password';
        redoPass.setAttribute('type', type);
        togglePasswordThree.classList.toggle('fa-eye-slash');
    })

    document.addEventListener('click', () => {
        var isClickedInsideOne = currentPass.contains(event.target);
        var isClickedInsideToggleOne = togglePasswordOne.contains(event.target);

        var isClickedInsideTwo = newPass.contains(event.target);
        var isClickedInsideToggleTwo = togglePasswordTwo.contains(event.target);

        var isClickedInsideThree = redoPass.contains(event.target);
        var isClickedInsideToggleThree = togglePasswordThree.contains(event.target);


        if(!isClickedInsideOne && !isClickedInsideToggleOne) {
            togglePasswordOne.classList.remove('show');
        }
        if(!isClickedInsideTwo && !isClickedInsideToggleTwo) {
            togglePasswordTwo.classList.remove('show');
        }
        if(!isClickedInsideThree && !isClickedInsideToggleThree) {
            togglePasswordThree.classList.remove('show');
        }
    })

    

    function showEye() {
        if(currentPass === document.activeElement) {
            togglePasswordOne.classList.add('show');
        } else {
            togglePasswordOne.classList.remove('show');
        }

        if(newPass === document.activeElement) {
            togglePasswordTwo.classList.add('show');
        } else {
            togglePasswordTwo.classList.remove('show');
        }  

        if(redoPass === document.activeElement) {
            togglePasswordThree.classList.add('show');
        } else {
            togglePasswordThree.classList.remove('show');
        }
    }

    function changePass() {

        var currentPassword = document.getElementById('current_pass').value;
        var newPassword = document.getElementById('new_pass').value;
        var retypePass = document.getElementById('redo_pass').value;

        $.ajax({
            type: "POST", //type of method
            url: "php-homepage/update_pass.php", //your page
            data: {
                current_pass: currentPassword,
                new_pass: newPassword,
                retype_pass: retypePass
            }, 
            success: function(res) {

                if (res == "200") {
                    alert("Password Successfully Changed!");
                    window.reload(1);
                } else if (res == "300") {
                    alert("Passwords do not match!")
                } else if (res == "500") {
                    alert("Your current password is wrong!");
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