<?php
session_start();
?>

<html>

  <body>
    <p>Has visitado <?php echo $_SESSION["contador"]; ?> páginas</p>
    <a href="pagina1.php">Volver</a>
  </body>

</html>