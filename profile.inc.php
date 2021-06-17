 <?php
if(isset($_POST['signup-button'])){
    session_start();
    $pwd=$_POST["pass"];
    // $repwd=$_POST["repass"];
    $name=$_POST["fullname"];
    $phno=$_POST["phno"];
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $email=$_SESSION['email'];
    // echo $email;
    require 'dbconn.inc.php';
    
        if(mysqli_connect_error()){
            die("connect error");
        }else{
            $selectc="select * from user where cemail=?";
            // $selets="select * from admin where semail=?";
           // $selects="select semail from admin where semail=? Limit 1";
            $update="update user set cname=?, phno=?, city=?, pincode=? where cemail=?";
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
                $values=mysqli_fetch_assoc($resultc);
                
               // while($row=mysqli_fetch_assoc($result)){
                   // printf("%s %d",$row['cemail'],$rowcount);
               // }
                $rowcount=$rowcountc;
               if(($rowcount!=0)and($values["pwd"]==$pwd)){
                    // echo '<script>alert("you cannot register if you are already  user")</script>';
                    //  echo "<script>location.href='index.php'</script>";
                    if(!mysqli_stmt_prepare($stmt,$update)){
                        echo "my sql error";
                    }else{
                        
                            
                        mysqli_stmt_bind_param($stmt,"sssis",$name,$phno,$city,$pincode,$email);
                        mysqli_stmt_execute($stmt);
                        $_SESSION["name"]=$name;
                        $_SESSION["phno"]=$phno;    
                        $_SESSION["city"]=$city;
                        $_SESSION["pincode"]=$pincode;
                        echo '<script>alert("your details have been successfully updated")</script>';
                        echo "<script>location.href='profile.php'</script>";
                        
                    }
                }else{
                    echo '<script>alert("Incorrect password")</script>';
                    echo "<script>location.href='profile.php'</script>";

                } 
                   
            }
        }    
        
    $stmt->close();
   
    $conn->close();
    
}
?>