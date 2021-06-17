<!DOCTYPE html>
 <html>
 <head>
 	<title>Ticket Page</title>
 	<link rel="stylesheet/scss" type="text/css" href="booknow.scss">
 </head>
 
 </html>

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
 	$fin=$mid.$tid.$mshow.$cemail.$dob.$str;
 	echo $fin;





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
			

<div class="ticket">
	<div class="holes-top"></div>
	<div class="title">
		<p class="cinema">ODEON CINEMA PRESENTS</p>
		<p class="movie-title">ONLY GOD FORGIVES</p>
	</div>
	<div class="poster">
		<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/25240/only-god-forgives.jpg" alt="Movie: Only God Forgives" />
	</div>
	<div class="info">
	<table>
		<tr>
			<th>SCREEN</th>
			<th>ROW</th>
			<th>SEAT</th>
		</tr>
		<tr>
			<td class="bigger">18</td>
			<td class="bigger">H</td>
			<td class="bigger">24</td>
		</tr>
	</table>
	<table>
		<tr>
			<th>PRICE</th>
			<th>DATE</th>
			<th>TIME</th>
		</tr>
		<tr>
			<td>$12.00</td>
			<td>1/13/17</td>
			<td>19:30</td>
		</tr>
	</table>
	</div>
	<div class="holes-lower"></div>
	<div class="serial">
		<table class="barcode"><tr></tr></table>
		<table class="numbers">
			<tr>
				<td>9</td>
				<td>1</td>
				<td>7</td>
				<td>3</td>
				<td>7</td>
				<td>5</td>
				<td>4</td>
				<td>4</td>
				<td>4</td>
				<td>5</td>
				<td>4</td>
				<td>1</td>
				<td>4</td>
				<td>7</td>
				<td>8</td>
				<td>7</td>
				<td>3</td>
				<td>4</td>
				<td>1</td>
				<td>4</td>
				<td>5</td>
				<td>2</td>
			</tr>
		</table>
	</div>
</div>
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
