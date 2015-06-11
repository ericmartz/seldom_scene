<?php 

$name = $_POST["full_name"];
$phone = $_POST["phone_number"];
$email = $_POST["email_addr"];
$message = $_POST["message"];

$email_body = "";

$email_body = $email_body . "The following information was submitted through SeldomScene.com:" . "<br>" . "<br>";
$email_body = $email_body . "Name: " . $name . "<br>";
$email_body = $email_body . "Phone #: " . $phone . "<br>";
$email_body = $email_body . "Email: " . $email . "<br>";
$email_body = $email_body . "Message: " . $message . "<br>";

require_once("inc/class.phpmailer.php");
require_once("../stuff/info.php");

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtpout.secureserver.net";
$mail->Port = 80;
$mail->Username = $info1;
$mail->Password = $info2;



//Set who the message is to be sent from
$mail->SetFrom($email, $name);
//Set who the message is to be sent to
$mail->AddAddress('byrdbrane2@yahoo.com', 'Dave Lauby');
$mail->AddBCC('ericmartz@gmail.com', 'Eric Martz');
//Set the subject line
$mail->Subject = 'Submission from SeldomScene.com';
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
$mail->MsgHTML($email_body);
//Replace the plain text body with one created manually
$mail->AltBody = $email_body;

//Send the message, check for errors
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  exit;
}

header("Location: thank-you.html");

?>