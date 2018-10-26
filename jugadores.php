<?php
echo "<h1>EQUIPOS</h1>";

$conexion = mysqli_connect('192.168.100.211','root', 'pepeexterno', 'baloncestodb');

if(!$conexion){
    echo "Mo hay conexión.";
} else{
    echo "Tenemos conexión.";
}

echo "<br><br>";
echo "Listado de jugadores:";
$equipo = $_GET['equipo'];

// consulta de la tabla de Equipo
$consulta = mysqli_query($conexion, "SELECT nombre FROM Jugador WHERE equipo = '".$equipo."';");


// Consulta de los datos 
echo "<br><br>";
do{
    $nombres = mysqli_fetch_row($consulta);
    if (isset($nombres)){
    
    $consultaDos = mysqli_query($conexion, "SELECT dni FROM Jugador WHERE nombre = '".$nombres[0]."';");
    
    $dni = mysqli_fetch_row($consultaDos);

    echo "<form action='borrar.php?dni=".$dni[0]."' method='Post' name='cambiarEquipo'>";
    echo "<button class='btn'>Borrar</button> ".$nombres[0];

    $consultaTres = mysqli_query($conexion, "SELECT pais FROM Es WHERE jugador = '".$dni[0]."' AND nacido = 1;");
    
    $pais = mysqli_fetch_row($consultaTres);
    echo " ";
    echo $pais[0];

    if ($pais[0] == "") {
        echo "<br>";
    }else{
        echo "<img src='img/".$pais[0].".png' width='30px' height='30px'><br>";
    }
}
    echo "</form>";
}while($nombres != null);

echo "<br>";

//BUSCADOR
echo "<h3>BUSCAR JUGADOR</h3>";
echo "<form action='datos.php' method='POST'>";
echo "Nombre:  <input type='text' name='nombre'/> ";
echo "Peso:  <input type='number' name='peso' step='0.01'/> ";
echo "<input type='submit' name='envio' value='Enviar'/>";
echo "</form>";

/* if(!$consultaTres){
    echo "no va la consulta";
} else{
    echo "La consulta va";
}  */

?>