<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Log Out Successful');</script>";
echo "<script>location.href='userlogin.php'</script>";
?>