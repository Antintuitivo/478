<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == ""){
        session_destroy();
        echo "Usuario no autorizado";
        
        die();
    }

    $servername = "localhost";
    $username = "root"; //"tester1"
    $PasServer = ""; //"tester1"
    $dbname = "usuarios_registrados";

    $apellido = $_SESSION['Apellido'];
    $nombre = $_SESSION['Nombre'];
    $correo = $_SESSION['correo'];
    $user = $_SESSION['administrador'];


    $registro= "INSERT INTO `registros` (`Nombre`, `Apellido`, `Correo`, `Operacion`, `administrador`) 
    VALUES ('$nombre', '$apellido', '$correo', 'Egreso', '$user')";
    
    $conn = mysqli_connect($servername, $username, $PasServer, $dbname);

    if ($conn->query($registro)) {
        echo "Salida registrada";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    session_destroy();

    header("Location: http://localhost/RoldanTomas/index.html", true, 301);
?>