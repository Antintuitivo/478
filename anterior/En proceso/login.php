<?php
 $nombre = $_POST['SNombre'];
 $apellido = $_POST['SApellido'];
 $correo = $_POST['SCorreo'];
 $administrador = $_POST['SAdmin'];

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "usuarios_registrados";

// 1) Conexión
if ($conexión = mysql_connect($servername, $username, $password, $dbname)){
 echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario</p>";

// 2) Preparar la orden SQL
 $consulta= "SELECT*FROM usuarios";

// 3) Ejecutar la orden y obtener datos
 mysql_select_db($dbname);
 $datos= mysql_query ($consulta);

// 4) Ir Imprimiendo las filas resultantes
 while ($fila =mysql_fetch_array($datos)){
 echo "<p">;
 echo $fila ["Correo"];
 echo "-"; // un separador
 echo $fila["Nombre"];
 echo "-"; // un separador
 echo $fila ["Apellido"];
 echo "-"; // un separador
 echo $fila["Pass"];
 echo "-";
 if ( $fila["admin"] == true){
    echo "Administrador";
 }
 else{
    echo "Usuario";
 } 
 echo "</p>";
}

}else{
 echo "<p> MySQL no conoce ese usuario y contraseña</p>";
}
?>
