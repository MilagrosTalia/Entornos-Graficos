<?php
session_start();

$host = 'localhost'; $dbname = 'Compras'; $user = 'root'; $pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if (isset($_POST['agregar'])) {
    $id = (int)$_POST['id'];
    $stmt = $pdo->prepare("SELECT * FROM catalogo WHERE id = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$id] = [
                'producto' => $producto['producto'],
                'precio'   => $producto['precio'],
                'cantidad' => 1
            ];
        }
    }
    header('Location: catalogo.php');
    exit;
}

if (isset($_GET['quitar'])) {
    $id = (int)$_GET['quitar'];
    unset($_SESSION['carrito'][$id]);
    header('Location: catalogo.php');
    exit;
}

if (isset($_GET['vaciar'])) {
    $_SESSION['carrito'] = [];
    header('Location: catalogo.php');
    exit;
}

$productos = $pdo->query("SELECT * FROM catalogo")->fetchAll(PDO::FETCH_ASSOC);

$carrito = $_SESSION['carrito'] ?? [];
$total   = 0;
foreach ($carrito as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 - Carrito de Compras</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
        .layout { display: flex; gap: 24px; max-width: 1100px; margin: auto; flex-wrap: wrap; }
        .catalogo-section { flex: 2; min-width: 280px; }
        .carrito-section  { flex: 1; min-width: 260px; }
        h2 { color: #34495e; border-bottom: 2px solid #3498db; padding-bottom: 8px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; }
        .producto-card { background: white; border-radius: 10px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .producto-card h3 { margin: 0 0 8px; font-size: 15px; color: #2c3e50; }
        .precio { color: #27ae60; font-size: 18px; font-weight: bold; margin: 8px 0; }
        .btn-agregar { width: 100%; background: #3498db; color: white; border: none; padding: 9px; border-radius: 6px; cursor: pointer; font-size: 14px; }
        .btn-agregar:hover { background: #2980b9; }
        .carrito-card { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .item { display: flex; justify-content: space-between; align-items: flex-start; padding: 8px 0; border-bottom: 1px solid #eee; font-size: 14px; }
        .item-info { flex: 1; }
        .item-info strong { display: block; color: #2c3e50; }
        .item-info span { color: #888; font-size: 12px; }
        .btn-quitar { background: #e74c3c; color: white; border: none; padding: 4px 10px; border-radius: 4px; cursor: pointer; font-size: 12px; margin-left: 8px; }
        .total { font-size: 18px; font-weight: bold; color: #27ae60; margin-top: 14px; text-align: right; }
        .btn-vaciar { width: 100%; background: #95a5a6; color: white; border: none; padding: 9px; border-radius: 6px; cursor: pointer; margin-top: 12px; font-size: 14px; }
        .btn-vaciar:hover { background: #7f8c8d; }
        .vacio { color: #aaa; text-align: center; padding: 20px; }
    </style>
</head>
<body>
    <h1>🛒 Carrito de Compras</h1>
    <div class="layout">
        <!-- CATÁLOGO -->
        <div class="catalogo-section">
            <h2>📦 Catálogo</h2>
            <div class="grid">
                <?php foreach ($productos as $p): ?>
                    <div class="producto-card">
                        <h3><?= htmlspecialchars($p['producto']) ?></h3>
                        <div class="precio">$<?= number_format($p['precio'], 2, ',', '.') ?></div>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <button type="submit" name="agregar" class="btn-agregar">+ Agregar</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- CARRITO -->
        <div class="carrito-section">
            <h2>🛒 Mi Carrito</h2>
            <div class="carrito-card">
                <?php if (empty($carrito)): ?>
                    <p class="vacio">El carrito está vacío.</p>
                <?php else: ?>
                    <?php foreach ($carrito as $id => $item): ?>
                        <div class="item">
                            <div class="item-info">
                                <strong><?= htmlspecialchars($item['producto']) ?></strong>
                                <span>Cantidad: <?= $item['cantidad'] ?> × $<?= number_format($item['precio'], 2, ',', '.') ?></span>
                            </div>
                            <a href="?quitar=<?= $id ?>"><button class="btn-quitar">✕</button></a>
                        </div>
                    <?php endforeach; ?>
                    <div class="total">Total: $<?= number_format($total, 2, ',', '.') ?></div>
                    <a href="?vaciar=1"><button class="btn-vaciar">🗑 Vaciar carrito</button></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
