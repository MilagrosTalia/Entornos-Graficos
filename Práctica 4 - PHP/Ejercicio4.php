/* Indicar las salidas que produce el siguiente código. Justificar. 

La salida será 

'El 
El clavel blaco 

Esto sucede porque en el primer eco las variables $flor y $color no es tan definidas aun luego en el include llama al archivo
datps.php donde estan definidas las variables, produciendo así la salida correcta */ 

<?php echo "El $flor $color \n";  include 'datos.php'; echo " El $flor $color";  ?>  