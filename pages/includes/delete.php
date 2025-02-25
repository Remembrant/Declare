<?php
include_once './connection.php';
session_start();
$sql = "DELETE FROM users WHERE stud_num='" . $_GET["del_id"] . "'";
$query = mysqli_query($conn, $sql) or die($sql);
$_SESSION['status']="You Have Deleted successfull!!!";
header("Location: ../viewUsers.php");
?>