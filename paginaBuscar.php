<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == "" || $_SESSION['administrador'] == 0){
        session_destroy();
        echo "Usuario no autorizado";
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario de búsqueda</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h1 class="from-titulo">Formulario de búsqueda</h1>
        <form action="buscarconnect.php" method="post" class="form-register">
            <h2 class="form-titulo">BUSCA UNA CUENTA</h2>   
            <div class="contenedor-inputs">

                <select name="STabla" class="input-100">
                    
                    <option value="registros">Registros de operaciones</option>

                    <option value="usuarios">Usuarios registrados</option>

                </select>

                <input type="text" name="SNombre" placeholder="Nombre" class="input-48">

                <input type="text" name="SApellido" placeholder="Apellido" class="input-48">

                <input type="text" name="SCorreo" placeholder="Correo electrónico" class="input-100">

                <select name="SAdmin" class="input-100">

                    <option value="0">Usuario</option>

                    <option value="1">Administrador</option>

                </select>

                <input type="submit" value="Buscar" class="btn-enviar">

            </div>
        </form>
    </body>
</html>