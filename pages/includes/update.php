<?php
// Include database connection file
require_once "./connection.php";
session_start();

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE users set  fullname='" . $_POST['fullname'] . "', stud_num='" . $_POST['stud_num'] . "' ,phone='" . $_POST['phone'] . "' ,email='" . $_POST['email'] . "' WHERE stud_num='" . $_POST['stud_num'] . "'");
     
    $_SESSION['success']="You Have Updated successfull!!!";
    header('Location: ../viewUsers.php');
    //  echo "<script>alert('You Have Updated successfull A User!!! ');window.location='../viewUsers.php'</script>";
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM users WHERE stud_num='" . $_GET['stud_num'] . "'");
    $row= mysqli_fetch_array($result);
  


  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "../head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                    <div class="row jumbotron bg-dark">
                         <div class="col-xs-12 bg-dark">
                                 <h2>Update Record</h2>
                        </div>
                    </div>
                    </div>
                   
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                        <div class="form-group ">
                            <label>Student Number</label>
                            <input type="number" readonly name="stud_num" class="form-control" value="<?php echo $row["stud_num"]; ?>" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $row["fullname"]; ?>" maxlength="50" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>" maxlength="10"required="">
                        </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" maxlength="30" required="">
                        </div>
                        <input type="hidden" name="studno" value="<?php echo $row["studno"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../viewUsers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>