<?php
require ('./connection.php');
session_start();
 $student = $_SESSION['stud_num'];
 $name = $_SESSION['fullname'];
 

if(isset($_POST['submit'])){

$serial_num =$_POST['serial_num'];
$item_nam = $_POST['item_nam'];
$description = $_POST['description'];
//$idNo = $_POST['idNo'];

$sql1 = "SELECT * FROM items WHERE serial_num ='".$_POST["serial_num"]."' ";
                  // $encrypted_password = md5($uPass);
                  $result = $conn->query($sql1);
                  if ($result->num_rows > 0) {
                    $msg = "INSERT INTO message (fullname,stud_num,message,serial_num)
                    VALUES ('$name','$student','was trying to declare someone else item or lost item','" . $_POST["serial_num"] . "')";
                        
                    if ($conn->query($msg) === TRUE)
                    {
                        $_SESSION['status']="Sorry, item already exist!!!. Message was sent to the admin he or she will contact you for help";
                        header('Location: ../itemDeclare.php');
                        // echo "<script>alert('Sorry, item already exist!!!. Message was sent to the admin he or she will contact you for help');window.location='../itemDeclare.php'</script>";
                       
                    }
                    else
                    {
                        $_SESSION['status']="Message not sent, There was an Error!!!";
                        header('Location: ../itemDeclare.php');
                        // echo "<script>alert('There was an Error');window.location='../itemDeclare.php'<script>" . $msg . "<br>" . $conn->error;
                        exit;
                    }
                 }
                  else{

                    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                    $tname = $_FILES["file"]["tmp_name"];
                    $uploads_dir = '../uploads';
                    move_uploaded_file($tname,$uploads_dir.'/'.$pname);

                    // $file=$_FILES["file"]["name"];
                    // $tmp_name=$_FILES["file"]["tmp_name"];
                    // $path="../uploads/".$file;
                    // $file1=explode(".",$file);
                    // $ext=$file1[1];
                    // $allowed=array("jpg","png","gif","pdf");
                    // if(in_array($ext,$allowed)){

                    // }
                    
                    $sql = "INSERT INTO items (serial_num, item_nam, description,stud_num,file,lost,role,status)
                    VALUES ('" . $_POST["serial_num"] . "','" . $_POST["item_nam"] . "','" . $_POST["description"] . "','$student','$pname','" . $_POST["lost"] . "','" . $_POST["role"] . "','" . $_POST["status"] . "')";
                        

                        if ($conn->query($sql) === TRUE)
                    {
                        $_SESSION['success']="Item declared successfull!!!";
                        header('Location: ../itemDeclare.php');
                        // echo "<script>alert('Item declared successfull!!! ');window.location='../viewUserItems.php'</script>";
                       
                    }
                    else
                    {
                        $_SESSION['status']="There was an Error!!!";
                        header('Location: ../itemDeclare.php');
                        // echo "<script>alert('There was an Error');window.location='../itemDeclare.php'<script>" . $sql . "<br>" . $conn->error;

                    }


                  }
            
          
	 
$conn->close();
        
}