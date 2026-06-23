<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #ecf0f1; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); width: 320px; }
        h2 { text-align: center; color: #2c3e50; margin-top: 0; }
        label { display: block; margin-top: 14px; color: #555; font-size: 14px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin-top: 4px; border: 1px solid #ccc;
            border-radius: 6px; box-sizing: border-box; font-size: 15px;
        }
        button { width: 100%; background: #2980b9; color: white; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-size: 16px; margin-top: 20px; }
        button:hover { background: #2471a3; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>🔐 Iniciar Sesión</h2>
        <form method="POST" action="crear_sesion.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingresá tu usuario" required>

            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" placeholder="Ingresá tu clave" required>

            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
