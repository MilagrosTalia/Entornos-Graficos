<?php
$titulares = [
    'politica'  => [
        'titulo'  => '🏛 Noticia Política',
        'texto'   => 'El gobierno anuncia nuevas medidas económicas para el segundo semestre del año.',
        'color'   => '#8e44ad'
    ],
    'economia'  => [
        'titulo'  => '📈 Noticia Económica',
        'texto'   => 'El índice bursátil alcanza su máximo histórico tras semanas de volatilidad.',
        'color'   => '#27ae60'
    ],
    'deportiva' => [
        'titulo'  => '⚽ Noticia Deportiva',
        'texto'   => 'La selección nacional clasifica a la final del campeonato mundial con una gran actuación.',
        'color'   => '#e67e22'
    ],
];

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    if (array_key_exists($tipo, $titulares)) {
        setcookie('tipo_titular', $tipo, time() + (30 * 24 * 60 * 60));
        $_COOKIE['tipo_titular'] = $tipo;
    }
}

$preferencia = $_COOKIE['tipo_titular'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Diario Digital</title>
    <style>
        body { font-family: Georgia, serif; background: #f5f0e8; margin: 0; padding: 20px; }
        header { background: #1a1a1a; color: white; text-align: center; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        header h1 { margin: 0; font-size: 36px; letter-spacing: 4px; }
        header p { margin: 4px 0 0; color: #aaa; font-size: 14px; }
        .titular { border-left: 5px solid; padding: 16px 20px; margin: 12px 0; border-radius: 4px; background: white; box-shadow: 0 1px 4px rgba(0,0,0,0.1); }
        .titular h2 { margin: 0 0 8px; }
        .titular p { margin: 0; color: #444; }
        .preferencias { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); }
        .preferencias h3 { margin-top: 0; color: #333; }
        .radio-group { display: flex; gap: 20px; flex-wrap: wrap; }
        label { cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 16px; }
        button { background: #1a1a1a; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 15px; margin-top: 10px; }
        button:hover { background: #333; }
        .info { background: #fff3cd; padding: 10px 16px; border-radius: 6px; margin-bottom: 16px; font-size: 14px; color: #856404; }
        .borrar { display: inline-block; margin-top: 16px; color: #e74c3c; text-decoration: none; font-size: 14px; }
        .borrar:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>EL DIARIO DIGITAL</h1>
        <p>Edición del <?= date('d/m/Y') ?></p>
    </header>

    <div class="preferencias">
        <h3>⚙️ Configurar tipo de titular</h3>
        <form method="POST" action="">
            <div class="radio-group">
                <label>
                    <input type="radio" name="tipo" value="politica"
                        <?= $preferencia === 'politica'  ? 'checked' : '' ?>>
                    🏛 Política
                </label>
                <label>
                    <input type="radio" name="tipo" value="economia"
                        <?= $preferencia === 'economia'  ? 'checked' : '' ?>>
                    📈 Economía
                </label>
                <label>
                    <input type="radio" name="tipo" value="deportiva"
                        <?= $preferencia === 'deportiva' ? 'checked' : '' ?>>
                    ⚽ Deportes
                </label>
            </div>
            <button type="submit">Aplicar preferencia</button>
        </form>
    </div>

    <h2>Titulares</h2>

    <?php if ($preferencia && array_key_exists($preferencia, $titulares)): ?>
  
        <?php $t = $titulares[$preferencia]; ?>
        <div class="info">📌 Mostrando tu titular preferido. <a href="borrar_cookie.php">Ver todos</a></div>
        <div class="titular" style="border-color: <?= $t['color'] ?>">
            <h2 style="color: <?= $t['color'] ?>"><?= $t['titulo'] ?></h2>
            <p><?= $t['texto'] ?></p>
        </div>
    <?php else: ?>
    
        <div class="info">ℹ️ Primera visita: se muestran todos los titulares. Podés elegir uno arriba.</div>
        <?php foreach ($titulares as $t): ?>
            <div class="titular" style="border-color: <?= $t['color'] ?>">
                <h2 style="color: <?= $t['color'] ?>"><?= $t['titulo'] ?></h2>
                <p><?= $t['texto'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a class="borrar" href="borrar_cookie.php">🗑 Borrar preferencia y ver todos los titulares</a>
</body>
</html>
