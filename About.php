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
		<title> About Us Page </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="about.css">
		<link rel="stylesheet" type="text/css" href="home.css">
	</head>
	<body>
		<section class="contact">
			<div class="content">
				<h2> CONTACT US </h2>
				<p>Movieinn, The better way to ask for a ticket<br> is to approach our website :-) </p>
			</div>
		
			<div class="container">
				<div class="ContactInfo">
					<div class="box">
						<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Address </h3>
							<p> #A405 Amrita School Of Engineering,<br> Bengaluru, India<br>55060</p>
						</div>
					</div>

					<div class="box">
						<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Phone </h3>
							<p> 080-4152-1234</p>
						</div>
					</div>

					<div class="box">
						<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<div class="text">
							<h3> Email </h3>
							<p> movieinn@gmail.com</p>
						</div>
					</div>
						<button ><a href="user.php" class="homii"> Home</a></button>
				</div>

				
			</div>
		</section>
	</body>
</html>

