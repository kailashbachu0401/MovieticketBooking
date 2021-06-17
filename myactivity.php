
<?php
        session_start();

      $cemail=$_SESSION['email'];

	
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
	
	<header id="k2" style="height: 100%">

		<div class="main">
			<!-- <div class="logo">
				<img src="Revive.png">	
			</div> -->
			<div class="container">
				<div class="slideshow-container">
					<div class="mySlides fade">
					<div class="title ">
							<h1>MY ACTIVITY   :-)</h1>
						</div>
						<div class="button">
							<a href="https://www.youtube.com/watch?v=2bQ8090xrTA" class="btn">Watch Video</a>
							
					</div>
					</div>
				
					<div class="mySlides fade"> 
					   <div class="title ">
							<a href="#bk" class="linkim" style="text-decoration: none;"><h1>Bookmarks</h1></a>
						</div>
					</div>


					<div class="mySlides fade"> 
					   <div class="title ">
							<a href="#bh" class="linkim" style="text-decoration: none;"><h1>Booking History</h1></a>
						</div>
					</div>



										<div class="mySlides fade"> 
					   <div class="title ">
							<a href="#fbm" class="linkim" style="text-decoration: none;"><h1>Future booked movies</h1></a>
						</div>
					</div>
				


					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>

				</div>

				
			</div>
			<ul>
				<li class="active"><a href="user.php">Home</a></li>
				<li><a href="About.php">About</a></li>
				
				<li><a href="wallet.php">Wallet</a></li>
				<li><a href="profile.php">Profile</a></li>
		<!-- 		<li id="lo" style="display: none;"><a href="logout.php" name="logout">Log Out</a></li>
				<li id="li"><a href="index.php" name="login">Log In</a></li> -->

			</ul>

		</div>
		
	</header>
	
		<div id="k2" style="height:737.6px" > 
			
		</div>
		

				 
	
					
	<!-- <div class="company" style="padding-top: 30px;">
		<div id="bk" class="compname" ><h1 id="cn" >Bookmarked</h1></div>
		<div  class="subcompany"> -->
		<?php 
				

				$cemail=$_SESSION['email'];
				$query="select * from mbook where cemail=?";
				$query1="select * from movie where mid=?";
				require 'dbconn.inc.php';
				$stmt=mysqli_stmt_init($conn);
				 if(!mysqli_stmt_prepare($stmt,$query)){
				                echo "my sql error";
				 }else{
				 	
				 	 mysqli_stmt_bind_param($stmt,"s",$cemail);
					mysqli_stmt_execute($stmt);
					$result=mysqli_stmt_get_result($stmt);
        				$rowcount=mysqli_num_rows($result);
        				if($rowcount>0){


        					?>



        					<div class="company" style="padding-top: 30px;">
		<div id="bk" class="compname" ><h1 id="cn" >Bookmarks</h1></div>
		<div  class="subcompany">
			<?php








        				}
        				while($row=mysqli_fetch_assoc($result)){

        						if(!mysqli_stmt_prepare($stmt,$query1)){
				                echo "my sql error";
								 }else{
								 	
								 	 mysqli_stmt_bind_param($stmt,"i",$row['mid']);
									mysqli_stmt_execute($stmt);
									$resultc=mysqli_stmt_get_result($stmt);
									$valuesc=mysqli_fetch_assoc($resultc);
				        			

			

				?>
			<div class="medicine">
				<div class="piccont">
				<img class="medpics" src="<?php echo $valuesc["mlink"];?>"></div>
				<p class="medname"><?php echo $valuesc["mname"];?> </p>				
				<p class="moviename"><h1 id="p1" style="color: white;">IMDB - <?php echo $valuesc["imdb"];?></h1></p>
				<form id="formh" method="POST" action="unbookmark.php">
					<button  type="submit"  class="button-box">UnBookmark</button>
					<input type="hidden" name="movid" value=<?php echo $valuesc["mid"];?>>
				</form>
				<br>				
			</div>
	<?php  


}
}
}
				 

				 ?>

	<!-- 	<div class="company" style="padding-top: 30px;">
		<div  id="bh" class="compname" ><h1 id="cn" >Booked Attractions</h1></div>
		<div  class="subcompany"> -->
		<?php 
				

				$cemail=$_SESSION['email'];
				$query="select * from mint where cemail=?";
				$query1="select * from movie where mid=?";
				$query2="select * from theatre where tid=?";
				require 'dbconn.inc.php';
				$stmt=mysqli_stmt_init($conn);
				$stmt1=mysqli_stmt_init($conn);
				 if(!mysqli_stmt_prepare($stmt,$query)){
				                echo "my sql error";
				 }else{
				 	
				 	 mysqli_stmt_bind_param($stmt,"s",$cemail);
					mysqli_stmt_execute($stmt);
					$result=mysqli_stmt_get_result($stmt);
        				$rowcount=mysqli_num_rows($result);


        						if($rowcount>0){


        					?>



        	<div class="company" style="padding-top: 30px;">
		<div  id="bh" class="compname" ><h1 id="cn" >My Bookings</h1></div>
		<div  class="subcompany">
			<?php








        				}
        				// echo "<script>alert('Pdfsdts');</script>";
        				while($row=mysqli_fetch_assoc($result)){

        						if(!mysqli_stmt_prepare($stmt,$query1) or !mysqli_stmt_prepare($stmt1,$query2) ){
				                echo "my sql error";
								 }else{
								 	// echo "<script>alert('Pdfsdts');</script>";
								 	
								 	mysqli_stmt_bind_param($stmt,"i",$row['mid']);
									mysqli_stmt_execute($stmt);
									$resultc=mysqli_stmt_get_result($stmt);
									$valuesc=mysqli_fetch_assoc($resultc);


									mysqli_stmt_bind_param($stmt1,"i",$row['tid']);
									mysqli_stmt_execute($stmt1);
									$resultt=mysqli_stmt_get_result($stmt1);
									$valuest=mysqli_fetch_assoc($resultt);
				        			

			

				?>
			<div class="medicine">
				<div class="piccont">
				<img class="medpics" src="<?php echo $valuesc["mlink"];?>"></div>
				<p class="medname"><?php echo $valuesc["mname"];?> </p>				
				<p class="moviename"><h1 id="p1" style="color: white;">Rating- <?php echo $valuesc["imdb"];?></h1></p>
				<p class="moviename">Theatre Name:<?php echo $valuest["tname"];?> </p>	
				<p class="moviename">Seats booked:<?php echo $row["sebo"];?> </p>
				<p class="moviename">Date Booked:<?php echo $row["dob"];?> </p>
				
				<br>				
			</div>
	<?php  


}
}
}
				 

				 ?>


		<!-- <div class="company" style="padding-top: 30px;">
		<div  id="fbm" class="compname" ><h1 id="cn" >Future Booked Movies</h1></div>
		<div  class="subcompany"> -->
		<?php 
				

				$cemail=$_SESSION['email'];
				$query="select * from mint where cemail=?";
				$query1="select * from movie where mid=?";
				$query2="select * from theatre where tid=?";
				require 'dbconn.inc.php';
				$stmt=mysqli_stmt_init($conn);
				$stmt1=mysqli_stmt_init($conn);
				 if(!mysqli_stmt_prepare($stmt,$query)){
				                echo "my sql error";
				 }else{
				 	
				 	 mysqli_stmt_bind_param($stmt,"s",$cemail);
					mysqli_stmt_execute($stmt);
					$result=mysqli_stmt_get_result($stmt);
        				$rowcount=mysqli_num_rows($result);



        						if($rowcount>0){


        					?>



        	<div class="company" style="padding-top: 30px;">
		<div  id="fbm" class="compname" ><h1 id="cn" >Upcoming Bookings</h1></div>
		<div  class="subcompany">
			<?php








        				}
        				
        				// echo date("Y/m/d");
        				
        				while($row=mysqli_fetch_assoc($result) and $row['dob']>= date("Y-m-d")){
        					// echo $row['dob'];

        						if(!mysqli_stmt_prepare($stmt,$query1) or !mysqli_stmt_prepare($stmt1,$query2) ){
				                echo "my sql error";
								 }else{
								 	
								 	
								 	mysqli_stmt_bind_param($stmt,"i",$row['mid']);
									mysqli_stmt_execute($stmt);
									$resultc=mysqli_stmt_get_result($stmt);
									$valuesc=mysqli_fetch_assoc($resultc);


									mysqli_stmt_bind_param($stmt1,"i",$row['tid']);
									mysqli_stmt_execute($stmt1);
									$resultt=mysqli_stmt_get_result($stmt1);
									$valuest=mysqli_fetch_assoc($resultt);
				        			

			

				?>
			<div class="medicine">
				<div class="piccont">
				<img class="medpics" src="<?php echo $valuesc["mlink"];?>"></div>
				<p class="medname"><?php echo $valuesc["mname"];?> </p>				
				<p class="moviename"><h1 id="p1" style="color: white;">Rating- <?php echo $valuesc["imdb"];?></h1></p>
				<p class="moviename">Theatre Name:<?php echo $valuest["tname"];?> </p>	
				<p class="moviename">Seats booked:<?php echo $row["sebo"];?> </p>
				<p class="moviename">Date Booked:<?php echo $row["dob"];?> </p>
				
				<br>				
			</div>
	<?php  


}
}
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