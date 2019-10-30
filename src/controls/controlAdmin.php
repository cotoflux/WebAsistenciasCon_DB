<?php
    include "../models/Connect.php";
    $conexion = new Connect();
    $con = $conexion->connectBD();

    getAllCodersFichar($con);
    getAllCodersFF($con);
    controlJustificante($con);
    justificantesValidado($con);
    function getAllCodersFichar($con){
        
        $sql = "SELECT u.id, u.name,u.id_rol, a.date, a.time FROM users u join attendance a on(u.id = a.id_user) WHERE id_rol=1 AND date=CURDATE()";
        $lista=mysqli_query($con,$sql);
         //var_dump($lista);
        $historialHoy = [];
        if (!$lista){
            echo "no se ejecuta";
        }
        while ($fila = mysqli_fetch_array($lista)) {
            array_push($historialHoy, $fila);
        }
        
       $_SESSION['historialDeHoy'] = $historialHoy;
        
        //$_SESSION['historialTotalesUsuarios'] = $historialTotalesUsuarios;
        //var_dump($_SESSION['historialTotalesUsuarios']);
     
        

    //header("Location: ../views/viewAdmin.php"); 
        
    }//($con);
    function getAllCodersFF($con){
        $sql2 = "SELECT name, last_name, total_faltas, total_retrasos FROM users WHERE id_rol =1 and total_retrasos IS NOT NULL AND total_faltas is NOT NULL";
        $lista2=mysqli_query($con,$sql2);
        //var_dump($lista2);

        $historialTotalesUsuarios = [];
        if (!$lista2){
            echo "no se ejecuta";
        }
        while ($fila2 = mysqli_fetch_array($lista2)) {
            array_push($historialTotalesUsuarios, $fila2);
            //var_dump($fila2);
        }

        $_SESSION['historialTotalesUsuarios']=$historialTotalesUsuarios;
    }

    function controlJustificante($con){
        $sql3 = "SELECT * FROM `attendance` WHERE `proof` is not null and validated_proof= false";
        $lista3=mysqli_query($con,$sql3);
        //var_dump($lista2);

        $historialJustificantesUsuarios = [];
        if (!$lista3){
            echo "no se ejecuta";
        }
        while ($fila3 = mysqli_fetch_array($lista3)) {
            array_push($historialJustificantesUsuarios, $fila3);
            //var_dump($fila2);
        }

        $_SESSION['historialJustificantesUsuarios']=$historialJustificantesUsuarios;
    }
    
    function justificantesSinValidado($con){
        $sql3 = " SELECT u.name,u.username,u.last_name,u.id_rol,a.id_user,a.proof,a.validated_proof, a.date
        FROM users u join attendance a 
        on(u.id = a.id_user)
        WHERE u.id_rol=1";
        $lista3=mysqli_query($con,$sql3);
 

        $historialJustificantesUsuariosUplodaded = [];
        if (!$lista3){
            echo "no se ejecuta";
        }
        while ($fila3 = mysqli_fetch_array($lista3)) {
            array_push($historialJustificantesUsuariosUploaded, $fila3);
            //var_dump($fila2);
        }

        $_SESSION['historialJustificantesSinValidadoUsuarios']=$historialJustificantesUsuariosUploaded;
    }

    function justificantesValidado($con){
        $sql4 = "SELECT u.name,u.username,u.last_name,u.id_rol,a.id_user,a.proof,a.validated_proof, a.date
        FROM users u join attendance a 
        on(u.id = a.id_user)
        WHERE u.id_rol=1";
        $lista4=mysqli_query($con,$sql4);
        //SELECT u.name,u.username,u.last_name,a.id_user,a.proof,a.validated_proof FROM users u join attendance a on(u.id = a.id_user)

        $historialJustificantesUsuarios = [];
        if (!$lista4){
            echo "no se ejecuta";
        }
        while ($fila4 = mysqli_fetch_array($lista4)) {
            array_push($historialJustificantesUsuarios, $fila4);
            //var_dump($fila2);
        }

        $_SESSION['historialJustificantesValidadoUsuarios']=$historialJustificantesUsuarios;
    }
?>