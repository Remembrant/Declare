<?php
require ('includes/connection.php');

if(isset($_POST['update'])){

$studNo =$_POST['studNo'];
$email =$_POST['email'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
//$idNo = $_POST['idNo'];



$sql = "UPDATE `data` SET email='$email',fName='$fName',lName='$lName' WHERE studNo=".$studNo;
		

     if ($conn->query($sql) === True)
       {echo "<script>alert('User successfuly updated !! Go to login button')</script>";}
         else
		 {echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;}
	 
$conn->close();
        
}

