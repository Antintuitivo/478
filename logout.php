<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == ""){
        session_destroy();
        header("Location: http://localhost/RoldanTomas/index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <h1 class="from-titulo">Logout</h1>
        <form action="index.html" method="post" class="form-register">
            <h2 class="form-titulo">¿Realmente desea salir?</h2>
            <div class="contenedor-inputs">
                <ul>
                    <tr><td><input type="submit" value="Salir" class="btn-enviar"></td></tr>
                    <br/>
                    <tr><td><input type="submit" value="volver" formaction="paginaUsuario.php" class="btn-enviar"></td></tr>
                </ul>
            </div>
        </form>
</body>
<?php
    $registro= "INSERT INTO `registros` (`Nombre`, `Apellido`, `Correo`, `Operación`, `administrador`) 
    VALUES ('$nombre', '$apellido', '$correo', 'Egreso', '$userType')";
    
    if ($conn->query($registro)) {
        echo "Entrada registrada";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    session_destroy();
?>
</html>