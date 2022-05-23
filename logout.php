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
    $user = $_SESSION['administrador']

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Logout</title>
</head>
<body>
    <h1 class="from-titulo">Logout</h1>
        <form action="index.html" method="post" class="form-register">
            <h2 class="form-titulo">¿Realmente desea salir?</h2>
            <center>
            <div class="contenedor-inputs">

                
                   <input type="submit" value="Salir" class="btn-enviar">
                    <br/>
                   <input type="submit" value="volver" formaction="paginaUsuario.php" class="btn-enviar">
              
            
            </div>
            </center>
        </form>
</body>
<?php
    $registro= "INSERT INTO `registros` (`Nombre`, `Apellido`, `Correo`, `Operación`, `administrador`) 
    VALUES ('$nombre', '$apellido', '$correo', 'Egreso', '$user')";
    
    if ($conn->query($registro)) {
        echo "Entrada registrada";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    session_destroy();
?>
</html>