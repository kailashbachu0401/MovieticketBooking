

<?php
session_start();
include 'phpqrcode/qrlib.php';
if(isset($_POST['book-button']) and $_POST['hid1']!="var_value"){
	$mid=$_POST['mid']; 
	$tid=$_POST['tid']; 
	$mshow=$_POST['mshow']; 
	$cemail=$_SESSION['email'];
	$dob=$_POST['dob']; 
 	$str=$_POST['hid1'];
 	$cost=$_POST['hid2'];
 	$mlink=$_POST['mlink'];
 	$str1 = str_replace(' ', '_', $str);
 	$fin=$mid."-".$tid."-".$str1."-".$mshow."-".$cemail."-".$dob;
 	$url="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F". $fin."%2F&choe=UTF-8";
 	$img="qr.png";
 	file_put_contents($img, file_get_contents($url));
 	// echo $fin;





	require 'dbconn.inc.php';
	$stmt=mysqli_stmt_init($conn);

	$update1="update wallet set  wbal=wbal-? where cemail=? and wbal>=?";
	 if(!mysqli_stmt_prepare($stmt,$update1)){
                echo "my sql error";
    }else{
        mysqli_stmt_bind_param($stmt,"isi",$cost,$cemail,$cost);
      
        mysqli_stmt_execute($stmt);
       

    }
    if(mysqli_affected_rows($conn) >0 ){



    		$stmt=mysqli_stmt_init($conn);






			        	$select="select * from movie where mid=?";
						$selectt="select * from theatre where tid=?";
						$stmt=mysqli_stmt_init($conn);
						$stmt1=mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt,$select) or !mysqli_stmt_prepare($stmt1,$selectt)){
							echo "my sqlww error";
						}else{
							mysqli_stmt_bind_param($stmt,"i",$mid);
							mysqli_stmt_execute($stmt);
							$resultc=mysqli_stmt_get_result($stmt);
							mysqli_stmt_bind_param($stmt1,"i",$tid);
							mysqli_stmt_execute($stmt1);
							$resultt=mysqli_stmt_get_result($stmt1);
							($valuesc=mysqli_fetch_assoc($resultc));
							($valuest=mysqli_fetch_assoc($resultt));





 	?>


<!DOCTYPE html>
 <html>
 <head>
 	<title>Ticket Page</title>
 	<link rel="stylesheet" type="text/css" href="booknow.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body style="">
 	<div class="qr">
 		<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F <?php echo $fin;?>%2F&choe=UTF-8" title="Link to Google.com" />

 	</div>
 	
 	<a href="qr.png" download>
		 		<div class="qr1">
		 		<button ><i class="fa fa-download"></i><b>Download Ticket</b></button>

		 		</div>
 
		</a>
		<a href="user.php">
		<div class="qr2">
		 		<button href="user.php"><b>Home</b></button>

		 		</div>
		 		</a>

 		<div class="outer1">
			 	<div class="outer">
					<img class="image" src="<?php echo $valuesc['mlink'];?>">
				
					<p class="moviename"><b>Movie</b>  :  <?php echo $valuesc["mname"];?> </p>		
						
					<p class="moviename"><b>Rating </b>:   <?php echo $valuesc["imdb"];?></p>

					<p class="moviename"><b>Director </b>: <?php echo $valuesc["Director"];?></p>

					<p class="moviename"><b>Theatre </b>: <?php echo $valuest["tname"];?></p>
					<p class="moviename"><b>Theatre Address </b>: <?php echo $valuest["tadd"];?></p>

					<p class="moviename"><b>Show </b>:  <?php echo $mshow;?></p>
						<p class="moviename"><b>Date</b>: <?php echo $dob;?></p>
	
					<p class="moviename"><b>Cost </b>:  <?php echo $cost;?></p>
					<p class="moviename"><b>Seats Booked </b>:  <?php echo $str;?></p>
				</div>
				</div>
 
 </body>
 </html>


			 	
 	
		
			<?php
				
			}
			?>



    <?php	








				$selectc="select * from mint where mid=? and tid=? and mshow=? and dob=? and cemail=?";
				$query="INSERT INTO mint (mid, tid, mshow,dob,sebo,cemail) VALUES (?,?,?,?,?,?)";
				$update="update mint set  sebo=? where mid=? and tid=? and mshow=? and dob=? and cemail=?";
				 if(!mysqli_stmt_prepare($stmt,$selectc)){
			                echo "my sql error";
			    }else{
			        mysqli_stmt_bind_param($stmt,"iisss",$mid,$tid,$mshow,$dob,$cemail);
			      
			        mysqli_stmt_execute($stmt);
			        $resultc=mysqli_stmt_get_result($stmt);
			        $rowcountc=mysqli_num_rows($resultc);
			        if($rowcountc==0){


						if(!mysqli_stmt_prepare($stmt,$query)){
						    echo "my sql error";
						}else{
							 mysqli_stmt_bind_param($stmt,"iissss",$mid,$tid,$mshow,$dob,$str,$cemail);
							mysqli_stmt_execute($stmt);
							
							echo "<script>alert('Booked Successful');</script>";







							// echo "<script>alert('Booked Successful');</script>";
							// echo "<script>location.href='user.php'</script>";
						}
					}else{
						$valuesc=mysqli_fetch_assoc($resultc);
						$a=$valuesc['sebo'];
						$str=$str." ".$a;
						if(!mysqli_stmt_prepare($stmt,$update)){
						    echo "my sql error";
						}else{
							 mysqli_stmt_bind_param($stmt,"siisss",$str,$mid,$tid,$mshow,$dob,$cemail);
							mysqli_stmt_execute($stmt);
							echo "<script>alert('Booked Successful');</script>";
							// echo "<script>alert('Booked Successful');</script>";
							// echo "<script>location.href='user.php'</script>";
						}


					}

				}
    }else{
    	 echo "<script>alert('No Enough Balance Directing to Wallet page');</script>";
    	 echo "<script>location.href='wallet.php'</script>";
    }









}else{
echo "<script>alert('Please select seats');</script>";
echo "<script>window.history.back();</script>";
}




	


 ?>
