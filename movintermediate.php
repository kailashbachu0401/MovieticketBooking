 
<?php 
$mid=$_POST['movid']; 


 

	

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Thetares</title>
	<link rel="stylesheet" type="text/css" href="movintermediate.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	
</script>

<body>

<div class="total">

	<div class="content">
			<?php	
			require 'dbconn.inc.php';
			$select="select * from movie where mid=?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$select) ){
				echo "my sqlww error";
			}else{
				mysqli_stmt_bind_param($stmt,"i",$mid);
				mysqli_stmt_execute($stmt);
				$resultc=mysqli_stmt_get_result($stmt);	
				($valuesc=mysqli_fetch_assoc($resultc));	
				$mlink=$valuesc['mlink'];	
			 	?>
			 	<div class="outer">
					<img class="image" src="<?php echo $valuesc["mlink"];?>">
					<p class="moviename"><b>Movie</b>  :  <?php echo $valuesc["mname"];?> </p>				
					<p class="moviename"><b>Rating </b>:   <?php echo $valuesc["imdb"];?></p>
					<p class="moviename"><b>Director </b>:  <?php echo $valuesc["Director"];?></p>
				</div>			
			<?php
				
			}
			?>
	</div>


	<div class="thshow">


		<?php  
			require 'dbconn.inc.php';
			$select="select * from theatre where mid=?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$select) ){
				echo "my sqlww error";
			}else{
				mysqli_stmt_bind_param($stmt,"i",$mid);
				mysqli_stmt_execute($stmt);
				$resultc=mysqli_stmt_get_result($stmt);	
				while($valuesc=mysqli_fetch_assoc($resultc)){



		?>
		
		<div class="singleshow">
			<div class="theatre-title">
				<p class="name"><b><?php echo $valuesc['tname']; ?></b></p>
				<p class="city"><b><?php echo $valuesc['tcity']; ?></b></p>
			</div>
			<div class="timings">
				<form class="fm" action="seatlayout.php" method="POST">
						<div class="butt">
						<button type="submit" class="submit-btn">11:30AM-02:00PM</button>
						<input type="hidden" name="tid" value=<?php echo $valuesc["tid"];?>>
						<input type="hidden" name="mid" value=<?php echo $mid?>>
						<input type="hidden" name="mshow" value="Morning">
						<input class="ko" type="hidden" name="dob"  >
						<input type="hidden" name="mlink" value=<?php echo $mlink?>>
						</div>
				</form>


				<form class="fm" action="seatlayout.php" method="POST">
				<div class="butt">
				<button type="submit" class="submit-btn">02:30PM-06:00PM</button>
				<input type="hidden" name="tid" value=<?php echo $valuesc["tid"];?>>
						<input type="hidden" name="mid" value=<?php echo $mid?>>
						<input type="hidden" name="mshow" value="Noon">
						<input class="ko" type="hidden" name="dob">
						<input type="hidden" name="mlink" value=<?php echo $mlink?>>
				</div>
			</form>


			<form class="fm" action="seatlayout.php" method="POST">
				<div class="butt">
				<button type="submit" class="submit-btn">6:00PM-09:00PM</button>
				<input type="hidden" name="tid" value=<?php echo $valuesc["tid"];?>>
						<input type="hidden" name="mid" value=<?php echo $mid?>>
						<input type="hidden" name="mshow" value="FirstShow">
						<input class="ko" type="hidden" name="dob" >
						<input type="hidden" name="mlink" value=<?php echo $mlink?>>
				</div>
			</form>

			<form class="fm" action="seatlayout.php" method="POST">
				<div class="butt">
				<button type="submit" class="submit-btn">09:30PM-12:00PM</button>
				<input type="hidden" name="tid" value=<?php echo $valuesc["tid"];?>>
						<input type="hidden" name="mid" value=<?php echo $mid?>>
						<input type="hidden" name="mshow" value="SecondShow">
						<input class="ko" type="hidden" name="dob" >
						<input type="hidden" name="mlink" value=<?php echo $mlink?>>
				</div>
			</form>

			</div>
				</div>








			<?php 

			}


		}
			?>
			
	



	</div>

</div>
<div class="dt">
	
	<label class="moviename" for="sday"><b>Select Date:</b></label>
  <input type="date" id="sday" name="dob" placeholder="selectdate" oninput="but()" >
</div>
  
  



</body>
<script type="text/javascript">
	
	const but = () => {
		console.log("ro");
			let c1=document.getElementById('sday');
			let c2=document.getElementsByClassName('ko');
			var i;
			
			for (i = 0; i < c2.length; i++) {
				
			  c2[i].value = c1.value;
			 

			}
		

		}

</script>








</html>


