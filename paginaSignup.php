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
        <title>Formulario de registros</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h1 class="from-titulo">Formulario de registro</h1>
        <form action="signin.php" method="post" class="form-register">
            <h2 class="form-titulo">CREA UNA CUENTA</h2>   
            <div class="contenedor-inputs">
                <input type="text" name="nombre" placeholder="Nombre" class="input-48" required>
                
                <input type="text" name="apellido" placeholder="Apellido" class="input-48" required>
                
                <input type="email" name="correo" placeholder="Correo electrónico" class="input-100" required>
                
                <input type="password" name="Pass" placeholder="Contraseña" class="input-100" required>
                
                <br/>
                
                <input type="checkbox" name="admin" class="input-18">
                
                <p class="input-78">Permisos de administrador</p>
                
                <input type="submit" value="Registrar" class="btn-enviar" required>
            </div>
        </form>
    </body>
</html>