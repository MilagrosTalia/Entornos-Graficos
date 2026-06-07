<!-- 3)a) Crea una tabla HTML con ancho del 90% y borde de 1px.
Define $row = 5 y $col = 2, o sea 5 filas y 2 columnas.
El primer for recorre las filas, de 1 hasta 5. En cada vuelta abre un <tr> (fila).
El segundo for (anidado dentro del primero) recorre las columnas, de 1 hasta 2. En cada vuelta inserta una celda <td> con &nbsp; que es un espacio en blanco en HTML, para que la celda no quede vacía.
Cuando termina el for de columnas, cierra el </tr> (la fila).
Cuando termina el for de filas, cierra el </table>.

El resultado es una tabla de 5 filas x 2 columnas con celdas vacías.-->


<html>

<head>
  <title>Documento 1</title>
</head>

<body>
  <?php
    echo "<table width='90%' border='1'>";
    
    $row = 5;
    $col = 2;
    
    for ($r = 1; $r <= $row; $r++) {
        echo "<tr>";
        
        for ($c = 1; $c <= $col; $c++) {
            echo "<td>&nbsp;</td>\n";
        }
        
        echo "</tr>\n";
    }
    
    echo "</table>\n";
  ?>
</body>

</html>

