<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

mail($nombre, $email, $comentario, $headers);

echo ('El mail ha sido enviado con exito');
