<?php
session_start();

if (!isset($_SESSION["contador"])) {
  $_SESSION["contador"] = 1;
} else {
  $_SESSION["contador"]++;
}
?>

<html>

<body>
  <p>Estás en la página 1</p>
  <p>Páginas visitadas: <?php echo $_SESSION["contador"]; ?></p>
  <a href="pagina2.php">Ir a página 2</a>
</body>

</html>