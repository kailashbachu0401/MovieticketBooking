<?php 
if(isset($_POST['sub-but'])){
	$mname=$_POST['tname'];
	$rating=$_POST['tcity'];
	$genre=$_POST['tadd'];
	$mlink=$_POST['mid'];
	
	require 'dbconn.inc.php';
	$stmt=mysqli_stmt_init($conn);
	$query="INSERT INTO theatre (tname, tcity, tadd,mid) VALUES (?,?,?,?)";
	if(!mysqli_stmt_prepare($stmt,$query)){
	    echo "my sql error";
	}else{
		 mysqli_stmt_bind_param($stmt,"sssi",$mname,$rating,$genre,$mlink);
		mysqli_stmt_execute($stmt);
		echo "<script>alert('Theatre entry suceessfull');</script>";
	// echo "<script>theatreentry.php;</script>";
	}
}






 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Theatre entry</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="tname" placeholder="tname">
		<input type="text" name="tcity" placeholder="tcity">
		<input type="text" name="tadd" placeholder="tadd">
		
		<input type="text" name="mid" placeholder="mid">
		<button type="submit" name='sub-but'>submit</button>
		

	</form>

</body>
</html>