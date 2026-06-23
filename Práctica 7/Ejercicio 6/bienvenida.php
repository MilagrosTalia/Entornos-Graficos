<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida - Ejercicio 6</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f7; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        h2.ok { color: #8e44ad; }
        h2.err { color: #e74c3c; }
        p { color: #555; }
        a { display: inline-block; margin-top: 20px; background: #8e44ad; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; }
        a:hover { background: #7d3c98; }
    </style>
</head>
<body>
    <div class="card">
        <?php if (isset($_SESSION['nombre'])): ?>
            <h2 class="ok">🎉 ¡Bienvenido/a, <?= htmlspecialchars($_SESSION['nombre']) ?>!</h2>
            <p>Tu sesión está activa. Podés navegar por el sitio.</p>
            <a href="cerrar_sesion.php">🚪 Cerrar sesión</a>
        <?php else: ?>
            <h2 class="err">🚫 Acceso denegado</h2>
            <p>No podés visitar esta página porque no existe una variable de sesión activa.</p>
            <a href="index.php">← Volver al formulario</a>
        <?php endif; ?>
    </div>
</body>
</html>
