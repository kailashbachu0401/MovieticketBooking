<?php 
session_start();
$mid=$_POST['movid']; 

$cemail=$_SESSION['email'];
$query="INSERT INTO mbook (mid,cemail,status) VALUES (?,?,?)";
require 'dbconn.inc.php';
$stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$query)){
                echo "my sql error";
 }else{
 	$a="Bookmarked";
 	 mysqli_stmt_bind_param($stmt,"iss",$mid,$cemail,$a);
	mysqli_stmt_execute($stmt);
	echo "<script>alert('Bookmarked Successful');</script>";
	echo "<script>location.href='user.php'</script>";





 }




	

 ?>