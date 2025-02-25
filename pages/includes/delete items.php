<?php
include_once './connection.php';
session_start();
$sql = "DELETE FROM items WHERE itemId='" . $_GET["del_id"] . "'";
$query = mysqli_query($conn, $sql) or die($sql);
$_SESSION['status']="You Have Deleted successfull!!!";
header("Location: ../viewItems.php");
?>