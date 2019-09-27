<?php
session_start();
include "../models/Connect.php";

$connexion = new Connect();
$con = $connexion->connectBD();
$idUser = $_SESSION['identi'];

function mostrarHistorialUsuario($con,$idUser)
{  
    $redirectUrl = '../views/viewPersonalUserHistory.php';
    $sql = "SELECT u.id, u.name, a.date, a.time, a.proof
    FROM users u join attendance a on(u.id = a.id_user)
    WHERE u.id = $idUser";
    $historial = [];
    $result = mysqli_query($con,$sql);
    if (!$result){
        echo "no se ejecuta";
    }
    while ($fila = mysqli_fetch_array($result)) {
        array_push($historial, $fila);
    }
    
    $_SESSION['historial'] = $historial;
    header('Location: '.$redirectUrl);
    
}

mostrarHistorialUsuario($con,$idUser);