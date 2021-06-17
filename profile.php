<?php
session_start();
//echo $_SESSION['type'];
//echo "<br>";
//echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Profile page </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="profile.css">
		<link rel="stylesheet" type="text/css" href="home.css">

	 
	</head>
	<body>
		<!-- <button >a href="user.php" class="homii"> Home</a></button> -->
		<section class="contact" style="background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(./pictures/inde1x.jpg);display: flex;
	background-size: cover;">
			
			<div class="content">
				<h2> Welcome To Movie Inn </h2>
			
				<button ><a href="user.php" class="homii"> Home</a></button>
			</div>
			



			<div class="container">
				<div id="ContactInfo1">
					<div class="box">
						<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Address </h3>  
							<p> <?php echo $_SESSION['city'];?>,
	            			<br> India,<br><?php echo $_SESSION['pincode'];?></p>
						</div>
					</div>

					<div class="box">
						<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Phone </h3>
							<p><?php echo $_SESSION['phno'];?></p>
						</div>
					</div>

					<div class="box">
						<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Email </h3>
							<p>  <?php echo $_SESSION['email'];?> </p>
						</div>
					</div>
						
				</div>


				<div id="ContactInfo2">
					
					<form id="register" class="input-group" action="http://localhost/movie-re/profile.inc.php" method="POST">

				<input type="text" class="input-field" placeholder="Full Name" name="fullname" required pattern="[a-zA-Z|' ']{3,30}" title="Sorry, only letters and spaces are allowed with a maximum length of 3-30 letters." >
	
				<input type="Password" class="input-field" placeholder="Enter Password" name="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				<!-- <input type="password" class="input-field" placeholder="Re-enter Password" name="repass" required> -->
				<input type="text" class="input-field"  placeholder="Phone Number" name="phno" required pattern="[6-9]{1}[0-9]{9}" required title="Sorry, only numbers starting with 6,7,8,9 are allowed. Maintain the length of 10." >

		
					
				<input type="text" class="input-field1" placeholder="City" name="city" required pattern="[A-Za-z|' ']+" title="Sorry, only letters and spaces are allowed.">
				
				<input type="text" class="input-field2" placeholder="Pincode"  name="pincode" required pattern="[1-9]{1}[0-9]{5}" required title="Sorry, only 6 digits without spaces are allowed.">
					
  
				<button type="submit" class="submit-btn" name="signup-button" >Save</button>
			</form>
						
				</div>
				<button id="homii" class="submit-btn">Edit Details</button>

				
			
		</section>
	</body>
	<script type="text/javascript">
		var x=1;
		x=x+1;
		const but = () => {
			let c1=document.getElementById('ContactInfo1');
			let c2=document.getElementById('ContactInfo2');
			if(button.innerText=="Edit Details"){
				console.log(c1.style.left);
				c1.style.left='-300px';
				c2.style.left='76px';
				console.log(c1.innerhtml);
				button.innerText="Check Details";
			}else{
				console.log(c1.style.left);
				c1.style.left='76px';
				c2.style.left='-300px';
				console.log(c1.style.left);
				button.innerText="Edit Details";
			}

		}
		let button=document.getElementById('homii');
		button.addEventListener("click", but);
	</script>
</html>