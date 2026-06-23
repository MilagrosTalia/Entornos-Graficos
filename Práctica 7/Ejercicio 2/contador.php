<?php

$expiracion = time() + (30 * 24 * 60 * 60);

if (!isset($_COOKIE['contador'])) {
    
    setcookie('contador', 1, $expiracion);
    $visitas = 1;
    $primera_vez = true;
} else {
    
    $visitas = (int)$_COOKIE['contador'] + 1;
    setcookie('contador', $visitas, $expiracion);
    $primera_vez = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Contador de Visitas</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px 50px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #2c3e50; }
        .numero { font-size: 64px; font-weight: bold; color: #3498db; margin: 20px 0; }
        p { color: #555; font-size: 18px; }
        .bienvenida { color: #27ae60; font-size: 22px; font-weight: bold; }
        a { color: #e74c3c; text-decoration: none; display: block; margin-top: 20px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🍪 Contador de Visitas</h1>

        <?php if ($primera_vez): ?>
            <p class="bienvenida">¡Bienvenido/a! Es tu primera visita.</p>
        <?php else: ?>
            <p>Ya visitaste esta página</p>
            <div class="numero"><?= $visitas ?></div>
            <p>veces en total.</p>
        <?php endif; ?>

        <a href="borrar_cookie.php">🗑 Borrar cookie y reiniciar contador</a>
    </div>
</body>
</html>
