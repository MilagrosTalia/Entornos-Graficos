<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

mail($nombre, $email, $comentario, $headers);

echo ('El mail ha sido enviado con exito');



$vSql = "SELECT * FROM doc_utn";
$vResultado = mysqli_query($link, $vSql);
$total_registros = mysqli_num_rows($vResultado); ?> <table border=1>
  <tr>
    <td><b>Usuario</b></td>
    <td><b>DNI</b></td>
    <td><b>Email</b></td>
  </tr> <?php while ($fila = mysqli_fetch_array($vResultado)) { ?> <tr>
      <td><?php echo ($fila['apel_nom']); ?></td>
      <td><?php echo ($fila['dni']); ?></td>
      <td><?php echo ($fila['email']); ?></td>
    </tr>
    <tr>
      <td colspan="5"> <?php } // Liberar conjunto de resultados mysqli_free_result($vResultado);  // Cerrar la conexion mysqli_close($link); 
                        ?> </td>
    </tr>
</table>
<p>&nbsp;</p>
<p align="center"><a href="Menu.html">Volver al menu; del ABM</a></p>
</body>

</html>