/* Ejercicio 1: 

  A) Variables y sus tipos: 
  - a --> Boolean
  - b , c --> String 
  - d, f, g --> integer 
  
  B) Operadores:
  Unario: ++
  Binario : + , * , +=
  Ternario : ? 

  C) Funciones y Parametros:
  gettype () - $a, $b, $c, $d
  function doble () - $i
  is_int() - $d
  is_string() - $a
  doble() - $d++


  D) Estructuras de control 

  if 

  E) Salida por consola

  booleanstringstringinteger1xyzxyz184444

/* 

<?php

function doble($i) {
    return $i * 2;
}

$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;

echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);

if (is_int($d)) {
    $d += 4;
}

if (is_string($a)) {
    echo "Cadena: $a";
}

$d = $a ? ++$d : $d * 3;
$f = doble($d++);
$g = $f += 10;

echo $a, $b, $c, $d, $f, $g;

?>