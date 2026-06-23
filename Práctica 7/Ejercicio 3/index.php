<?php

if (isset($_POST['usuario']) && !empty(trim($_POST['usuario']))) {
    $nombre = trim($_POST['usuario']);
    setcookie('ultimo_usuario', $nombre, time() + (7 * 24 * 60 * 60)); 
    
    $_COOKIE['ultimo_usuario'] = $nombre;
}

$ultimo = $_COOKIE['ultimo_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Cookie Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fafafa; padding: 40px; }
        .contenedor { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-size: 16px; }
        button { background: #3498db; color: white; border: none; padding: 10px 24px; border-radius: 6px; cursor: pointer; font-size: 16px; }
        button:hover { background: #2980b9; }
        .recordado { background: #eafaf1; border-left: 4px solid #27ae60; padding: 12px 16px; border-radius: 4px; margin-bottom: 20px; color: #196f3d; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>📝 Formulario de Usuario</h1>

        <?php if ($ultimo): ?>
            <div class="recordado">
                👋 Último usuario ingresado: <strong><?= htmlspecialchars($ultimo) ?></strong>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="usuario">Nombre de usuario:</label>
            <input
                type="text"
                name="usuario"
                id="usuario"
                placeholder="Ingresá tu nombre"
                value="<?= htmlspecialchars($ultimo ?? '') ?>">
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
