<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == "" || $_SESSION['administrador'] == 0){
        session_destroy();
        echo "Usuario no autorizado";
        die();
    }

    $fecha = $_POST['SFecha'];
    $nombre = $_POST['SNombre'];
    $apellido = $_POST['SApellido'];
    $correo = $_POST['SCorreo'];
    $administrador = $_POST['SAdmin'];
    $tabla = $_POST['STabla'];

    $servername = "localhost";
    $username = "root"; //"tester1"
    $password = ""; //"tester1"
    $dbname = "usuarios_registrados";

// 1) Conexión
    if ($conn = mysqli_connect($servername, $username, $password, $dbname)){
    echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario</p>";
    }
// 2) Preparar la orden SQL
    // works only when all inputs are filled: $consulta = "SELECT * FROM registros WHERE (Nombre LIKE '$nombre' AND  Apellido LIKE '$apellido' AND  Correo LIKE '$correo' AND  administrador LIKE $administrador)";
    
    $consulta = "SELECT * FROM $tabla WHERE (";
    
    if(!empty($administrador)){
        $consulta .= "administrador = '$administrador'";
    }
    if(!empty($administrador) && !empty($nombre)){
        $consulta .= " and ";
    }
    if(!empty($nombre)){
        $consulta .= "Nombre = '$nombre'";
    }
    if((!empty($nombre)||!empty($administrador))&&!empty($apellido)){
        $consulta .= " and ";
    }
    if(!empty($apellido)){
        $consulta .= "Apellido = '$apellido'";
    }
    if((!empty($nombre)||!empty($administrador)||!empty($apellido))&&!empty($correo)){
        $consulta .= " and ";
    }
    if(!empty($correo)){
        $consulta .= "Correo = '$correo'";
    }
    if((!empty($nombre)||!empty($administrador)||!empty($apellido)||!empty($correo)) && !empty($fecha)){
        $consulta .= " and ";
    }
    if(!empty($fecha)){
        $consulta .= "Fecha = '$fecha'";
    }
    $consulta .= ")";

    $counter = 0;

// 3) Ejecutar la orden y obtener datos
    mysqli_select_db($conn,$dbname);
    $datos= mysqli_query ($conn,$consulta);

// 4) Ir Imprimiendo las filas resultantes
    while ($fila = mysqli_fetch_array($datos)){

   // echo "<header> Registros de ingresos y egresos de cuentas </header>";

    echo "<p> ";

    if($tabla == "registros"){

        echo $fila ["Fecha"];
        echo " - "; // un separador

        echo $fila ["Operacion"];
        echo " - "; // un separador
        
    }
        
    echo $fila["Nombre"];
    echo " - "; // un separador

    echo $fila ["Apellido"];
    echo " - "; // un separador

    echo $fila["Correo"];
    echo " - "; // un separador

    if($fila["administrador"]== 1){//revisa si es un administrador y responde en palabras
        echo "Administrador";
    }
    else{
        echo "Usuario";
    }

    echo " </p>";

    $counter++;

    echo "</br>";
    }
    if ($counter == 0){

        echo "No existe tal usuario en la base de datos";

    }
?>