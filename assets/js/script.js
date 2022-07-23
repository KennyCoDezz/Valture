
var emailError = document.getElementById('emailerror');
var passwordError = document.getElementById('passworderror');
var fnameError = document.getElementById('firstname-error');
var lnameError = document.getElementById('lastname-error');
var signemailError = document.getElementById('signemailerror');
var contactError = document.getElementById('contacterror');
var enterpassError = document.getElementById('enterpassword-error');
var conpassError = document.getElementById('confirmpass-error');

var logIn = document.getElementById('login');
var signUp = document.getElementById('signup');
var togglePassword1 = document.getElementById('toggle_password1');
var togglePassword2 = document.getElementById('toggle_password2');
var togglePassword3 = document.getElementById('toggle_password3');

logIn.addEventListener('click', function(){
    document.querySelector('.login-wrapper').classList.add('--visible');
    document.querySelector('.signup-wrapper').classList.remove('--visible');
});
signUp.addEventListener('click', function(){
    document.querySelector('.login-wrapper').classList.remove('--visible');
    document.querySelector('.signup-wrapper').classList.add('--visible');
});

togglePassword1.addEventListener('click', () => {
    var pw = document.getElementById('password');
    const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
    pw.setAttribute('type', type);
    togglePassword1.classList.toggle('fa-eye-slash');
});
togglePassword2.addEventListener('click', () => {
    var pw = document.getElementById('enterpass');
    const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
    pw.setAttribute('type', type);
    togglePassword2.classList.toggle('fa-eye-slash');
});
togglePassword3.addEventListener('click', () => {
    var pw = document.getElementById('conpass');
    const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
    pw.setAttribute('type', type);
    togglePassword3.classList.toggle('fa-eye-slash');
});


function validateEmail() {
    var useremail = document.getElementById('email').value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (useremail.length == 0) {
        emailError.innerHTML = 'Email is required';

    } else if (!filter.test(useremail)) {
        emailError.innerHTML = 'Enter a valid email';

    } else {
        emailError.innerHTML = '';
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

    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;


    if (email == "" || pass == "") {
        alert("Please complete the form to continue.");
    } else {

        $.ajax({
            type: "POST", //type of method
            url: "verify-login-credentials.php", //your page
            data: { email: email, password: pass }, // passing the values
            success: function(res) {

                console.log(res);

                if (res == 200) {
                    window.location.href = "/Valture/homepage-registered.php";
                } else if (res > 200 && res <= 500) {
                    document.getElementById("passworderror").innerHTML = "Wrong Password!";
                } else if (res > 500) {
                    document.getElementById("emailerror").innerHTML = "Email Not Found!";
                }

            }
        });


    }
}


function validateFirstName() {
    var SignValFName = document.getElementById("fname").value;

    if (SignValFName.length == 0) {
        fnameError.innerHTML = 'First name is required';
        return false;
    } else {
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

    } else {

        var firstName = document.getElementById("fname").value;
        var lastName = document.getElementById("lname").value;
        var email = document.getElementById("signemail").value;
        var password = document.getElementById("conpass").value;
        var contactNo = document.getElementById("contact").value;

        $.ajax({
            type: "POST", //type of method
            url: "send-email-verification.php", //your page
            data: { fname: firstName, lname: lastName, email: email, password: password, contact: contactNo }, // passing the values
            success: function(res) {

                if (res == "200") {
                    window.location.href = "verification-page-notif.php"
                } else if (res == "500") {
                    document.getElementById("signemailerror").innerHTML = "This email is already registered!"
                } else {
                    console.log(res);
                }

            }
        });

    }
}


function validateNumber() {
    if (!contact.match(/^[0-9]{11}$/)) {
        contactError.innerHTML = 'Invalid Number';

    } else if (contact == "") {
        contactError.innerHTML = 'Field Required!';
    } else {

    }
}


function resendCode() {

    //var elem = document.getElementById("codeDisplay");
    //elem = elem.id;
    //document.getElementById("verify_btn").disabled = true;
    getCountDownTime();

    $.ajax({
        type: "POST",
        url: 're-send-otp.php',
        data: { action: 'call_this' },
        success: function(response) {
            //alert(html);
            console.log(response);

        }

    });

}

function verifyCode() {

    //var elem = document.getElementById("codeDisplay");
    // elem = elem.id;
    var codeFromUser = document.getElementById("code_no").value;


    $.ajax({
        type: "GET",
        url: 'store-code.php',
        data: { action: 'call_this' },
        success: function(response) {

            if (codeFromUser == response) {
                window.location.href = "resetPass.php"
            } else {

                //getCountDownTime();
                console.log("Wrong Code!");

            }

        }

    });
}



function startTimer(duration, display) {

    var timer = duration,
        minutes, seconds;

    console.log(timer);
    setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            document.getElementById("resendCodeBtn").disabled = false;
            timer = 0;

            ClearAllIntervals();
        }

    }, 1000);
}

function getCountDownTime() {
    var fiveMinutes = 40 * 5,
        display = document.querySelector('#time');
    document.getElementById("resendCodeBtn").disabled = true;

    startTimer(fiveMinutes, display);

};


function ClearAllIntervals() {
    for (var i = 1; i < 99999; i++)
        window.clearInterval(i);
}
/*function countDown(secs, elem) {

    var element = document.getElementById(elem);
    document.getElementById("resendCodeBtn").disabled = true;

    element.innerHTML = "(" + secs + ")";

    secs--;

    var timer = setTimeout('countDown(' + secs + ',"' + elem + '")', 1000);


    if (secs < 0) {

        console.log("ssdfsdfsf");
        document.getElementById("resendCodeBtn").disabled = false;
        clearTimeout(timer);

    }



} */
