<?php
session_start();


if (isset($_POST['estilo'])) {
    $_SESSION['estilo'] = $_POST['estilo'];
}


$estilo = $_SESSION['estilo'] ?? 'claro';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Estilos con Sesión</title>
    <link rel="stylesheet" href="estilos/<?= htmlspecialchars($estilo) ?>.css">
</head>
<body>
    <div class="contenedor">
        <h1>Página con Estilos Configurables</h1>
        <p>El estilo actual es: <strong><?= htmlspecialchars($estilo) ?></strong></p>
        <p>Esta preferencia se recuerda entre visitas gracias a la sesión.</p>

        <form method="POST" action="">
            <label for="estilo">Elegí un estilo:</label>
            <select name="estilo" id="estilo">
                <option value="claro"  <?= $estilo === 'claro'  ? 'selected' : '' ?>>Claro</option>
                <option value="oscuro" <?= $estilo === 'oscuro' ? 'selected' : '' ?>>Oscuro</option>
                <option value="azul"   <?= $estilo === 'azul'   ? 'selected' : '' ?>>Azul</option>
            </select>
            <button type="submit">Aplicar</button>
        </form>
    </div>
</body>
</html>
