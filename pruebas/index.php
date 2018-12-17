<?php
echo "<h1>Bienvenido</h1>";
// establecer conexión con la base de datos
$conexion = mysqli_connect('192.168.100.211','root', 'pepeexterno', 'baloncestodb');
echo "<br>";

// sencilla comprobación si tiene conexión
if(!$conexion){
    echo "No hay conexión.";
} else{
    echo "Tenemos conexión.";
    echo "<br>";
}

// consulta basica de la tabla de Equipo 
$resultado = mysqli_query($conexion, "SELECT nombre FROM Equipo");
echo "<br>";

// recorrer los datos de la consulta y muestra el resultado
do{
    $equipo = mysqli_fetch_row($resultado);
    echo "<a href='jugadores.php?equipo=".$equipo[0]."'>".$equipo[0]."</a>";
    echo "<br>";

}while($equipo != null);
/* sencilla comprobación si la consulta funciona
echo "<br>";
if(!$resultado){
    echo " no funciona la consulta";
}else{
    echo " funciona la consulta";
}
echo "<br><br>";*/

// cerrar conexión de la base de datos
mysqli_close($conexion);
?>