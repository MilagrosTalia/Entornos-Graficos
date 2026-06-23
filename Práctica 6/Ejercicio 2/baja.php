<?php

  $eliminar = $_POST['eliminar'];

  $conexion= mysqli_connect ('localhost', 'usuario', '', 'Ciudades');

  $consulta = "Select * from ciudades where id = $eliminar";

  $resultado = mysqli_query($conexion, $consulta); 

  if( mysqli_num_rows($resultado) == 0){
    echo 'No existe el usuario que desea eliminar, verifique la infomacion';
  }
    else{
      $consulta = "Delete from ciudades where id = $eliminar";
      echo 'el usuario a sido eliminado';

      mysqli_query($conexion, $consulta);

      mysqli_free_result($resultado);
    
      mysqli_close($conexion);
   }

