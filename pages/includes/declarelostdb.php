<?php
require ('./connection.php');
session_start();
 

if(isset($_POST['submit'])){

$serial_num =$_POST['serial_num'];
$item_nam = $_POST['item_nam'];
$description = $_POST['description'];
//$idNo = $_POST['idNo'];

$sql1 = "SELECT * FROM items WHERE serial_num ='".$_POST["serial_num"]."' ";
                  // $encrypted_password = md5($uPass);
                  $result = $conn->query($sql1);
                  if ($result->num_rows > 0) {
                    $_SESSION['status']="Sorry, item already exist!!!";
                    header('Location: ../lostItem.php');
                    //   echo "<script>alert('Sorry, item already exist!!!');window.location='../lostItem.php'</script>";
                      
                 }
                  else{

                    $sql = "INSERT INTO items (stud_num,serial_num, item_nam, description,lost,role)
                    VALUES ('" . $_POST["stud_num"] . "','" . $_POST["serial_num"] . "','" . $_POST["item_nam"] . "','" . $_POST["description"] . "','" . $_POST["lost"] . "','" . $_POST["role"] . "')";
                        

                    if ($conn->query($sql) === TRUE)
                    {
                        $_SESSION['success']="Item declared successfull!!!";
                        header('Location: ../lostItem.php');
                        // echo "<script>alert('Item declared successfull!!! ');window.location='../viewlostItems.php'</script>";
                       
                    }
                    else
                    {
                        $_SESSION['status']="There was an Error!!!";
                        header('Location: ../lostItem.php');
                        // echo "<script>alert('There was an Error');window.location='../lostItem.php'<script>" . $sql . "<br>" . $conn->error;
                        exit;
                    }


                  }
            
          
	 
$conn->close();
        
}