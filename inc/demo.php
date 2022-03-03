<?php
require 'PHPMailer/PHPMailerAutoload.php';
$fields = array();
$fields{"fname"} = "Nombre";
$fields{"lname"} = "Apellidos";
$fields{"email"} = "Email";
$fields{"phone"} = "Teléfono";
$fields{"cia"} = "Empresa";
$fields{"ruc"} = "RUC";

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
$mail->Username = 'forminfocmi@gmail.com';                 // SMTP username
$mail->Password = ' pw1567cmi';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('informes@cmiconsulting.pe', 'CMI Consulting');
$mail->addAddress('informes@cmiconsulting.pe', "CMI Consulting");     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $_REQUEST['subject'];
$mail->Body    = $body;

if (!$mail->send()) {
    echo 'El mensaje no pudo enviarse';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '¡Gracias por contactarnos! <br>En breve, nos comunicaremos con Usted.';
}
