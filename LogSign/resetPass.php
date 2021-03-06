
<!DOCTYPE html>
<html>

<head>
    <title>Login and Signup Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body>


    <div class="cont">
        <div class="form sign-in">
            <form id="form">
                <div class="form-control-in">

                    <a href="code.html"> <img src="img/backbutton.png" class="back">
                        <p class="backtext">Back </p>
                        </img>
                    </a>

                    <h2>Reset Password</h2>

                    <label class="input-group">
                        <span class= "text_reset">strong passwords include numbers,<br/> letters, and punctuation marks</span>
                        <input type="password" name="password" id="enter_password" placeholder="Enter new password" onkeyup="validateNewPassword()"> <img src="img/passlock.png" class="enterpassword_icon"></img>				
						<p id="newpassword-error"></p> 
		</label>

                    <label class="input-group">
        				
        				<input type="password" name="password" id="reenter_password" placeholder="Re-enter new password" onkeyup="validateReEnterPassword()">	<img src="img/passlock.png" class="password_icon"></img>			
						<p id="reenter_password-error"></p> 
		</label>
                    <input type="button" value="RESET PASSWORD" id="forgot_btn" onclick="validateLogin()" />


                </div>
        </div>


        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">

                    <h3>New here?</h3>
                    <p>Sign up to access our library with Free Account!</p>
                </div>

                <div class="img-text m-in">

                    <h3>One of us?</h3>
                    <p> Already have an Account? Login to have borrow and read books for free! </p>
                </div>

                <div class="img-btn">
                    <span class="m-up"><b>SIGN UP</b></span>
                    <span class="m-in"><b>LOG IN</b></span>
                </div>
            </div>


            <div class="form sign-up">

                <a href="none.html"> <img src="img/backbutton.png" class="back">
                    <p class="backtext">Back </p>
                    </img>
                </a>

                <form id="form">
                    <div class="form-control">

                        <h2>SIGN UP</h2>


                        <label class="input-group">
									<span>First Name</span>
										<input type="text" name="name" id="fname" onkeyup="validateFirstName()" > <img src="img/user.png" class="userfn_icon"></img> 	
										<p id="firstname-error"></p>
								</label>


                        <label class="input-group">
									<span>Last Name</span>
										<input type="text" name="name" id="lname" onkeyup="validateLastName()">  <img src="img/user.png" class="userln_icon"></img> 
										<p id="lastname-error"></p>	 	
								</label>

                        <label class="input-group">
									<span>Email</span>
										<input type="email" name="email" id="signemail" onkeyup="validateSignEmail()">  <img src="img/email_icon.png" class="sign-email_icon"></img>
										<p id="signemailerror"></p> 	
													  
								</label>

                        <label class="input-group">
									<span>Contact Number</span>
										<input type="phone" name="connum" id="contact" onkeyup="validateContact()" >	 <img src="img/phone-book.png" class="contact_icon"></img> 	
										<p id="contacterror"></p>			      
								</label>

                        <label class="input-group">          				
									<span>Password</span>
										<input type="password" name="password" id="enterpass" onkeyup="validateEnterPassword()">  <img src="img/passlock.png" class="enter-pass_icon"></img> 	
										<p id="enterpassword-error"></p>
								</label>

                        <label class="input-group">
									<span>Confirm Password</span>
										<input type="password" name="password" id="conpass" onkeyup="validateConPassword()">  <img src="img/passlock.png" class="confirm-pass_icon"></img>
										<p id="confirmpass-error"></p> 					
								</label>


                        <input type="button" value="SIGN UP" id="signup_btn" onclick="validateSignUp()" />
                </form>
                </div>
            </div>
        </div>



        <script type="text/javascript" src="scripts/changepassword_script.js"></script>
</body>

</html>