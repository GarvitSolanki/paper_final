<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("Exception.php");
require("PHPMailer.php");
require("SMTP.php");

$rndno = rand(100000, 999999); //OTP generate
$message = urlencode("otp number." . $rndno);
// echo($_GET["email"]);
if (! empty($_GET["email"])) {

$to = $_GET["email"];
$subject = "Access OTP ";
$txt = "OTP: " . $rndno . "";
$headers = "From: clubtermoo@gmail.com" . "\r\n" .
    "CC: garvitsolanki5@gmail.com";
/* mail($to, $subject, $txt, $headers); */


$headers = "From:<garvitsolanki5@gmail.com>\r\n"; // Sender's Email
						$headers .= "Cc:clubtermoo@gmail.com\r\n"; // Carbon copy to Sender
						$mail = new PHPMailer();
						$mail->isSMTP();
						$mail->Mailer = "smtp";
						$mail->Host = "smtp.gmail.com";
						$mail->Port = "587";
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'tls';
						$mail->Username = 'garvitsolanki5@gmail.com';
						$mail->Password = '*#mngv@999';
						$mail->From = "garvitsolanki5@gmail.com";
						$mail->FromName = "GarvitSolanki";
						$mail->AddAddress($to,'abcd' );
						
						$mail->Subject = 'Email Verification OTP';
						$mail->Body =  "
						Hey!
						
						Your activation code: ".$rndno."
						
                        ";
                        if($mail->send()) {
                            echo $rndno;
                        }
                        else
                        {
                            echo'process failed';
                        }
/* echo $rndno ; */
}

/* echo "please enter your email address"; */
