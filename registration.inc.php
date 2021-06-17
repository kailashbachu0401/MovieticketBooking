<?php
if(isset($_POST['signup-button'])){
    $email=$_POST["email"];
    $pwd=$_POST["pass"];
    $repwd=$_POST["repass"];
    $name=$_POST["fullname"];
    $phno=$_POST["phno"];
    
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $aadharnum=$_POST["aadharnum"];
    require 'dbconn.inc.php';
    if($pwd!=$repwd){
        echo '<script>alert("Re-entered Password is incorrect")</script>';
        echo "<script>location.href='index.php'</script>";
    }else{
        if(mysqli_connect_error()){
            die("connect error");
        }else{
            $selectc="select * from user where cemail=?";
            // $selects="select * from admin where semail=?";
           // $selets="select semail from admin where semail=? Limit 1";
            $insertc="insert into user(cemail,pwd,cname,phno,city,pincode,gender,age,aadharnum) values(?,?,?,?,?,?,?,?,?)";
            $insertw="insert into wallet(cemail) values(?)"; 
            // $inserts="insert into admin(semail,pwd,sname,phno,city,pincode,gender,age,aadharnum) values(?,?,?,?,?,?,?,?,?)";
           // $select=($type=="admin")?$selects:$selectc;
            $insert=$insertc;
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
                   
                    echo '<script>alert("you cannot register if you are already  user")</script>';
                     echo "<script>location.href='index.php'</script>";
                }else{
                    if(!mysqli_stmt_prepare($stmt,$insert)){
                        echo "my sql error";
                    }else{
                        
                            
                        mysqli_stmt_bind_param($stmt,"sssssisss",$email,$pwd,$name,$phno,$city,$pincode,$gender,$age,$aadharnum);
                        mysqli_stmt_execute($stmt);
                        if(!mysqli_stmt_prepare($stmt,$insertw)){
                            echo "my sql error";
                        }else{
                             mysqli_stmt_bind_param($stmt,"s",$email);
                             mysqli_stmt_execute($stmt);
                        }

                         
                        echo '<script>alert("you have successfully registered as user")</script>';
                        echo "<script>location.href='index.php'</script>";
                        
                    }

                } 
                   
            }
        }    
        
    $stmt->close();
   
    $conn->close();
    }
}
?>