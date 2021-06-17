
<?php 
session_start();
$mid=$_POST['mid']; 
$tid=$_POST['tid']; 
$mshow=$_POST['mshow']; 
$cemail=$_SESSION['email'];
$dob=$_POST['dob']; 
date_default_timezone_set('Asia/Kolkata'); 
// $date1=date_create($dob);
$tday=date("Y-m-d");
$ttime=date("h:i:sa");
$thres="";
$mlink=$_POST['mlink'];
if($mshow=="Morning"){
	$thres="11:30am";

}else if($mshow=="Noon"){
	$thres="02:30pm";
}else if($mshow=="FirstShow"){
	$thres="06:30pm";
}else if($mshow=="SecondShow"){
	$thres="09:30pm";
}

if($dob==""){
 		echo "<script>alert('Please select Date');</script>";
	echo "<script>window.history.back();</script>";


 	}else if($dob==date("Y-m-d") and (strtotime($thres)-strtotime(date("h:ia")))<0){
 		 			echo "<script>alert('Wrong Time Selected');</script>";
	echo "<script>window.history.back();</script>";
 	}else if($dob<date("Y-m-d") or ceil(abs(strtotime($dob)-strtotime(date("Y-m-d")))/86400)>6){
 			echo "<script>alert('Wrong Date Selected');</script>";
	echo "<script>window.history.back();</script>";

 	}






	

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Seat Layout</title>
	<link rel="stylesheet" type="text/css" href="seatlayout.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	

	data=[];
	str="";
	for (var i = 99; i >= 0; i--) {
		data[i]=0;
		// console.log(data[i]);
	}
</script>

