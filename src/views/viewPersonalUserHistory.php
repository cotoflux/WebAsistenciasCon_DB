<?php
//include "../controls/controlHistorialUsuario.php";

session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/profileUserHistory.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <title>User Window</title>
</head>

<body>
    <header>
        <div class="logo">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="">Contacto</a></li>
                <li><a href="">Idioma</a></li>
                <li><a href="">Seguridad</a></li>
                <li><a href="">FAQ</a></li>
            </ul>
        </nav>
    </header>
    <main>
       <table border=1>
           <tr>
            <th>Nombre</td>
            <th>Dia</td> 
            <th>Hora</td>
            <th>Justificar</td>
           </tr>
           <?php 
           foreach ($_SESSION["historial"] as $value): 
            ?>
            <tr>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['date'] ?></td>
            <td><?php echo $value['time'] ?></td>   
                <td>
                    <form action="../upload.php" method="post" enctype="multipart/form-data">
                    Justifica tu falta:
                    <input type='hidden' name='date' value='<?php echo $value['date'];?>'/> 
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                    </form>         
                </td>
            </tr> 
            
            <?php
           endforeach;
           
        //    while ($fila = mysqli_fetch_array($result)) {
        //     echo "<td>".$fila['id']."</td>";
        // }
    ?>
       </table>

    </main>
    <footer>
        <div class="bottom-info" <?php ?>>
            <p>@2019 <span>Spicy Banana</span> from <span>FactoriaF5.</span></p>
            <?php
            //  for($i = 0 ; $i < count($_SESSION['student']) ; $i++) {
            //     echo $_SESSION['student'][$i];
            //     } 
            ?>
        </div>
    </footer>
</body>

</html>