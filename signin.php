<?php
//Variables
 $servername = "localhost";
 $username = "tester1"; //"root"
 $password = "tester1"; //""
 $dbname = "usuarios_registrados";

 $nombre = $_POST['nombre']; 
 $apellido = $_POST['apellido'];
 $correo = $_POST['correo'];
 $Pas = $_POST['Pass'];
 $Admin = 0;
 if (!empty($_POST['admin'])){
 $Admin = 1;
 }


// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Falló la connexión: " . $conn->connect_error);
}

$sql = "INSERT INTO `usuarios` (`Nombre`, `Apellido`, `Correo`, `Contra`, `administrador`) 
VALUES ('$nombre', '$apellido', '$correo', '$Pas', '$Admin')";

if ($conn->query($sql)) {
  echo "nuevo registro creado con éxito";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
