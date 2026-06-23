<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 - Buscar Alumno por Mail</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f7; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); width: 360px; }
        h2 { color: #2c3e50; margin-top: 0; }
        label { display: block; margin-top: 12px; color: #555; font-size: 14px; }
        input[type="email"] {
            width: 100%; padding: 10px; margin-top: 4px; border: 1px solid #ccc;
            border-radius: 6px; box-sizing: border-box; font-size: 15px;
        }
        button { width: 100%; background: #8e44ad; color: white; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-size: 15px; margin-top: 18px; }
        button:hover { background: #7d3c98; }
        .error { color: #e74c3c; margin-top: 12px; font-size: 14px; }
        a { display: inline-block; margin-top: 16px; color: #8e44ad; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>🎓 Acceso de Alumnos</h2>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">⚠️ El mail ingresado no se encuentra en la base de datos.</p>
        <?php endif; ?>

        <form method="POST" action="verificar.php">
            <label for="mail">Mail institucional:</label>
            <input type="email" name="mail" id="mail" placeholder="alumno@utn.edu.ar" required>
            <button type="submit">Buscar</button>
        </form>

        <a href="bienvenida.php">→ Ir a la página de bienvenida</a>
    </div>
</body>
</html>
