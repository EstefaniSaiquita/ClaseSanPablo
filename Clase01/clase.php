<?php
$nro=1 //variable global
function mostrar (){
    $nro= 2;
    $nro= 3;
    echo $nro;
}
echo $nro;
mostrar();
?>

<?php//segundo ejercicio
function incrementar(){
    static $estatica1 = 1; //var estatica
    $estatica++;
    echo $estatica."</br>";
}
incrementar();
incrementar();
incrementar();
?>