
<?php
        session_start();

      


	
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
	<link rel="stylesheet" href="./style1.css">
	<link href='https://fonts.googleapis.com/css?family=Nanum Brush Script' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
	<!-- <style>
		@import rl('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
	</style> -->
	
	

</head>
<body>
	
	<header id="k1" style="height: 100%">

		<div class="main">
			<!-- <div class="logo">
				<img src="Revive.png">	
			</div> -->
			<div class="container">
				<div class="slideshow-container">
					<div class="mySlides fade">
					<div class="title ">
							<h1>Movieinn, The better way to ask for a ticket
is to approach our website.</h1>
						</div>
						<div class="button">
							<a href="https://www.youtube.com/watch?v=2bQ8090xrTA" class="btn">Watch Video</a>
							
					</div>
					</div>
					<?php
						require 'dbconn.inc.php';
						$select="select distinct genre from movie";
						$stmt=mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt,$select)){
							echo "my sqlww error";
						}else{
							mysqli_stmt_execute($stmt);
							$result=mysqli_stmt_get_result($stmt);
							$rowcount=mysqli_num_rows($result);
							$total=0;
							$count=0;
							$k=0;
							while($values=mysqli_fetch_assoc($result)){
								$k=$k+1;
						
					?>
					<div class="mySlides fade"> 
					   <div class="title ">
							<a href="<?php "#c".$k?>" class="linkim" style="text-decoration: none;"><h1><?php echo $values["genre"];?></h1></a>
						</div>
					</div>
					<?php
						}
					?>
					<?php
					}
					?>


					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>

				</div>

				
			</div>
			<ul>
				<li class="active"><a href="#">Home</a></li>
				<li><a href="About.php">About</a></li>
				<li><a href="myactivity.php">My Activity</a></li>
				<li><a href="wallet.php">Wallet</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li id="lo" style="display: none;"><a href="logout.php" name="logout">Log Out</a></li>
				<li id="li"><a href="index.php" name="login">Log In</a></li>

			</ul>

		</div>
		
	</header>
	
		<div id="k2" style="height:737.6px" > 
			
		</div>
		

		<?php
			
			$select="select distinct genre from movie";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$select)){
				echo "my sqlww error";
			}else{
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				$rowcount=mysqli_num_rows($result);
				$total=0;
				$count=0;
				$k=0;
				$selectc="select * from movie where genre=?";
				while($values=mysqli_fetch_assoc($result)){
					$k=$k+1;
					if(!mysqli_stmt_prepare($stmt,$selectc)){
						echo "my sqlww error";
					}else{
						mysqli_stmt_bind_param($stmt,"s",$values["genre"]);
						mysqli_stmt_execute($stmt);
						$resultc=mysqli_stmt_get_result($stmt);
						

					

						
		?>
					
	<div class="company" style="padding-top: 30px;">
		<div  class="compname" ><h1 id="cn" ><?php echo $values["genre"];?></h1></div>
		<div  class="subcompany">
			<?php while($valuesc=mysqli_fetch_assoc($resultc)){?>
			<div class="medicine">
				<div class="piccont">
				<img class="medpics" src="<?php echo $valuesc["mlink"];?>"></div>
				<p class="medname"><?php echo $valuesc["mname"];?> </p>				
				<p class="medname"><h1 id="p1" style="color: white;">IMDB - <?php echo $valuesc["imdb"];?></h1></p>
				<form id="formh" method="POST" action=<?php echo ($values["genre"] == "Upcoming attractions") ? "bookmark.php" :"movintermediate.php";?>>
					<button  type="submit"  class="button-box"><?php echo ($values["genre"] == "Upcoming attractions") ? "Bookmark" : "Book now";?></button>
					<input type="hidden" name="movid" value=<?php echo $valuesc["mid"];?>>
				</form>
				<br>				
			</div>
			<?php
				}
			?>

			
		</div>
		
	</div>

		<?php
					
				}
			}
		?>
		<?php
		}
		?>
		

<?php 
 if(isset($_SESSION['email'])){



 ?>	 

 <script type="text/javascript">
 		console.log("happy");
		 var lo = document.getElementById("lo");
		  var li = document.getElementById("li");
		  li.style.display="None";
		  lo.style.display="inline-block";
 	
 </script>


 <?php 

}

  ?>





	

	<script type="text/javascript">
console.log("happy");
		var slideIndex = 1;
		 var l1 = document.getElementById("k1");
		  var l2 = document.getElementById("k2");
		  // console.log(l1.style.height);
		  // console.log(l2.style.height);
		 
		  // console.log(l1.style.height);
		  // console.log(l2.style.height);
		showSlides(slideIndex);
		function plusSlides(n) {
  			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
  			showSlides(slideIndex = n);
		}

	function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		      slides[i].style.display = "none";  
		  }
		  slides[slideIndex-1].style.display = "block";  
		}

			const but = (param) => {
	
			// let c1=document.getElementById('subh');
			let c2=document.getElementById('formh');
			
			if(param.innerHTML=="Bookmark"){
				console.log(param.innerHTML);
				c2.action="google.com";

			}
			
		

		}
	
	</script>

</body>
</html>