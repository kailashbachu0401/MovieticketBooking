<?php
if(isset($_POST['signup-button'])){
    session_start();
    $cardnum=$_POST["cardnum"];
    $cardholder=$_POST["cardholder"];
    $expdate=$_POST["expdate"];
    $cvv=$_POST["cvv"];
    $email=$_SESSION['email'];
    $date = date("m/Y");
    // echo $email;
    require 'dbconn.inc.php';
    if($expdate<=$date){
        echo '<script>alert("invalid expiry date")</script>';
        echo "<script>location.href='wallet.php'</script>";
    }else{
        if(mysqli_connect_error()){
            die("connect error");
        }else{
            $selectc="select * from wallet where cemail=?";
            // $selcts="select * from admin where semail=?";
           // $elects="select semail from admin where semail=? Limit 1";
            $update="update wallet set cardnum=?, cardholder=?, expdate=?, cvv=? where cemail=?";
            // $inserts="insert into admin(semail,pwd,sname,phno,city,pincode,gender,age,aadharnum) values(?,?,?,?,?,?,?,?,?)";
           // $select=($type=="admin")?$selects:$selectc;
            // $insert=$insertc;
            //create a prepared statement
            $stmt=mysqli_stmt_init($conn);
            // $stmt1=mysqli_stmt_init($conn);
            //prepare a prepared statement
            if(!mysqli_stmt_prepare($stmt,$selectc)){
                echo "my sql error";
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
              
                mysqli_stmt_execute($stmt);
                $resultc=mysqli_stmt_get_result($stmt);
                $rowcountc=mysqli_num_rows($resultc);
                
               // while($row=mysqli_fetch_assoc($result)){
                   // printf("%s %d",$row['cemail'],$rowcount);
               // }
                $rowcount=$rowcountc;
               if($rowcount!=0){
                    // echo '<script>alert("you cannot register if you are already  user")</script>';
                    //  echo "<script>location.href='index.php'</script>";
                    $values=mysqli_fetch_assoc($resultc);
                    if(($values["cardnum"]==$cardnum)or($values["cvv"]==$cvv)){
                        echo '<script>alert("Already existing card details")</script>';
                        echo "<script>location.href='wallet.php'</script>";
                    }else{
                        if(!mysqli_stmt_prepare($stmt,$update)){
                            echo "my sql error1";
                        }else{
                            
                                
                            mysqli_stmt_bind_param($stmt,"sssss",$cardnum,$cardholder,$expdate,$cvv,$email);
                            mysqli_stmt_execute($stmt);
                            // $_SESSION["name"]=$name;
                            // $_SESSION["phno"]=$phno;    
                            // $_SESSION["city"]=$city;
                            // $_SESSION["pincode"]=$pincode;
                            echo '<script>alert("your details have been successfully updated")</script>';
                            echo "<script>location.href='wallet.php'</script>";
                            
                        }
                    }
                    
                }
                   
            }
        }    
        
    $stmt->close();
   
    $conn->close();
    }
}
?>