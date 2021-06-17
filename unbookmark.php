 <?php 
session_start();
$mid=$_POST['movid']; 

$cemail=$_SESSION['email'];
$query="delete from mbook where mid=? and cemail=?";
require 'dbconn.inc.php';
$stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$query)){
                echo "my sql error";
 }else{
 	$a="Bookmarked";
 	 mysqli_stmt_bind_param($stmt,"is",$mid,$cemail);
	mysqli_stmt_execute($stmt);
	echo "<script>alert('UnBookmarked Successful');</script>";
	echo "<script>location.href='myactivity.php'</script>";





 }




	

 ?>