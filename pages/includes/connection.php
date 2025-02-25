<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dBName = "Declaration";


$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error);
}
