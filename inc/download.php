<?php
require 'PHPMailer/PHPMailerAutoload.php';
$fields = array();
$fields{"fname"} = "Nombre";
$fields{"lname"} = "Apellidos";
$fields{"email"} = "Email";
$fields{"phone"} = "Teléfono";

$body =  $_REQUEST['subject']  . ":<br><br>";
foreach ($fields as $a => $b) {
    $body .= sprintf("%20s: <b>%s</b><br>", $b, $_REQUEST[$a]);
}

$mail = new PHPMailer;
$mail->setLanguage('es');
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cmiperuconsulting@gmail.com';                 // SMTP username
$mail->Password = 'Dor21335';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('form@cmiconsulting.pe', 'CMI Consulting');
$mail->addAddress($_REQUEST['email'], $_REQUEST['fname'] ." ". $_REQUEST['lname']);     // Add a recipient

$mail->addAttachment('../descargas/Los-Procesos-de-Negocio.pdf');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $_REQUEST['subject'];
$mail->Body    = $body;

if (!$mail->send()) {
    echo 'El mensaje no pudo enviarse';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje fue enviado exitosamente';
}
