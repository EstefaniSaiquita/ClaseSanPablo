<?php
$nro = [];
for ($i=1; $i <= 50 ; $i++) { 
  $nro[$i] = Rand(0, 100);
echo "<br>";
echo "$nro[$i]\n";
if ($nro[$i]== 5) {
   echo "se encontro el numero en la posicion $i ";
} else {
   echo "no se encontro el numero";
} 
};
