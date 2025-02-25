<?php

include_once './connection.php';

if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];

    $resultSet = $conn->query("SELECT verified, vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if($resultSet->num_rows == 1){
        $update = $conn->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
    
        if($update){
            echo "<script>alert('Your account has been verified, You may now login');window.location='../login.php'</script>";
            //echo "Your account has been verified, You may now login";
        }else{
            echo $conn->error;
        }
    
    }else{
        echo "<script>alert('This Account Invalid or already verified');window.location='../login.php'</script>";
        //echo "This Account Invalid or already verified";
    }

}else{
    die("<script>alert('Something Went Wrong!!!');window.location='../login.php'</script>");
}

?>