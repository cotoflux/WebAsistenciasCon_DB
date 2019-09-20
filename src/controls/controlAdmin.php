<?php
    include_once "../models/Connect.php";
    session_start();
    $conexion = new Connect();
    $con = $conexion->connectBD();

    {
        
        $sql = "SELECT u.id, u.name,u.id_rol, a.date, a.time FROM users u join attendance a on(u.id = a.id_user) WHERE u.id_rol=1 AND a.date=CURDATE()";
        $lista=mysqli_query($con,$sql);
         var_dump($lista);
        $historialHoy = [];
        if (!$lista){
            echo "no se ejecuta";
        }
        while ($fila = mysqli_fetch_array($lista)) {
            array_push($historialHoy, $fila);
        }
        
        $_SESSION['historialDeHoy'] = $historialHoy;


       // var_dump($_SESSION['historialDeHoy']);
        

    header("Location: ../views/viewAdmin.php"); 
        
    }($con);

?>