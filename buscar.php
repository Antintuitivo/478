<?php
$nombre = $_POST['SNombre'];
$apellido = $_POST['SApellido'];
$correo = $_POST['SCorreo'];
$administrador = $_POST['SAdmin'];


 $servername = "localhost";
 $username = "root"; //"tester1"
 $password = ""; //"tester1"
 $dbname = "usuarios_registrados";

// 1) Conexión
if ($conexión = mysqli_connect($servername, $username, $password, $dbname)){
echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario</p>";
}
// 2) Preparar la orden SQL
$consulta= "SELECT*FROM usuarios WHERE ";
if(!empty($nombre)){
    $consulta= $consulta + "Nombre like $nombre " ;
}

if(!empty($nombre) && !empty($apellido)){
    $consulta= $consulta + "and  ";
}

if(!empty($apellido)){
    $consulta= $consulta + "Apellido like $apellido ";
}

if((!empty($apellido) && !empty($correo)) || (!empty($correo) && !empty($nombre))){
    $consulta= $consulta + "and  ";
}

//si buscan según un correo, se agrega la línea
if(!empty($correo)){
    $consulta= $consulta + "Correo like $correo ";
}

//si es administrador además dde alguna de las anteriores, se agrega la línea
if((!empty($apellido) && !empty($administrador)) || (!empty($administrador) && !empty($nombre)) && (!empty($administrador) && !empty($correo))){
    $consulta= $consulta + "and  ";
}

if(!empty($administrador)){
    $consulta= $consulta + "administrador like $administrador";
}

// 3) Ejecutar la orden y obtener datos
mysqli_select_db($conexión,$dbname);
$datos= mysqli_query ($conexión,$consulta);

// 4) Ir Imprimiendo las filas resultantes
while ($fila = mysqli_fetch_array($datos)){
echo "<p> ";
echo $fila ["horario"];
echo " - "; // un separador
echo $fila["Nombre"];
echo " - "; // un separador
echo $fila ["Apellido"];
echo " - "; // un separador
echo $fila["Correo"];
echo " </p>";
echo "</br>";
}

if(!$fila || empty($fila)) {
echo "<p> MySQL no conoce ese usuario y contraseña</p>";
}
?>
