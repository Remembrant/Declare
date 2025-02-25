<?php

// require './PHPMailer-5.2-stable/PHPMailerAutoload.php';

require_once('./PHPMailer/Exception.php');
require_once('./PHPMailer/PHPMailer.php');
require_once('./PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

$mail->SMTPDebug = 4;
$mail->Debugoutput = 'html';

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
$mail->addAddress('mfanakazane65@gmail.com');
//$mail->addReplayTo('sremembrant@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'hello World';
$mail->Body = 'A test email';

if(!$mail->Send()){
    echo "Not sent";
}else{
    echo "Successful sent"; 
}

?>