<?php
require 'PHPMailer/PHPMailerAutoload.php';
$fields = array();
    $fields{"name"} = "Nombre";
    $fields{"email"} = "Email";
    $fields{"phone"} = "Teléfono";
    $fields{"cia"} = "Empresa";
    $fields{"message"} = "Mensaje";

$body =  $_REQUEST['subject']  . ":<br><br>";
foreach ($fields as $a => $b) {
    $body .= sprintf("%20s: <b>%s</b><br>", $b, $_REQUEST[$a]);
}

$mail = new PHPMailer;
$mail->setLanguage('es');
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = 'forminfocmi@gmail.com';                 // SMTP username
$mail->Password = ' pw1567cmi';                          // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('informes@cmiconsulting.pe', 'CMI Consulting');
$mail->addAddress('informes@cmiconsulting.pe', "CMI Consulting");     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $_REQUEST['subject'];
$mail->Body    = $body;

if (!$mail->send()) {
    echo 'El mensaje no pudo enviarse';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje fue enviado exitosamente.<br> Pronto nos comunicaremos con Usted.';
}
