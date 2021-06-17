<?php
if(isset($_POST['login-button'])){
	$email=$_POST["email"];
	$pwd=$_POST["pass"];
	$type;
	session_start();
	require 'dbconn.inc.php';

	    if(mysqli_connect_error()){
	        die("connect error");
	    }else{
	        $selectc="select * from user where cemail=? ";
	        $selects="select * from admin where semail=? ";
	        $stmt=mysqli_stmt_init($conn);
	        $stmt1=mysqli_stmt_init($conn);
	        //prepare a prepared statment
	        if(!mysqli_stmt_prepare($stmt,$selectc) or !mysqli_stmt_prepare($stmt1,$selects)){
	            echo "my sql error";
	        }else{
	            mysqli_stmt_bind_param($stmt,"s",$email);
	            mysqli_stmt_bind_param($stmt1,"s",$email);
	            mysqli_stmt_execute($stmt);
	            $resultc=mysqli_stmt_get_result($stmt);
	            $rowcountc=mysqli_num_rows($resultc);
	            if($rowcountc){
	            	$row=mysqli_fetch_assoc($resultc);
	            	if($row['pwd']==$pwd){
	            		$type="user";
	            		$_SESSION['email']=$email;
	            		$_SESSION['name']=$row['cname'];
	            		$_SESSION['type']=$type;
	            		$_SESSION['phno']=$row['phno'];
	            		$_SESSION['city']=$row['city'];
	            		$_SESSION['pincode']=$row['pincode'];
	            		$_SESSION['aadharnum']=$row['aadharnum'];
	            		
	            		header('Location: user.php');
	            		
	            	}else{
	            		
	            		echo '<script>alert("Incorrect password as user")</script>';
                        echo "<script>location.href='index.php'</script>";

	            	}
	            }else{
		            mysqli_stmt_execute($stmt1);
		            $results=mysqli_stmt_get_result($stmt1);
		            $rowcounts=mysqli_num_rows($results);
		            if($rowcounts){
		            	$row=mysqli_fetch_assoc($results);
	            		if($row['pwd']==$pwd){
	            			$type="admin";
	            			
	            			$_SESSION['email']=$email;
	            			$_SESSION['name']=$row['sname'];
	            			$_SESSION['phno']=$row['phno'];
	            			$_SESSION['type']=$type;
	            			$_SESSION['companyname']=$row['comname'];
	            			$_SESSION['city']=$row['city'];
	            			$_SESSION['pincode']=$row['pincode'];
	            			$_SESSION['aadharnum']=$row['aadharnum'];
	            			
	            			header('Location: admin.php');
	            		}else{
	            			echo '<script>alert("Incorrect password as admin")</script>';
                        	echo "<script>location.href='index.php'</script>";

	            		}
		            }else{
		            	echo '<script>alert("Please Register")</script>';
                        echo "<script>location.href='index.php'</script>";
		            }
	           }



	        }
	    $stmt->close();
		$stmt1->close();
	        mysqli_close($conn);
	    }
}

?>