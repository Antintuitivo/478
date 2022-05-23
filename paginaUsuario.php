<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == ""){
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
        <title>Comandos</title>
        <meta name="autor" content="Roldan Tomas"/>
    </head>
   <body>
    <div class="left">
        <p class="no">ooo</p>
      </div>
      
      <center>
      <article class="main">

        
        
        <h1 style="font-size:5vw" >comandos</h1>
        <form>
          <button class="btn-enviar" type="submit" formaction="comandosraspi.php" style="font-size:2vw">Comando1</button>
          <button class="btn-enviar" type="submit" formaction="comandosraspi2.php" style="font-size:2vw">Comando2</button>
          <button class="btn-enviar" type="submit" formaction="comandosraspi3.php" style="font-size:2vw">Comando3</button>
        </form>

      </article>
      </center>
      
      <div class="right">
        <p class="no">algo</p>
      </div>
      
   </body>
</html>