<?php 
    session_start();
    if ($_SESSION['correo'] == "" || $_SESSION['Pass'] == "" || $_SESSION['administrador'] == 0){
        session_destroy();
        echo "Usuario no autorizado";
        die();
    }

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
?>
<script>

    let administrador = <?php $administrador ?>;
    let nombre = <?php $nombre ?>
    
    let consulta = "SELECT * FROM " + <?php $tabla ?>;

    if ( administrador == 0){
        consulta += " WHERE (administrador = 0 ";
    }
    else if(administrador == 1){
        consulta += " WHERE (administrador = 1 ";
    }
    else{
        consulta += " WHERE ("
    }
    if (administrador == ""){

    }





</script>

<?php
    if($administrador == 0){

        
        if (!empty($nombre) && empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and administrador = 0)";
            
        }
        if(empty($nombre) && !empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Apellido LIKE '$apellido' and administrador = 0)";
            
        }    
        if(empty($nombre) && empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Correo LIKE '$correo' and administrador = 0)";
            
        }
        if (!empty($nombre) && !empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre'and Apellido like '$apellido' and administrador = 0)";
            
        }
        if (!empty($nombre) && empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and Correo LIKE '$correo' and administrador = 0)";
            
        }
        if (empty($nombre) && !empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Apellido like '$apellido' and Correo LIKE '$correo' and administrador = 0)";
            
        }
        if (!empty($nombre) && !empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and Apellido like '$apellido' and Correo LIKE '$correo' and administrador = 0)";
            
        }
    
    }
    else{

        if (!empty($nombre) && empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and administrador = 1)";
            
        }
        if(empty($nombre) && !empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Apellido LIKE '$apellido' and administrador = 1)";
            
        }    
        if(empty($nombre) && empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Correo LIKE '$correo' and administrador = 1)";
            
        }
        if (!empty($nombre) && !empty($apellido) && empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre'and Apellido like '$apellido' and administrador = 1)";
            
        }
        if (!empty($nombre) && empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and Correo LIKE '$correo' and administrador = 1)";
            
        }
        if (empty($nombre) && !empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Apellido like '$apellido' and Correo LIKE '$correo' and administrador = 1)";
            
        }
        if (!empty($nombre) && !empty($apellido) && !empty($correo)){
            
            $consulta = "SELECT * FROM $tabla WHERE (Nombre LIKE '$nombre' and Apellido like '$apellido' and Correo LIKE '$correo' and administrador = 1)";
            
        }

    }
    
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

    echo "</br>";
    }

    if(empty($fila)) {
    echo "<p> MySQL no conoce ese usuario y contraseña</p>";
    }
?>