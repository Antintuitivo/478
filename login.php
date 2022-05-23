<?php
session_start();

 // Guardar datos de sesión

 $correo = $_POST['Correo'];
 $Contr = $_POST['Pass'];

 $_SESSION['Pass'] = $correo;
 $_SESSION['correo'] = $Contr;

 $servername = "localhost";
 $username = "root"; //"tester1"
 $PasServer = ""; //"tester1"
 $dbname = "usuarios_registrados";

//  Conexión
if ($conn = mysqli_connect($servername, $username, $PasServer, $dbname)){
 echo "<p>MySQL le ha dado permiso a PHP para este usuario</p>";

 //  Preparar la orden SQL
 $consulta= "SELECT * FROM usuarios WHERE (Correo='$correo' AND Contra='$Contr') ";

 // Declaro variables para evitar errores inesperados
 mysqli_select_db($conn, $dbname);
 $datos = mysqli_query ($conn, $consulta);
 $userType = "0";
 $corrTabla = "";
 $passTabla = "";

 // Verifica si el usuario es parte de la Base de datos
    while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){

        $corrTabla = $fila['Correo'];
        //echo $corrTabla;

        $passTabla = $fila['Contra'];
        //echo $passTabla;
        //echo $Contr;

        if ($fila["administrador"] !=0){
            $userType = 1;
        }
        else{
            $userType = 0;
        }
        //echo $userType;

        $_SESSION['administrador'] = $userType;

        $apellido= $fila['Apellido'];
        
        $nombre = $fila['Nombre'];
    }

    $_SESSION['Apellido'] = $apellido;
    $_SESSION['Nombre'] = $nombre;

    $registro= "INSERT INTO `registros` (`Nombre`, `Apellido`, `Correo`, `Operación`, `administrador`) 
    VALUES ('$nombre', '$apellido', '$correo', 'Ingreso', '$userType')";

} //Compara el usuario ingresado con el de la tabla y redirecciona según si es usuario o Administrador
if(($correo == $corrTabla) && ($Contr == $passTabla) && ($userType == "1")){
    header("Location: http://localhost/RoldanTomas/paginaAdmin.php", true, 301);
    $conn->query($registro);

} elseif(($correo == $corrTabla) && ($Contr == $passTabla) && ($userType == "0")){
    header("Location: http://localhost/RoldanTomas/paginaUsuario.php", true, 301);
    $conn->query($registro);
    
} else{//expulsa al usuario si no coinciden los datos
    
    header("Location: http://localhost/RoldanTomas/ErrorDeLogin.html", true, 301);
    session_destroy();
    
}
?>