/* Los dos codigos son equivalentes, ambos definen un array asocaciativo de dos maneras distintas
pero generan la misma salida */ 

2)a) 
 bar 
 true 

2)b) 

  5   
  9
  42

2)c) 

  No tiene salida por consola 
  Pero como ultimo paso elimina todo el array

3)a) 

  Has entrado en esta pagina a las 0 horas, con 1 minutos y 13 segundos, del 8/6/2026

3)b)

  5 + 6 = 11

4)  
*/ 

<?php

  function comprobar_nombre_usuario($nombre_usuario)
  {
      // Compruebo que el tamaño del string sea válido
      if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20)
      {
          echo $nombre_usuario . " no es válido<br>";
          return false;
      }

      // Compruebo que los caracteres sean los permitidos
      $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";

      for ($i = 0; $i < strlen($nombre_usuario); $i++)
      {
          if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false)
          {
              echo $nombre_usuario . " no es válido<br>";
              return false;
          }
      }

      echo $nombre_usuario . " es válido<br>";
      return true;
  }

 ?>

<?php
  echo comprobar_nombre_usuario('miliTalia');
?> 

<?php
  echo comprobar_nombre_usuario('mili.talia');
?>



