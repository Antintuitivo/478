<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "usuarios_registrados";

 $nombre = $_POST['nombre']; 
 $apellido = $_POST['apellido'];
 $correo = $_POST['correo'];

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Falló la connexión: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (Nombre, Apellido, Correo)
VALUES ('$nombre', '$apellido', '$correo')";

if ($conn->query($sql)) {
  echo "nuevo registro creado con éxito";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
