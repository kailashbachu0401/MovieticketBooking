<html>
<head>
	<title>Forgot password</title>
	<link rel="stylesheet" href="http://localhost/movie-re/forgot.css">
	<link href='https://fonts.googleapis.com/css?family=Nanum Brush Script' rel='stylesheet'>
</head>
<body>
	<div class="hero">
		<div class="logo">
				<img id="logoimg" src="./pictures/logo.png">
				
			</div>
		<div class="form-box">
			<!-- <div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" >Forgot password</button>
				
				
			</div> -->
		
		
			<form id="login" class="input-group" method="POST" action="http://localhost/movie-re/forgot.inc.php">
				<input type="email" class="input-field" placeholder="Email Id" name="email" required>
				<input type="Password" class="input-field" placeholder="Enter Password" name="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
				<input type="Password" class="input-field" placeholder="confirm password" name="cpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
				
				<button type="submit" class="submit-btn" name="forgot">submit
				</button>
			</form>
			
			

			</div>
	</div>
	
</body>

</html>






