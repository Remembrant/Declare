<?php

require './includes/connection.php';

if(isset($_GET['token'])){
    $token = mysqli_real_escape_string($conn,$_GET['token']);
    $query = "SELECT * FROM reset_p WHERE token = '$token'";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
        $row = mysqli_fetch_array($run);
        $token = $row['token'];
        $email = $row['email'];
    }else{
        header("location:./login.php");
    }
}

if(isset($_POST['submit'])){
    $uPass = mysqli_real_escape_string($conn,$_POST['uPass']);
    $cPass = mysqli_real_escape_string($conn,$_POST['cPass']); 
    $encrypted_password = md5($uPass);
    if($uPass=$cPass){
        $query = "UPDATE users SET uPass = '$encrypted_password' WHERE email = '$email'";
        mysqli_query($conn,$query);
        $query = "DELETE FROM reset_p WHERE email = '$email'";
        mysqli_query($conn,$query);
        $msg = "<div class='alert alert-success'>Password Updated</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Reset Password
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/logint.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="./r.css" rel="stylesheet" />
  <?php include "head.php"; ?>
</head>

<body class="user-profile"  >

    <div class="main-panel" id="main-panel">
    
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
              <a class ="float-right" href="./login.php">
               <i style="color: gray;" class = "fa fa-times"></i>
               </a>
                <h5 class="title">Reset Password</h5>
              </div>
              <div class="card-body">
                <form action="" method="post" style="margin-left:200">

                    <div class="row" style= "text-align: center;">
                    <div class="col-md-11 px-1">
                      <div class="form-group" >
                        <label>Email</label>
                        <input readonly  type="email" class="form-control" name="email" placeholder="Enter Student Number" value="<?php echo $email?>"  required>
                      </div>
                    </div>
                    </div>


                    <div class="row" style= "text-align: center;">
                    <div class="col-md-11 px-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="uPass" id="uPass" onkeyup="validatePass()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your Password" value=""  required>
                      </div>
                    </div>
                    </div>

                    <div id="message">
							<h3>Password must contain the following:</h3>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>

                  <div class="row" style= "text-align: center;">
					          <div class="col-md-11 px-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cPass" id="cPass" onkeyup="validatePasswordMatch()" placeholder="Confirm Password" value="" required>
                        <label id="lblCpass"></label>
                      </div>
                    </div>
                 </div>
                    <?php if(isset($msg)){echo $msg;} ?>
				<button type="Submit" class="btn btn-secondary btn-block" name="submit">Reset Password</button>
               
                </form>

                
              </div>
            </div>
          </div>
         
        </div>
      </div>

    </div>
  <!-- </div> -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/validations.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="./rs.js"></script>
</body>

</html>

