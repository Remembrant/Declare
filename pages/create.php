<?php
require_once "includes/connection.php";

if(isset($_POST['save']))
{    

     $name = $_POST['name'];
     $studno = $_POST['studno'];
     $mobile = $_POST['mobile'];
     $email = $_POST['email'];
     $sql = "INSERT INTO roles (name,studno,mobile,email)
     VALUES ('$name','$studno','$mobile','$email')";
     if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                            <label>Student Number</label>
                            <input type="number" name="studno" class="form-control" value="" maxlength="30" required="">
                          </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="" maxlength="10" required="">
                        </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="50" required="">
                        </div>

                       <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
