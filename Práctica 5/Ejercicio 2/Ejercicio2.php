<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

mail($nombre, $correo, $asunto, $mensaje);

echo ('Su pregunta fue enviada correctamente')

?>


