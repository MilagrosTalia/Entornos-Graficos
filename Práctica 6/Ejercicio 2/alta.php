<?php

  $Ciudad = $_POST['ciudad'];
  $Pais = $_POST['pais'];
  $Habitantes = (int) $_POST['habitantes'];
  $Superficie = (float) $_POST['superficie'];
  $Metro = $_POST['metro']; 

  $conexion = mysqli_connect('localhost', 'usuario', '' , 'Ciudades');

  $consulta = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, metro)
              VALUES ('$Ciudad','$Pais',$Habitantes, $Superficie, $Metro)";

  $resultado = mysqli_query($conexion, $consulta);

 
  if (mysqli_query($conexion, $consulta)) {
    echo "La ciudad fue dada de alta";
} else {
    echo "Error";
}



  