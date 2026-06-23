<?php
session_start();

if (!isset($_POST['mail'])) {
    header('Location: index.php');
    exit;
}


$host   = 'localhost';
$dbname = 'base2';
$user   = 'root';
$pass   = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


$mail = trim($_POST['mail']);
$stmt = $pdo->prepare("SELECT nombre FROM alumnos WHERE mail = ?");
$stmt->execute([$mail]);
$alumno = $stmt->fetch(PDO::FETCH_ASSOC);

if ($alumno) {

    $_SESSION['nombre'] = $alumno['nombre'];
    header('Location: bienvenida.php');
} else {
    header('Location: index.php?error=1');
}
exit;
