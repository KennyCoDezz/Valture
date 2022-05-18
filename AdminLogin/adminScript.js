var userError = document.getElementById('usererror');
var passwordError = document.getElementById('passworderror');

function validateUser() {

    var Username = document.getElementById('username').value;

    if (Username.length == 0) {
        userError.innerHTML = 'Username is required';
        return false;
    } else {
        userError.innerHTML = '';
        return true;
    }
}



function validatePassword() {

    var pwd = document.getElementById('password').value;

    if (pwd.length == 0) {
        passwordError.innerHTML = 'Password is required';
        return false;
    } else if (pwd.length < 8) {
        passwordError.innerHTML = 'Password should be 8 characters';;
        return false;
    } else {
        passwordError.innerHTML = '';
        return true;
    }
}


function validateLogin() {

    var user = document.getElementById("username").value;
    var password = document.getElementById("password").value;


    if (!validateUser() || !validatePassword()) {
        alert("Please complete the form to continue.");
    } else {

        $.ajax({
            type: "POST", //type of method
            url: "php/login.php", //your page
            data: { userName: user, pass: password }, // passing the values
            success: function(res) {

                if (res == "200") {
                    window.location.href = "AdminsPanel/superadmincells.html";
                } else if (res == "500") {
                    document.getElementById("passworderror").innerHTML = "Wrong Password!";
                } else if (res == "600") {
                    document.getElementById("usererror").innerHTML = "Email Not Found!";
                } else if (res == "300") {
                    window.location.href = "AdminsPanel/regadmincells.html";
                } else {
                    document.getElementById("usererror").innerHTML = "Email Not Found!";
                    document.getElementById("passworderror").innerHTML = "Wrong Password!";
                    console.log("Something Goes Wrong!");
                }
            }
        });

    }
}