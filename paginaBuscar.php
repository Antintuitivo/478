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
        <title>Formulario de búsqueda</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1 class="from-titulo">Formulario de búsqueda</h1>
        <form action="registrar.php" method="post" class="form-register">
            <h2 class="form-titulo">BUSCA UNA CUENTA</h2>   
            <div class="contenedor-inputs">
                <input type="text" name="SNombre" placeholder="Nombre" class="input-48">
                <input type="text" name="SApellido" placeholder="Apellido" class="input-48">
                <input type="text" name="SCorreo" placeholder="Correo electrónico" class="input-78">
                <input type="checkbox" name="SAdmin" class="input-18">
                <input type="submit" value="Buscar" class="btn-enviar">
            </div>
        </form>
    </body>
</html>