<?php

$conexion = mysqli_connect('192.168.100.211','root', 'pepeexterno', 'baloncestodb');

$nombre = $_POST['nombre'];
$peso = $_POST['peso'];

$a = mysqli_real_escape_string($conexion, $nombre);
$b = mysqli_real_escape_string($conexion, $peso);

$consulta = mysqli_query($conexion, "SELECT * FROM Jugador WHERE nombre = '$a' AND peso = '$b';");
//$ejemplo = mysqli_fetch_row($consulta);

do{
    if($ejemplo = mysqli_fetch_row($consulta)){
        echo "OK";
    }else{
        echo "Sorry";
    }

}while($ejemplo = null);
?>