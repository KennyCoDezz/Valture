<?php

    session_start();

?>



<!DOCTYPE html>
<html>

<head>
    <title>Phone Number Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/forgotPass.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="cont">
        <div class="form sign-in">

            <form id="form">
                <div class="form-control-in">

                    <a href="forgotPass.html"> <img src="img/backbutton.png" class="back">
                        <p class="backtext">Back </p>
                        </img>
                    </a>

                    <div class="verification-body" id="test">

                        <h4> Verify Your Information </h4>

                        <h2> How do you want to get the code to verify your information? </h2>

                        <br>


                        <div class="radio-buttons">

                            <!-- START OF 1ST RADIO BUTTON-->

                            <div class="radio-group">

                                <input type="radio" name="size" id="small" class="form__radio-input" value="email">

                                <label class="form__label-radio" for="small" class="form__radio-label">
											<span class="form__radio-button"></span> Send code via E-mail
										  </label>

                            </div>

                            <!-- END OF 1ST RADIO BUTTON-->

                            <br><br>

                            <!-- START OF 2ND RADIO BUTTON-->

                            <div class="form__radio-group">

                                <input type="radio" name="size" id="large" class="form__radio-input" value="number">

                                <label class="form__label-radio" for="large" class="form__radio-label">
											
											<span class="form__radio-button"></span> Send code via SMS 
											<br> 
											
											<!-- START OF PHONE NUMBER CONTAINER --> 	
											
											<span class="phone-number" id = "contactNumber"> 
                                                
                                                <?php echo "".$_SESSION["number"] ."";?>

                                            </span>
											
											<!-- END OF PHONE NUMBER CONTAINER --> 	
											
										  </label>
                            </div>

                            <!-- END OF 2ND RADIO BUTTON-->


                        </div>

                        </label>

                    </div>

                    <br><br>

                    <!---NEXT BUTTON -->
                    <input type="button" value="NEXT" id="forgot_btn" onclick="validateLogin()" /></a>


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


                                <input type="button" value="SIGN UP" id="signupBtn" onclick="validateSignUp()" /><input type="button" value="SIGN UP" id="signup_btn" onclick="validate()" />
                        </form>
                        </div>
                    </div>
                </div>



                <script type="text/javascript" src="scripts/contact_script.js"></script>
</body>

</html>