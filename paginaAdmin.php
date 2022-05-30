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
      <link rel="stylesheet" href="css/estilos.css">
      <link rel="icon" href="imagenes/images_Wireless_Signal_Red.png">
      <meta charset="utf-8"/>
      <title>pagina admin</title>
      <meta name="autor" content="Roldan Tomas"/>
    </head>
   <body>
    <div class="left">
        <p class="no">algo</p>
      </div>
      
      <center>
        <div class="main">

          
          
          <h1 style="font-size:5vw" >Enlaces de administrador</h1>
          <a href="http://localhost/RoldanTomas/paginaUsuario.php"> <!--10.0.250.250-->
            <button class="btn-enviar" type="button" style="font-size:2vw">Página de Usuario</button>
          </a>
          <!-- <p class="exp">Encender Puerto 1</p> -->
          <a href="http://localhost/RoldanTomas/paginaBuscar.php">
            <button class="btn-enviar" style="font-size:2vw">Buscar Usuario</button>
          </a>
          <!--<p class="exp">Apagar Puerto 1</p>-->
          <a href="http://localhost/RoldanTomas/paginaSignup.php" target="_blank"> <!--10.0.250.250-->
            <button class="btn-enviar" style="font-size:2vw">Crear Nuevo Usuario</button>
          </a>
          <!--<p class="exp">Encender Puerto 4 por 5 seg</p>-->
          <a href="http://localhost/RoldanTomas/logout.php"> <!--10.0.250.250-->
            <button class="btn-enviar" style="font-size:2vw">Salir</button>
          </a>

        </div>
      </center>
      
      <div class="right">
        <p class="no">algo</p>
      </div>
      
   </body>
</html>