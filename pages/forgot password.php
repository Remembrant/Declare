<?php

require './includes/connection.php';

if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $query= "SELECT * FROM users WHERE email = '$email'";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $token = uniqid(md5(time()));
        $query = "INSERT INTO reset_p (email,token) VALUES ('$email','$token')";
        if(mysqli_query($conn,$query)){
            // $to = $db_email;
            // $subject = "Password reset link";
            // $message = "Reset";
            // $headers = "From: sremembrant@gmail.com";
            // mail($to,$subject,$message,$headers);
            // $msg = "<div class='alert alert-success'>Success</div>";


            /////////////////////////

            require './PHPMailer-5.2-stable/PHPMailerAutoload.php';

                      $mail = new PHPMailer();

                      // $mail->SMTPDebug = 4;
                      // $mail->Debugoutput = 'html';

                      $mail->isSMTP();

                      $mail->Host = gethostbyname('smtp.gmail.com');
                      $mail->Port = 587;//587
                      $mail->SMTPAuth = "true";
                      $mail->SMTPSecure = 'tls';//tls

                      $mail->SMTPOptions = array(
                          'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                          )
                      );

                      $mail->Username = 'sremembrant@gmail.com';
                      $mail->Password = 'REmember@0711';

                      $mail->SetFrom('sremembrant@gmail.com','Member');
                      $mail->addAddress($db_email);
                      //$mail->addReplayTo('sremembrant@gmail.com');

                      $mail->isHTML(true);
                      $mail->Subject = 'Password reset link';
                      $mail->Body = "Click <a href='http://localhost/declaration/pages/reset password.php?token=$token'>here</a> to reset your password";

                      $mail->Send();
                       
                      $msg = "<div class='alert alert-success'>You can check your email for reset password link</div>";

        }
    }else{
        $msg = "<div class='alert alert-danger'>Sorry user not found</div>";
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
    Forgot Password
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
                <h5 class="title">Forgot Password</h5>
              </div>
              <div class="card-body">
                <form action="" method="post" style="margin-left:200">

                  <div class="row" style= "text-align: center;">
                    <div class="col-md-11 px-1">
                      <div class="form-group" >
                        <label>Email</label>
                        <input  type="email" class="form-control" name="email" placeholder="Enter Student Number" value=""  required>
                      </div>
                    </div>
                    </div>
                    <?php if(isset($msg)){echo $msg;} ?>
				<button type="Submit" class="btn btn-secondary btn-block" name="submit">submit</button>
                
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
</body>

</html>


