<?php
require 'PHPMailer/PHPMailerAutoload.php';
$fields = array();


$fields{"fname"} = "Nombre";                           //Input form fields from descargar-recurso.html
$fields{"lname"} = "Apellidos";
$fields{"email"} = "Email";
$fields{"phone_optional"} = "Teléfono";

$body_reader = "Hola, ". $_REQUEST['fname']  . ".<br>";             //Body
$body_reader .= "¡Bienvenido a CMI Consulting Group!<br><br>";
$body_reader .= "En adjunto te enviamos archivo solicitado.<br>";
$body_reader .= "¡Que disfrutes la lectura!<br><br>";

$body_reader .= "<span style='text-decoration: underline;'>Tu solicitud</span><br>";

foreach ($fields as $a => $b) {
    $body_reader .= sprintf("%20s: <b>%s</b><br>", $b, $_REQUEST[$a]);
}

$mail = new PHPMailer;
$mail->setLanguage('es');
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'forminfocmi@gmail.com';            // SMTP username
$mail->Password = ' pw1567cmi';                       // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('informes@cmiconsulting.pe', 'CMI Consulting');          //Sender
$mail->addAddress($_REQUEST['email'], $_REQUEST['fname'] ." ". $_REQUEST['lname']);     // Add a recipient

$mail->addAttachment('../descargas/Los-Procesos-de-Negocio.pdf');         // Add attachments files
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $_REQUEST['subject'];
$mail->Body    = $body_reader;

if (!$mail->send()) {
    echo 'El mensaje no pudo enviarse';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '¡Gracias por contactarnos! <br> Revise su correo electrónico.';           //Output printed in descargar-recurso.html
}
