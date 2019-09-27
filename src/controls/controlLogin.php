<?php
include_once "../models/Connect.php";
$conexion = new Connect();
$con= $conexion->connectBD();
$student = $_POST["user"];
$student_pass = $_POST ["pass"];

$infoPersona = devuelveInfoPersonal($con, $student, $student_pass);


function devuelveInfoPersonal($con, $student, $student_pass)
{
    $sqlSentence = "SELECT * FROM users WHERE username = '$student' AND password ='$student_pass'";
    $result=mysqli_query($con, $sqlSentence);

    $a=array();
    foreach($result as $value){
        $a['id'] = $value['id'];
        $a['name'] = $value['name'];
        $a['id_schedule'] = $value['id_schedule'];
        //array_push($a,$value['id_schedule']);
        $idRol = $value['id_rol'];
        echo "adasdsad".$idRol; 
    }   

    session_start();
    
    $_SESSION['identi'] = $a['id'];
    $_SESSION['user'] = $a['name'];
    $_SESSION['horario'] = $a['id_schedule'];
    
    $redirectUrl = '../views/viewUserProfile.php';
    if($idRol==2)
    {
        $redirectUrl = '../views/viewAdmin.php';
        //$redirectUrl = 'controlAdmin.php';
        header("Location: $redirectUrl");   
    }
    
  

    header("Location: $redirectUrl");        
}



