<?php
// Include database connection file
require_once "./connection.php";
session_start();
    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE items set  stud_num='" . $_POST['stud_num'] . "', item_nam='" . $_POST['item_nam'] . "' ,description='" . $_POST['description'] . "' ,serial_num='" . $_POST['serial_num'] . "',lost='" . $_POST['lost'] . "' WHERE itemId='" . $_POST['itemId'] . "'");
    $_SESSION['success']="You Have Updated successfull!!!";
    header('Location: ../viewlostItems.php');
    //  echo "<script>alert('You Have Updated successfull An Item!!!');window.location='../viewlostItems.php'</script>";
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM items WHERE itemId='" . $_GET['itemId'] . "'");
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
                            <label>Item Name</label>
                            <input type="text" name="item_nam" class="form-control" value="<?php echo $row["item_nam"]; ?>" maxlength="50" required="">
                            
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $row["description"]; ?>" maxlength="100"required="">
                        </div>
                            <div class="form-group">
                            <label>Serial Number</label>
                            <input type="text" name="serial_num" class="form-control" value="<?php echo $row["serial_num"]; ?>" maxlength="100" required="">
                        </div>
                        <div class="form-group">
                            <label>Update To Found</label>
                            <!-- <input type="text" name="lost" class="form-control" value="<?php echo $row["lost"]; ?>" maxlength="100" required=""> -->
                            <select class="form-control" name="lost" id="">
                                <option name="lost" value="1"><?php echo $row["lost"]="Lost";?></option>
                                <option value="0">Found</option>
                            </select>
                        </div>
                        <input type="hidden" name="itemId" value="<?php echo $row["itemId"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../viewlostItems.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>