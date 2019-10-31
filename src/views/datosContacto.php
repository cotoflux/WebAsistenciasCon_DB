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
                <li><a href="datosContacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>

           <?php 
           foreach ($_SESSION["historial"] as $value): 
            ?>
          
            <?php
           endforeach;
    
    ?>
       </table>

       <div class="datosDeContacto">
           <h3>En caso que no vengas durante varias días, los datos de contacto que tiene FactoriaF5 ahora mismo son: </h3>
                           
                            <tr>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['date'] ?></td>
                            <td><?php echo $value['time'] ?></td> 
                            <tr>
                
               
        </div>

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