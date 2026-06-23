<?php
// Conexión BD 
$host = 'localhost'; $dbname = 'prueba'; $user = 'root'; $pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

//Buscar canciones
$resultados = [];
$termino    = '';
$buscado    = false;

if (isset($_GET['q']) && trim($_GET['q']) !== '') {
    $termino = trim($_GET['q']);
    $buscado = true;
    $stmt    = $pdo->prepare("SELECT * FROM buscador WHERE canciones LIKE ?");
    $stmt->execute(['%' . $termino . '%']);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 - Buscador de Canciones</title>
    <style>
        body { font-family: Arial, sans-serif; background: #1a1a2e; color: #e0e0e0; margin: 0; padding: 30px; }
        .contenedor { max-width: 650px; margin: auto; }
        h1 { text-align: center; color: #e94560; font-size: 32px; margin-bottom: 6px; }
        .subtitulo { text-align: center; color: #888; margin-bottom: 30px; font-size: 15px; }
        .buscador-form { display: flex; gap: 8px; margin-bottom: 28px; }
        input[type="text"] {
            flex: 1; padding: 12px 16px; border: none; border-radius: 8px;
            background: #16213e; color: #e0e0e0; font-size: 16px;
            border: 1px solid #e94560;
        }
        input[type="text"]::placeholder { color: #666; }
        button { background: #e94560; color: white; border: none; padding: 12px 20px; border-radius: 8px; cursor: pointer; font-size: 16px; }
        button:hover { background: #c73652; }
        .resultado { background: #16213e; border-left: 4px solid #e94560; padding: 14px 18px; border-radius: 6px; margin-bottom: 10px; font-size: 16px; }
        .resultado span { color: #888; font-size: 13px; display: block; margin-top: 2px; }
        .no-resultados { text-align: center; color: #888; padding: 30px; font-size: 16px; }
        .highlight { background-color: #e94560; color: white; border-radius: 3px; padding: 0 2px; }
        .contador { color: #888; font-size: 14px; margin-bottom: 14px; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>🎵 Buscador de Canciones</h1>
        <p class="subtitulo">Buscá tu canción favorita en nuestra base de datos</p>

        <form method="GET" action="" class="buscador-form">
            <input
                type="text"
                name="q"
                placeholder="Ingresá el nombre de la canción o artista..."
                value="<?= htmlspecialchars($termino) ?>">
            <button type="submit">🔍 Buscar</button>
        </form>

        <?php if ($buscado): ?>
            <?php if (!empty($resultados)): ?>
                <p class="contador">
                    Se encontraron <strong><?= count($resultados) ?></strong>
                    resultado(s) para "<strong><?= htmlspecialchars($termino) ?></strong>":
                </p>
                <?php foreach ($resultados as $row): ?>
                    <div class="resultado">
                        🎶 <?= str_ireplace(
                                $termino,
                                '<span class="highlight">' . htmlspecialchars($termino) . '</span>',
                                htmlspecialchars($row['canciones'])
                            ) ?>
                        <span>ID: <?= $row['id'] ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-resultados">
                    😕 No se encontraron canciones con "<strong><?= htmlspecialchars($termino) ?></strong>".
                    <br><br>Intentá con otro término de búsqueda.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
