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


$headers = "From:<no-reply@i3lab.in>\r\n"; // Sender's Email
						/* $headers .= "Cc:clubtermoo@gmail.com\r\n"; // Carbon copy to Sender */
						$mail = new PHPMailer();
						$mail->isSMTP();
						$mail->Mailer = "smtp";
						$mail->Host = "mail.i3lab.in";
						$mail->Port = "587";
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'tls';
						$mail->Username = 'no-reply@i3lab.in';
						$mail->Password = '1tc{W&@j._OT';
						$mail->From = "no-reply@i3lab.in";
						$mail->FromName = "RASTM2020";
						$mail->AddAddress($to,'anonymous' );
						
						$mail->Subject = '[RASTM 2020]: Email Verification OTP';
						$mail->Body =  "
						Hey!
						
						Your verification code: ".$rndno."
						
                        ";
                        if($mail->send()) {
                            echo '{"status":"success","msg": "'.$rndno.'"}';
                        }
                        else
                        {
							echo '{"status":"error","msg": "'.$mail->ErrorInfo.'"}' ;
                            
                        }
/* echo $rndno ; */
}

/* echo "please enter your email address"; */
