<html>
<head>
	<title>Login and Registration Form</title>
	<link rel="stylesheet" href="http://localhost/movie-re/style.css">
	<link href='https://fonts.googleapis.com/css?family=Nanum Brush Script' rel='stylesheet'>
</head>
<body>
	<div class="hero">
		<div class="logo">
				<img id="logoimg" src="./pictures/logo.png">
			</div>
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick=" login()">Log In</button>
				<button type="button" class="toggle-btn" onclick=" register()">Register</button>
				
			</div>
		
		
			<form id="login" class="input-group" method="POST" action="http://localhost/movie-re/login.inc.php">
				<input type="email" class="input-field" placeholder="Email Id" name="email" required>
				<input type="Password" class="input-field" placeholder="Enter Password" name="pass" required>
				<!-- <input type="checkbox" class="check-box"> -->
				<br><br><br><a href="forgot.php"> <span>Forgot Password</span></a>
				<button type="submit" class="submit-btn" name="login-button">Log In
				</button>
			</form>
			<form id="register" class="input-group" action="http://localhost/movie-re/registration.inc.php" method="POST">

				<input type="text" class="input-field" placeholder="Full Name" name="fullname" required pattern="[a-zA-Z|' ']{3,30}" title="Sorry, only letters and spaces are allowed with a maximum length of 3-30 letters." >
				<input type="email" class="input-field" placeholder="Email Id" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Sorry, only letters, numbers, periods(.) and '@' are allowed.">
				<input type="Password" class="input-field" placeholder="Enter Password" name="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				<input type="password" class="input-field" placeholder="Re-enter Password" name="repass" required>
				<input type="text" class="input-field"  placeholder="Phone Number" name="phno" required pattern="[6-9]{1}[0-9]{9}" required title="Sorry, only numbers starting with 6,7,8,9 are allowed. Maintain the length of 10." >

				<input type="text"  class="input-field1"  placeholder="Age" name="age" required pattern="(0[1-9]|[1-9][0-9]?)"; title="It should have 2 digits, can have a digit between 0-9, no alphabets and special characters.">
					<select  class="input-field2" name="gender" required title="Please Select Your Gender.">
				  		 <option value="" disabled selected hidden>Gender</option>
   						 <option value="M">Male</option>
   				 		 <option value="F">Female</option>
   				 		 <option value="O">Other</option>
  					</select>
				<input type="text" class="input-field1" placeholder="City" name="city" required pattern="[A-Za-z|' ']+" title="Sorry, only letters and spaces are allowed.">
				
				<input type="text" class="input-field2" placeholder="Pincode"  name="pincode" required pattern="[1-9]{1}[0-9]{5}" required title="Sorry, only 6 digits without spaces are allowed.">
					
  				<input type="text" class="input-field"  placeholder="Aadhaar Number" name="aadharnum" required pattern="[1-9]{1}[0-9]{11}" required title="Sorry. Maintain the length of 12." >
  				<br>
				<button type="submit" class="submit-btn" name="signup-button" >Register</button>
			</form>
			

			</div>
	</div>
	<script>
		var x=document.getElementById("login");
		var y=document.getElementById("register");
		var z=document.getElementById("btn");
		var k=document.getElementById("compid");
		

		function register(){
			x.style.left="-400px";
			y.style.left="50px";
			z.style.left="110px";

		}
		function login(){

			x.style.left="50px";
			y.style.left="450px";
			z.style.left="0";

		}
	
	


	</script>
</body>

</html>