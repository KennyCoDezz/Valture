<?php

	session_start();

	$current_value = $_GET['value'];
	$_SESSION['state'] = '';

	if ($current_value == "email") {
		$GLOBALS['value'] = $_SESSION['email'];
		$_SESSION['state'] = "email";
	} else {
		$GLOBALS['value'] = $_SESSION['number'];
		$_SESSION['state'] = "number";
	}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Code Form</title>
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

                    <a href="phone_verification.html"> <img src="img/backbutton.png" class="back">
                        <p class="backtext">Back </p>
                        </img>
                    </a>

                    <h4>Check your phone</h4>

                    <label class="input-group">
        				<span>Enter the code sent to</br>

							<?php echo "".$GLOBALS['value']."";?>
						
						</span>
        				<input type="code" name="codenum" id="code_no" placeholder="code">				
			<label class = "input-group">	
						<input type="button" value="VERIFY" id="verify_btn"/>
						<p class="no_code">
							Didn't get the code?
						</p>
                        <p class="resend_code" onclick = "resendCode()"> <u> Resend Code</u></p>
						
                
                
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

					<a href="none.html"> <img src="img/backbutton.png" class="back"> <p class="backtext">Back </p></img></a>

						<form id="form" >
							<div class="form-control">	

								<h2>SIGN UP</h2>

									<label class = "input-group">
										<span>First Name</span>
											<input type="text" name="name" id="fname" > <img src="img/user.png" class="userfn_icon"></img> 	
				
									</label>


                    <label class="input-group">
										<span>Last Name</span>
											<input type="text" name="name" id="lname" >  <img src="img/user.png" class="userln_icon"></img> 	 	
									</label>

                    <label class="input-group">
										<span>Email</span>
											<input type="email" name="email" id="signemail">  <img src="img/email_icon.png" class="sign-email_icon"></img> 					      
									</label>

                    <label class="input-group">
										<span>Contact Number</span>
											<input type="phone" name="connum" id="contact" >	 <img src="img/phone-book.png" class="contact_icon"></img> 				      
									</label>

                    <label class="input-group">          				
										<span>Password</span>
											<input type="password" name="password" id="enterpass" >  <img src="img/passlock.png" class="enter-pass_icon"></img> 	
									</label>

                    <label class="input-group">
										<span>Confirm Password</span>
											<input type="password" name="password" id="conpass" >  <img src="img/passlock.png" class="confirm-pass_icon"></img> 					
									</label>


                    <input type="button" value="SIGN UP" id="signup_btn" onclick="validateSignUp()" />
            </form>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="scripts/script.js"></script>
</body>

</html>