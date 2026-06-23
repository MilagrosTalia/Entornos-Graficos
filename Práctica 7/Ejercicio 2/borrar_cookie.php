<?php
setcookie('contador', '', time() - 3600);
header('Location: contador.php');
exit;
