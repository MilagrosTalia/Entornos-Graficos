<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eaf2f8; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; max-width: 420px; }
        h2 { color: #2980b9; }
        .dato { background: #ebf5fb; border: 1px solid #aed6f1; padding: 10px 16px; border-radius: 6px; margin: 8px 0; font-size: 15px; text-align: left; }
        .error { color: #e74c3c; font-size: 16px; }
        a { display: inline-block; margin-top: 20px; background: #e74c3c; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; }
        a:hover { background: #c0392b; }
    </style>
</head>
<body>
    <div class="card">
        <?php if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])): ?>
            <h2>👋 ¡Bienvenido/a, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h2>
            <p>Datos recuperados de la sesión:</p>
            <div class="dato">👤 <strong>Usuario:</strong> <?= htmlspecialchars($_SESSION['usuario']) ?></div>
            <div class="dato">🔑 <strong>Clave:</strong> <?= htmlspecialchars($_SESSION['clave']) ?></div>
            <a href="cerrar_sesion.php">🚪 Cerrar sesión</a>
        <?php else: ?>
            <h2 class="error">⚠️ Sesión no encontrada</h2>
            <p>No hay variables de sesión activas. Por favor iniciá sesión primero.</p>
            <a href="login.php" style="background: #2980b9;">← Ir al login</a>
        <?php endif; ?>
    </div>
</body>
</html>
