<?php
	$host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="mtb";
    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die("connect error");
    }

?>