<?php
setcookie('tipo_titular', '', time() - 3600);
header('Location: periodico.php');
exit;
