<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == ""){
        session_destroy();
        echo "Usuario no autorizado";
        
        die();
    }

    $apellido = $_SESSION['Apellido'];
    $nombre = $_SESSION['Nombre'];
    $correo = $_SESSION['correo'];
    $user = $_SESSION['administrador'];


    $registro= "INSERT INTO `registros` (`Nombre`, `Apellido`, `Correo`, `Operacion`, `administrador`) 
    VALUES ('$nombre', '$apellido', '$correo', 'Egreso', '$user')";
    

    if ($conn->query($registro)) {
        echo "Salida registrada";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    session_destroy();

    header("Location: http://localhost/RoldanTomas/index.html", true, 301);
?>