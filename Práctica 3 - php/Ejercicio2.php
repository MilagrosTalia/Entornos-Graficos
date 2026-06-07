/* 
  2)a) Los dos primeros son equivalentes ya que define la variable al principio y evalúa una condicion en el bucle y si se cumple 
  se incrementa la variable, en cambio el tercero es distinto porque primero incrementa la variable y despues la evalua en 
  un while

/* 

 2)b) Los siguientes códigos SI SON EQUIVALENTES. 

*/ 
<?php for ($i = 1; $i <= 10; $i++) {      print $i;  } ?> 

<?php for ($i = 1; $i <= 10; print $i, $i++) ; ?> 

<?php for ($i = 1; ;$i++) {      if ($i > 10) {          break;      }      print $i;  } ?> 

<?php  $i = 1;  for (;;) {      if ($i > 10) {          break;      }      print $i;      $i++;  } ?>  

/*
  2)c) Los siguientes códigos SI SON EQUIVALENTES. Uno evalua las igualdades con un if/ elif y el otro con un switch/case.

  <?php if ($i == 0) {     print "i equals 0"; } elseif ($i == 1) {     print "i equals 1"; } elseif ($i == 2) {     print "i equals 2"; } ?> 

  <?php switch ($i) {     case 0:         print "i equals 0";         break;     case 1:         print "i equals 1";         break;     case 2:         print "i equals 2";         break; } ?> 

/*