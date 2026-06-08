<?php

$destinatario = $_POST['email'];
$descrip = $_POST['texto'];
$asunto = $_POST['asunto'];

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

mail($destinatario, $asunto, $descrip, $headers);

echo ('El mail ha sido enviado con exito');

?>
