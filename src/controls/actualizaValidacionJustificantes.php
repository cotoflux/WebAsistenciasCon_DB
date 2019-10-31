<?php
    include "../models/Connect.php";
    $conexion = new Connect();
    $con = $conexion->connectBD();



getAllCodersFichar($con,$_GET['user_id'],$_GET['validation'],$_GET['date']);
function getAllCodersFichar($conn, $user_id,$validation,$date){
        
    $sql = "UPDATE attendance SET validated_proof=$validation WHERE id_user=$user_id and date='".$date."'";
    mysqli_query($conn,$sql);
    
    

    header("Location: ../views/viewAdmin.php"); 
}