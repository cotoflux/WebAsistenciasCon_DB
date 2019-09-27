<?php
session_start();

$idUser = $_SESSION['identi'];

include '../src/models/Connect.php';
$conexion = new Connect();
$con = $conexion->connectBD();


$target_dir = "uploads/";
$fechaActual=$_POST["date"];
$fileToUpdate = basename( $_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $fileToUpdate;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $valTo = strval ($fileToUpdate);
    var_dump($valTo);
    //var_dump($valTo);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". var_dump($fileToUpdate). " has been uploaded.";
        $sql="UPDATE attendance SET proof='".$valTo."'WHERE id_user=$idUser and date='".$fechaActual."'";
        $result = mysqli_query($con,$sql);
        print_r($sql);
        $direction = "./views/viewUserProfile.php";
        header('Location: '.$direction);
        //echo "Gracias por subir tu justificiante en breve validaremos tu formulario";

    } else {
      //  echo "Sorry, there was an error uploading your file.";
    }
}

?>