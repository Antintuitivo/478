<?php
 $correo = $_POST['Correo'];
 $Contr = $_POST['Pass'];
 $servername = "localhost";
 $username = "root"; //"tester1"
 $PasServer = ""; //"tester1"
 $dbname = "usuarios_registrados";

//  Conexión
if ($conexión = mysqli_connect($servername, $username, $PasServer, $dbname)){
 echo "<p>MySQL le ha dado permiso a PHP para a este usuario</p>";

 //  Preparar la orden SQL
 $consulta= "SELECT * FROM usuarios WHERE (Correo='$correo' AND Contra='$Contr') ";

 // Declaro variables para evitar errores inesperados
 mysqli_select_db($conexión, $dbname);
 $datos = mysqli_query ($conexión, $consulta);
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
    }
} //Compara el usuario ingresado con el de la tabla y redirecciona según si es usuario o Administrador
if(($correo == $corrTabla) && ($Contr == $passTabla) && ($userType == "1")){
    header("Location: http://10.0.250.250/RoldanTomas/paginaAdmin.html", true, 301);

} elseif(($correo == $corrTabla) && ($Contr == $passTabla) && ($userType == "0")){
    header("Location: http://10.0.250.250/RoldanTomas/paginaUsuario.html", true, 301);

} else{
    header("Location: http://10.0.250.250/RoldanTomas/ErrorDeLogin.html", true, 301);

}

?>