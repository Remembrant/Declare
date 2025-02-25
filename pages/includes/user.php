<?php
// Include database connection file
require_once "./connection.php";
session_start();

   
    $result = mysqli_query($conn,"SELECT * FROM users WHERE stud_num='" . $_SESSION['stud_num'] . "'");
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
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Full Names" value="<?php echo $row["fullname"]; ?>" >
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?php echo $row["email"]; ?>" >
                         </div>
                            <div class="form-group">
                            <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="<?php echo $row["phone"]; ?>">
                     </div>
                     <div class="form-group">
                     <label>Campus</label>
                        <input type="text" class="form-control" name="campus" placeholder="Enter Campus" value="<?php echo $row["campus"]; ?>" >
                     
                     </div>
                        <input type="hidden" name="itemId" value="<?php echo $row["itemId"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../viewUserItems.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>