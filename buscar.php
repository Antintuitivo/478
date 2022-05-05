<?php
$nombre = $_POST['SNombre'];
$apellido = $_POST['SApellido'];
$correo = $_POST['SCorreo'];
$administrador = $_POST['SAdmin'];


 $servername = "localhost";
 $username = "tester1"; //"root"
 $password = "tester1"; //""
 $dbname = "usuarios_registrados";

// 1) Conexión
if ($conexión = mysqli_connect($servername, $username, $password, $dbname)){
echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario</p>";

// 2) Preparar la orden SQL
$consulta= "SELECT*FROM usuarios WHERE (Nombre like $nombre and Apellido like $apellido and Correo like $correo)";

// 3) Ejecutar la orden y obtener datos
mysqli_select_db($conexión,$dbname);
$datos= mysqli_query ($conexión,$consulta);

// 4) Ir Imprimiendo las filas resultantes
while ($fila =mysqli_fetch_array($datos)){
echo "<p>";
echo $fila ["id"];
echo "-"; // un separador
echo $fila["Nombre"];
echo "-"; // un separador
echo $fila ["Apellido"];
echo "-"; // un separador
echo $fila["Correo"];
echo "</p>";

}

}else{
echo "<p> MySQL no conoce ese usuario y contraseña</p>";
}
?>
