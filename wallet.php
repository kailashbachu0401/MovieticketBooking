<?php
session_start();
//echo $_SESSION['type'];
//echo "<br>";
//echo $_SESSION['emai']; 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Wallet page </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="wallet.css">
		

	 
	</head>
	<body>
		<!-- <buton ><a href="user.php" class="homii"> Home</a></button> -->
		<section class="contact" style="background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(./pictures/wallet.jpg);display: flex;
	background-size: cover;">
			
			<div class="content">
				
				<p> -------------------------------------------------------</p>
				<p> -----------------------------------------------------</p>
				<p> -----------------------------------------------------</p>
				<p> -----------------------------------------------------</p>
				<button ><a href="user.php" class="homii"> Home</a></button>
			</div>
			



			<div class="container">
				<div id="ContactInfo1">
					<?php
						$email=$_SESSION['email'];
						require 'dbconn.inc.php';
						$selectc="select * from wallet where cemail=?";
						$stmt=mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt,$selectc)){
	                		echo "my sql error";
	            		}else{
	            			mysqli_stmt_bind_param($stmt,"s",$email);
	                		mysqli_stmt_execute($stmt);
	                		$resultc=mysqli_stmt_get_result($stmt);
	                		$rowcountc=mysqli_num_rows($resultc);
	                		$rowcount=$rowcountc;
	                		$values=mysqli_fetch_assoc($resultc);
	                		
	                		}
	            		
					?>
					<div class="box">
						<!-- <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div> -->
						<div class="text">
							<h3> Current wallet balance</h3>  
							<p> <?php if($rowcount!=0){echo $values["wbal"];}?> Rupees</p>
							<p><br></p>
						</div>
					</div>

					<div class="box">
						<!-- <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div> -->
						<div class="text">
							<h3> Card details </h3>
							<p> Card number: <?php echo $values["cardnum"];?>,
	            			<br> Card holder: <?php echo $values["cardholder"];?>,
	            			<br> Card expiry: <?php  echo $values["expdate"]; ?>
	            		</p>
	            			<p><br></p>
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
					
					<form id="register" class="input-group" action="http://localhost/movie-re/wallet.inc.php" method="POST">

						<input type="text" class="input-field" placeholder="Card number without spaces" name="cardnum" required pattern="^4[0-9]{12}(?:[0-9]{3})?$"; title="it should start with 4, it can be 13 to 16 digits long, no letters or special characters">
			
						<input type="name" class="input-field" placeholder="Card holder" name="cardholder" required pattern="[a-zA-Z|' ']{3,30}" title="Only letters and spaces are allowed with a maximum length of 3-30 letters.">
						
						<input type="text" class="input-field"  placeholder="expiry date in mm/yyyy" name="expdate" required pattern="(1[0-2]|0[1-9])(/)([2-9][0-9][2-9][1-9])" >

				
							
						<input type="text" class="input-field1" placeholder="CVV" name="cvv" required pattern="[0-9]{3}"; title="It should have 3 digits, can have a digit between 0-9, no alphabets and special characters.">
						
							
		  
						<button type="submit" class="submit-btn" name="signup-button" >Save</button>
					</form>
						
				</div>
				<button id="homii" class="submit-btn">Add different bank account</button>
				<form method="POST">
						<input required type="number" class="input-field inpu" placeholder="Amount" name="amt">
						<button type="submit" class="submit-btn" name="addbtn" >Add amount</button>
				</form>
					<?php
						 if(isset($_POST['addbtn'])){
						 	$amt=$_POST["amt"];
						  	$email=$_SESSION['email'];
						  	require 'dbconn.inc.php';
						  	if(mysqli_connect_error()){
						  		die("connect error");
						  	}else{
						  		$update="update wallet set wbal=wbal+? where cemail=?";
						  		$select="select * from wallet where cemail=?";

						  		$stmt=mysqli_stmt_init($conn);
						  		if(!mysqli_stmt_prepare($stmt,$select)){
						  			echo "my sql error1";
						  		}else{
						  			mysqli_stmt_bind_param($stmt,"s",$email);
						  			mysqli_stmt_execute($stmt);
						  			$resultc=mysqli_stmt_get_result($stmt);
						  			$values=mysqli_fetch_assoc($resultc);
						  			if(!$values["cardnum"]){
						  				echo '<script>alert("please add an account")</script>';
						  			}else{
						  				if(!mysqli_stmt_prepare($stmt,$update)){
							  				echo "my sql error";
							  			}else{
							  				mysqli_stmt_bind_param($stmt,"is",$amt,$email);
							  				mysqli_stmt_execute($stmt);
							  				// echo '<script type="text/javascript">' .
            	// 								'console.log(' . $amt . ');</script>';
							  				echo '<script>alert("balance updated successfully")</script>';
							  				echo "<script>location.href='wallet.php'</script>";
							  			}
						  			}
						  		}
						 	}
						 }
					?>

			</div>	
			
		</section>
	</body>
	<script type="text/javascript">
		var x=1;
		x=x+1;
		const but = () => {
			let c1=document.getElementById('ContactInfo1');
			let c2=document.getElementById('ContactInfo2');
			if(button.innerText=="Add different bank account"){
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
				button.innerText="Add different bank account";
			}

		}
		let button=document.getElementById('homii');
		button.addEventListener("click", but);
	</script>
</html>