<body>
	<div class="screen"><h1>Screen This Way</h1>

	</div>
	<div class="flex-cont">
	<div class="seatcont">
		
  
				  <div class="cinema-seats-left">
						    <div class="cinema-row row-1">
						      <div id="1" class="seat l"></div>
						      <div  id="2" class="seat l"></div>
						      <div id="3" class="seat l"></div>
						      <div  id="4" class="seat l"></div>
						      <div  id="5" class="seat l"></div>
						      <div id="6" class="seat l"></div>
						      <div  id="7" class="seat l"></div>
						    </div>
						    <div class="cinema-row row-1">
						      <div   id="15" class="seat l"></div>
						      <div  id="16" class="seat l"></div>
						      <div  id="17" class="seat l"></div>
						      <div  id="18" class="seat l"></div>
						      <div  id="19" class="seat l"></div>
						      <div  id="20" class="seat l"></div>
						      <div  id="21" class="seat l"></div>
						    </div>			
						    <div class="cinema-row row-1">
						      <div id="29" class="seat l"></div>
						      <div id="30" class="seat l"></div>
						      <div id="31" class="seat l"></div>
						      <div id="32" class="seat l"></div>
						      <div id="33" class="seat l"></div>
						      <div id="34" class="seat l"></div>
						      <div id="35" class="seat l"></div>
						    </div>	

						    <div class="cinema-row row-1">
						      <div id="43" class="seat l"></div>
						      <div id="44" class="seat l"></div>
						      <div id="45" class="seat l"></div>
						      <div id="46" class="seat l"></div>
						      <div id="47" class="seat l"></div>
						      <div id="48" class="seat l"></div>
						      <div id="49" class="seat l"></div>
						    </div>	
						    <div class="cinema-row row-1">
						      <div id="57" class="seat l"></div>
						      <div id="58" class="seat l"></div>
						      <div id="59" class="seat l"></div>
						      <div id="60" class="seat l"></div>
						      <div id="61" class="seat l"></div>
						      <div id="62" class="seat l"></div>
						      <div id="63" class="seat l"></div>
						    </div>	
						    <div class="cinema-row row-1">
						      <div id="71" class="seat l"></div>
						      <div id="72" class="seat l"></div>
						      <div id="73" class="seat l"></div>
						      <div id="74" class="seat l"></div>
						      <div id="75" class="seat l"></div>
						      <div id="76" class="seat l"></div>
						      <div id="77" class="seat l"></div>
						    </div>

						   					    						    						    						    		

				  </div>
			<div class="cinema-seats-right">
							<div class="cinema-row row-1">
							<div id="8" class="seat r"></div>
							<div id="9" class="seat r"></div>
							<div id="10" id="8" class="seat r"></div>
							<div id="11" class="seat r"></div>
							<div id="12" class="seat r"></div>
							<div id="13" class="seat r"></div>
							<div id="14" class="seat r"></div>
							</div>

							<div class="cinema-row row-2">
							<div id="22" class="seat r"></div>
							<div id="23" class="seat r"></div>
							<div id="24" id="8" class="seat r"></div>
							<div id="25" class="seat r"></div>
							<div id="26" class="seat r"></div>
							<div id="27" class="seat r"></div>
							<div id="28" class="seat r"></div>
							</div>


							<div class="cinema-row row-2">
							<div id="36" class="seat r"></div>
							<div id="37" class="seat r"></div>
							<div id="38" id="8" class="seat r"></div>
							<div id="39" class="seat r"></div>
							<div id="40" class="seat r"></div>
							<div id="41" class="seat r"></div>
							<div id="42" class="seat r"></div>
							</div>


							<div class="cinema-row row-2">
							<div id="50" class="seat r"></div>
							<div id="51" class="seat r"></div>
							<div id="52" id="8" class="seat r"></div>
							<div id="53" class="seat r"></div>
							<div id="54" class="seat r"></div>
							<div id="55" class="seat r"></div>
							<div id="56" class="seat r"></div>
							</div>


							<div class="cinema-row row-2">
							<div id="64" class="seat r"></div>
							<div id="65" class="seat r"></div>
							<div id="66" id="8" class="seat r"></div>
							<div id="67" class="seat r"></div>
							<div id="68" class="seat r"></div>
							<div id="69" class="seat r"></div>
							<div id="70" class="seat r"></div>
							</div>


							<div class="cinema-row row-2">
							<div id="78" class="seat r"></div>
							<div id="79" class="seat r"></div>
							<div id="80" id="8" class="seat r"></div>
							<div id="81" class="seat r"></div>
							<div id="82" class="seat r"></div>
							<div id="83" class="seat r"></div>
							<div id="84" class="seat r"></div>
							</div>





				</div>
			


				  
				  
		



	</div>
	<div class="middle"></div>

	<div class="content">
			<?php
			
			require 'dbconn.inc.php';
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
				($valuest=mysqli_fetch_assoc($resultt))
			 	
			 	?>
			 	<div class="outer">
					<img class="image" src="<?php echo $valuesc["mlink"];?>">
				
					<p class="moviename"><b>Movie</b>  :  <?php echo $valuesc["mname"];?> </p>		
						
					<p class="moviename"><b>Rating </b>:   <?php echo $valuesc["imdb"];?></p>

					<p class="moviename"><b>Director </b>:  <?php echo $valuesc["Director"];?></p>

					<p class="moviename"><b>Theatre </b>: <?php echo $valuest["tname"];?></p>

					<p class="moviename"><b>Show </b>:  <?php echo $mshow;?></p>
				</div>
				</div>
				<br>
				<div class="last"></div>				
			</div>
			<?php
				
			}
			?>
		



	</div>


</div>
<div class="lastrow">
	<div id="85"class="seat l"></div>
	<div id="86"class="seat l"></div>					
	<div id="87"class="seat l"></div>
	<div id="88"class="seat l"></div>
	<div id="89"class="seat l"></div>					  
	<div id="90"class="seat l"></div>
	<div id="91"class="seat l"></div>
	<div id="92"class="seat ml"></div>


						      <div id="93" class="seat mr"></div>
						      <div id="94" class="seat r"></div>
						      <div id="95" class="seat r"></div>
						      <div id="96" class="seat r"></div>
						      <div id="97" class="seat r"></div>
						      <div id="98" class="seat r"></div>
						      <div id="99" class="seat r"></div>
						      <div id="100" class="seat r"></div>
</div> 


