<?php 
if(isset($_POST['sub-but'])){
	$mname=$_POST['mname'];
	$rating=$_POST['imdb'];
	$genre=$_POST['genre'];
	$mlink=$_POST['mlink'];
	$Director=$_POST['Director'];
	require 'dbconn.inc.php';
	$stmt=mysqli_stmt_init($conn);
	$query="INSERT INTO movie (mname, imdb, genre,mlink,Director) VALUES (?,?,?,?,?)";
	if(!mysqli_stmt_prepare($stmt,$query)){
	    echo "my sql error";
	}else{
		 mysqli_stmt_bind_param($stmt,"sssss",$mname,$rating,$genre,$mlink,$Director);
		mysqli_stmt_execute($stmt);
		echo "<script>alert('Movie entry suceessfull');</script>";
		// echo "<script>theatreentry,php;</script>";
		
		

	}
}






 ?>
<!DOCTYPE html>
<html>
<head>
	<title>movie entry</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="mname" placeholder="moviename">
		<input type="text" name="imdb" placeholder="rating">
		<input type="text" name="genre" placeholder="genre">
		<input type="text" name="mlink" placeholder="movielink">
		<input type="text" name="Director" placeholder="Director">
		<button type="submit" name='sub-but'>submit</button>
		

	</form>

</body>
</html>