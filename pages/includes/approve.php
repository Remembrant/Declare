<?php

include_once 'connection.php';
session_start();
$student = $_SESSION['stud_num'];
if(isset($_SESSION['stud_num'])){

}
else
{
    echo "<script>location.href='./login.php'</script>";
}


if(isset($_GET['itemId'])){
   $id_main1 = $_GET['itemId'];
   $sql = mysqli_query($conn,"UPDATE items SET status = 1 WHERE itemId='$id_main1'");

   $_SESSION['success']="You Have Updated successfull!!!";
   header('Location: ../status.php');
 
}


?>