<?php

    $to = "gozzpi28@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "Solicitud de Demo";

    $fields = array();
    $fields{"name"} = "Nombre";
    $fields{"email"} = "Email";
    $fields{"phone"} = "Teléfono";
    $fields{"cia"} = "Empresa";
    $fields{"ruc"} = "RUC";
    

    $body = "Solicitud de Demo:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);
    echo "Respuesta:" . $send." \n ".$body
    //echo '<script languaje="Javascript">location.href="http://www.rimayperu.com/cdi/solicitar-demo.html"</script>';


?>