<?php
session_start();


if (!isset($_POST['usuario']) || !isset($_POST['clave'])) {
    header('Location: login.php');
    exit;
}


$_SESSION['usuario'] = htmlspecialchars(trim($_POST['usuario']));
$_SESSION['clave']   = htmlspecialchars(trim($_POST['clave']));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión Creada</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eafaf1; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        h2 { color: #27ae60; }
        p { color: #555; }
        .dato { background: #f0faf4; border: 1px solid #a9dfbf; padding: 8px 14px; border-radius: 6px; margin: 8px 0; font-size: 15px; }
        a { display: inline-block; margin-top: 20px; background: #27ae60; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; }
        a:hover { background: #1e8449; }
    </style>
</head>
<body>
    <div class="card">
        <h2>✅ Variables de Sesión Creadas</h2>
        <p>Las siguientes variables fueron almacenadas en la sesión:</p>
        <div class="dato">👤 <strong>$_SESSION['usuario']</strong> = "<?= $_SESSION['usuario'] ?>"</div>
        <div class="dato">🔑 <strong>$_SESSION['clave']</strong> = "<?= $_SESSION['clave'] ?>"</div>
        <a href="recuperar_sesion.php">Ver página de bienvenida →</a>
    </div>
</body>
</html>
