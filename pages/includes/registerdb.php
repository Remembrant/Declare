<?php
require ('./connection.php');

session_start();


if(isset($_POST['signup-btn'])){

  $uPass = $_POST["uPass"];
  $cPass = $_POST["cPass"];
  $stud = $_POST["stud_num"];
  $email = $_POST["email"];
  if ($uPass==$cPass) {



         $sql1 = "SELECT * FROM users WHERE stud_num ='".$_POST["stud_num"]."' ";
                  $encrypted_password = md5($uPass);
                  $vkey = md5(time().$stud);
                  $result = $conn->query($sql1);
                  if ($result->num_rows > 0) {
                      echo "<script>alert('Sorry, user already exist!');window.location='../register.php'</script>";
                      
                 }
                  else{
                    $sql = "INSERT INTO users (stud_num,fullname,email,phone,campus,uPass,usertype,vkey) VALUES ('" . $_POST["stud_num"] . "','" . $_POST["fullname"] . "','" . $_POST["email"] . "','" . $_POST["phone"] . "','" . $_POST["campus"] . "','$encrypted_password','" . $_POST["usertype"] . "','$vkey' )";

                    if ($conn->query($sql) === TRUE)
                    {

                      require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';

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
                      $mail->addAddress($email);
                      //$mail->addReplayTo('sremembrant@gmail.com');

                      $mail->isHTML(true);
                      $mail->Subject = 'Email Verification';
                      $mail->Body = "<a href='http://localhost/declaration/pages/includes/verify.php?vkey=$vkey'>Validate your account</a>";

                      $mail->Send();
                       
                      echo "<script>alert('User registered successfull!!! Check your email for verification');window.location='../login.php'</script>";
                       
                    }
                    else
                    {
                        echo "<script>alert('There was an Error');window.location='../register.php'<script>" . $sql . "<br>" . $conn->error;

                    }


                  }
            }
            else
            {
              echo "<script>alert('Please confirm your password again!!!');window.location='../register.php'</script>";
            }
            $conn->close();
        }
