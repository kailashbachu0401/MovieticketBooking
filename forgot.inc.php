<?php
if(isset($_POST['forgot'])){
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$cpass=$_POST["cpass"];
	require 'dbconn.inc.php';
	if($pass!=$cpass){
		echo '<script>alert("password and confirm password does not match, please try again")</script>';
        echo "<script>location.href='index.php'</script>";
	}else{
		$selectc="select * from user where cemail=?";
		$update="update user set pwd=? where cemail=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$selectc)){
                echo "my sql error";
        }else{
        	mysqli_stmt_bind_param($stmt,"s",$email); 
            mysqli_stmt_execute($stmt);
            $resultc=mysqli_stmt_get_result($stmt);
                $rowcountc=mysqli_num_rows($resultc);
            if($rowcountc!=0){
            	if(!mysqli_stmt_prepare($stmt,$update)){
            		echo "my sql error";
            	}else{
            		mysqli_stmt_bind_param($stmt,"ss",$pass,$email);
            		mysqli_stmt_execute($stmt);
            		echo '<script>alert("password updated successfully")</script>';
            		echo "<script>location.href='index.php'</script>";
            	}
            }else{
            	echo '<script>alert("Account doesnot exist")</script>';
        		echo "<script>location.href='index.php'</script>";
            }
        }
		
	}
}
$stmt->close();
$conn->close();

?>


