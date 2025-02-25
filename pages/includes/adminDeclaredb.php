<?php
require ('./connection.php');
session_start();
$student = $_SESSION['stud_num'];

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
                    header('Location: ../adminDeclareItem.php');
                    //   echo "<script>alert('Sorry, item already exist!!!');window.location='../adminDeclareItem.php'</script>";
                      
                 }
                  else{

                    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                    $tname = $_FILES["file"]["tmp_name"];
                    $uploads_dir = '../uploads'; 
                    move_uploaded_file($tname,$uploads_dir.'/'.$pname);

                    $sql = "INSERT INTO items (stud_num,serial_num, item_nam, description,file,status,lost,role,read_mesg)
                    VALUES ('" . $_POST["stud_num"] . "','" . $_POST["serial_num"] . "','" . $_POST["item_nam"] . "','" . $_POST["description"] . "','$pname','" . $_POST["status"] . "','" . $_POST["lost"] . "','" . $_POST["role"] . "','" . $_POST["read_mesg"] . "')";
                        

                        if ($conn->query($sql) === TRUE)
                    {
                        $_SESSION['success']="Item declared successfull!!!";
                        header('Location: ../adminDeclareItem.php');
                        // echo "<script>alert('Item declared successfull!!! ');window.location='../viewItems.php'</script>";
                       
                    }
                    else
                    {
                        $_SESSION['status']="There was an Error";
                    header('Location: ../adminDeclareItem.php');
                        // echo "<script>alert('There was an Error');window.location='../adminDeclareItem.php'<script>" . $sql . "<br>" . $conn->error;

                    }


                  }
            
          
	 
$conn->close();
        
}