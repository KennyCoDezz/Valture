document.querySelector('.img-btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s-signup')
});

var emailError = document.getElementById('emailerror');
var passwordError = document.getElementById('passworderror');
var fnameError = document.getElementById('firstname-error');
var lnameError = document.getElementById('lastname-error');
var signemailError = document.getElementById('signemailerror');
var contactError = document.getElementById('contacterror');
var enterpassError = document.getElementById('enterpassword-error');
var conpassError = document.getElementById('confirmpass-error');


function validateContactLog() {
    var verification_num = document.getElementById('ver_no').value;

    if (verification_num.length == 0) {
        contactError.innerHTML = 'Password is required';
        return false;
    } else if (verification_num.length !== 11) {
        contactError.innerHTML = 'Password should be 11 digits';
        return false;
    } else if (!verification_num.match(/^[0-9]{11}$/)) {
        contactError.innerHTML = 'Invalid Number';
        return false;
    } else {
        contactError.innerHTML = '';
        return true;
    }
}


function validateLogin() {

    var ele = document.getElementsByName('size');
    var number = document.getElementById('contactNumber').textContent;
    var contactNumber = number.trim();
    //console.log(contactNumber);

    for (i = 0; i < ele.length; i++) {
        if (ele[i].checked)

            if (ele[i].value == "number") {

                $.ajax({
                    type: "POST", //type of method
                    url: "send-otp.php", //your page
                    data: { contactNumber: contactNumber }, // passing the values
                    success: function(res) {

                        if (res == 200) {
                            window.location.href = "code.php?value=number";
                        } else {
                            console.log(res);

                        }

                    }
                });


            } else {
                var contactNumber = "";
                $.ajax({
                    type: "POST", //type of method
                    url: "send-otp.php", //your page
                    data: { contactNumber: contactNumber }, // passing the values
                    success: function(res) {

                        if (res == 200) {
                            window.location.href = "code.php?value=email";
                        } else {
                            console.log(res);
                        }


                    }
                });
            }

    }
}




function validateFirstName() {
    var SignValFName = document.getElementById("fname").value;

    if (SignValFName.length == 0) {
        fnameError.innerHTML = 'First name is required';
        return false;
        fnameError.innerHTML = '';
        return true;
    }
}


function validateLastName() {
    var SignValLName = document.getElementById("lname").value;

    if (SignValLName.length == 0) {
        lnameError.innerHTML = 'Last name is required';
        return false;
    } else {
        lnameError.innerHTML = '';
        return true;
    }
}

function validateSignEmail() {
    var signemail = document.getElementById('signemail').value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (signemail.length == 0) {
        signemailError.innerHTML = 'Email is required';
        return false;
    } else if (!filter.test(signemail)) {
        signemailError.innerHTML = 'Enter a valid email';
        return false;
    } else {
        signemailError.innerHTML = '';
        return true;
    }
}


function validateContact() {
    var contact = document.getElementById('contact').value;

    if (contact.length == 0) {
        contactError.innerHTML = 'Password is required';
        return false;
    } else if (contact.length !== 11) {
        contactError.innerHTML = 'Password should be 11 digits';
        return false;
    } else if (!contact.match(/^[0-9]{11}$/)) {
        contactError.innerHTML = 'Invalid Number';
        return false;
    } else {
        contactError.innerHTML = '';
        return true;
    }
}

function validateEnterPassword() {

    var enterpwd = document.getElementById('enterpass').value;

    if (enterpwd.length == 0) {
        enterpassError.innerHTML = 'Password is required';
        return false;
    } else if (enterpwd.length < 8) {
        enterpassError.innerHTML = 'Password should be 8 characters';
        return false;
    } else {
        enterpassError.innerHTML = '';
        return true;
    }
}

function validateConPassword() {

    var enterpwd = document.getElementById("enterpass").value;
    var conpwd = document.getElementById("conpass").value


    if (conpwd.length == 0) {
        conpassError.innerHTML = 'Password is required';
        return false;
    }

    if (enterpwd !== conpwd) {
        conpassError.innerHTML = 'Password does not match';
        return false;
    } else {
        conpassError.innerHTML = '';
        return true;
    }
}


function validateSignUp() {

    if (!validateFirstName() || !validateLastName() || !validateSignEmail() || !validateContact() || !validateEnterPassword() || !validateConPassword()) {
        alert("Please complete the form to continue.");
    } else {
        alert('You are about to Login');
        window.location = "log_sign.html";
    }
}