<div class="bsno">
	<span class="moviename"><b>Selected Seats</b>:  </span>
	<div id="sb1"></div><br>
	<span class="moviename "><b>Total Price </b>:  </span>
	<div id="sb2"></div>
	
		
	


</div>
<form class="form1"  action="booknow.inc.php" method="POST">
<button id="bookbutton" name="book-button"  class="buttonfx angleindouble" type="submit">Book  Now</button>
<input id="inp" type="hidden" name="hid1" value="var_value">
<input id="inp1" type="hidden" name="hid2" value="cost">
				<input type="hidden" name="tid" value=<?php echo $tid?>>
						<input type="hidden" name="mid" value=<?php echo $mid?>>
						<input type="hidden" name="mshow" value=<?php echo $mshow?>>
						<input type="hidden" name="dob" value=<?php echo $dob?>>
						<input type="hidden" name="mlink" value=<?php echo $mlink?>>
</form>

<!-- <button class="buttonfx slideleft">Slide Left</button> -->


<div class="flexoo">
					<div class="sh1">
						   <div id="101" class="seatk r a"></div>
						   <p class="moviename1"><b>Available Seats</b></p>

					</div>

					<div class="sh1">
						<div id="101" class="activ r a"></div>
						<p class="moviename1"><b>Seats Selected </b></p>

					</div>

					<div class="sh1">
						<div id="101" class="bookedseats r a"></div>
						<p  class="moviename1"><b>Booked Seats</b></p>
						

					</div>
</div>











</body>


<?php


require 'dbconn.inc.php';
if(mysqli_connect_error()){
	die("connect error");
 }else{
 	$select="select * from mint where mid=? and tid=? and mshow=? and dob=? ";

	        $stmt=mysqli_stmt_init($conn);

	        if(!mysqli_stmt_prepare($stmt,$select)){
	            echo "my sql error";
	        }else{
	        	    mysqli_stmt_bind_param($stmt,"iiss",$mid,$tid,$mshow,$dob);
	        	     mysqli_stmt_execute($stmt);
	        	     $result=mysqli_stmt_get_result($stmt);
	        	     while($row=mysqli_fetch_assoc($result)){
			        	     $seatstr=$row['sebo'];
			        	     $arrayi=explode(" ",$seatstr);
			        	     for($i=0;$i<count($arrayi);$i++){
			        	     
?>

<script type="text/javascript">
	 console.log("fnri");
	 var val = "<?php echo $arrayi[$i]; ?>";
	 var seatno= document.getElementById(val);
	 var k=seatno.className;
	 seatno.className="bookedseats"+" "+k.charAt(k.length-1);
	


</script>



<?php  

			        	     }


	        	 }

	        }

}


 ?>


<script type="text/javascript">
	
$('.seat').on('click', function() {
	var e=data[this.id];
	if(data[this.id]==1){
		console.log(this.id);
		// $(this).toggleClass('activ');
  data[this.id]=data[this.id]^1;

	}
	// console.log(this.className);
 
 //  console.log(this.className);
  var hid= document.getElementById("inp");
   var hid1= document.getElementById("inp1");
  var seatn= document.getElementById("sb1");
  var seatn2= document.getElementById("sb2");
   var count=0;
  for (var i = 1; i<=100;i++) {
  	if(data[i]){
  		count=count+1;
	}
  	
  }
  if(count<10){
  	 $(this).toggleClass('activ');
  	 if(e!=1){
  	 	data[this.id]=data[this.id]^1;

  	 }
     seatn.innerHTML="";
   seatn2.innerHTML="0";
   str="";
   
  for (var i = 1; i<=100;i++) {
  	if(data[i]){

  		 seatn.innerHTML += '<div id="sb">'+i+"</div>";
  		 str=str+i+" ";
  		 seatn2.innerHTML = Number(seatn2.innerHTML)+Number(250);
  	}
  	
  }
   hid1.value=Number(seatn2.innerHTML);
  hid.value=str.slice(0, str.length-1);
  str=""

	}else{
		window.alert("max 10 seats can be booked at a time");
		// location.href='seatlayout.php';
	}
  


});


</script>


</html>


