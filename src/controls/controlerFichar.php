<?php
include '../models/Connect.php';
$conexion = new Connect();
$con = $conexion->connectBD();
$conversionRetrasosAFaltas;


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
{   
    session_start();
    $hora = date("H:i:sa");     
    $_SESSION['fecha']=$hora;
    $fecha = date("Y-m-d");
    $idUsuario = $_SESSION['identi'];
    $meteo=1;
   
    ficharADDBB($con,$fecha,$hora,$idUsuario,$meteo);
    comprobarFichaje($con,$fecha,$hora,$idUsuario);
}

function ficharADDBB($conn,$fecha,$hora,$idUsuario,$meteo){
  
        $sql= "INSERT INTO attendance (id_user,date,time,meteo) VALUES($idUsuario,CURDATE(),CURTIME(),1)";
        $result = mysqli_query($conn,$sql);
}

function comprobarFichaje($conn,$fecha,$horaDllegada,$idUsuario){
        $sql= "SELECT * FROM schedule";
        $insertarRetraso= "UPDATE attendance SET id_fault_type=2 WHERE id_user=$idUsuario AND date=CURDATE()";
        $insertarASuHora= "UPDATE attendance SET id_fault_type=1 WHERE id_user=$idUsuario AND date=CURDATE()";
        
        $result = mysqli_query($conn,$sql);
        $horaMaxRetraso="";
        $horaDLlegada= date_parse($horaDllegada);
        while ($hora = mysqli_fetch_array($result)) {
            $horaMaxRetraso=date_parse($hora["hour_start_1"]);
        }
     
        if ($horaMaxRetraso < $horaDLlegada) {            
          mysqli_query($conn,$insertarRetraso);
            echo 'Acabas de añadir un retraso a tu cuenta!';
            /* print_r($insertarRetraso);
            print_r ($insertarASuHora); */
        }
        if ($horaMaxRetraso >= $horaDLlegada) {
            mysqli_query($conn,$insertarASuHora);
            echo 'Bien has llegado a tu hora';
        }
      //  header("Location: ../views/viewUserProfile.php");
        
        $totalRetrasos= solicitudRetrasos($conn,$idUsuario);
        echo $totalRetrasos;

        $limite_retraso=solicitarNormativaFaltas($conn);

        $nuevasFaltas=ConversionRetrasosAFaltas($conn, $limite_retraso, $totalRetrasos);
        
        //actualizarRetrasos($conn,$idUsuario,$totalRetrasos);
}

function solicitudRetrasos($conn,$idUsuario)
{
    $obtenRetrasos = "SELECT COUNT(id_fault_type) as AA FROM attendance WHERE id_fault_type=2 and id_user=$idUsuario";
    $resultado=mysqli_query($conn,$obtenRetrasos);
    $totalR=0;
    foreach ($resultado as $value) {
        $totalR += $value["AA"];
    }
    echo "<br/>"."Cantidad de retrasos= ".$totalR."<br/>";
    return $totalR;
    //return $resultado;
   // var_dump($resultado);
}

function solicitarNormativaFaltas($conn)
{
    $baseRetraso = "SELECT limite_retraso FROM normativa_faltas";
    $limiteRetraso=mysqli_query($conn,$baseRetraso);
    $resultado = mysqli_fetch_array($limiteRetraso);
   // echo '----------->LIMITE RETRASO: '.$resultado['limite_retraso'];
    return $resultado['limite_retraso'];
}
function ConversionRetrasosAFaltas($conn, $limite_retraso, $totalRetrasos)
{
    $resultado = $totalRetrasos/$limite_retraso;
    echo "______Faltas: ".floor($resultado);
    return floor($resultado);

}