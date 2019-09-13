<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/userProfile.css">
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
        <div class="mid-left">
            <div class="student-profile">
                <p id="pa1">ID: <?php echo $_SESSION['identi']; ?></p>
                <p id="pa2">Bienvenid@: <?php echo $_SESSION['user']; ?></p>
                <p id="pa3">Tipo horario: <?php echo $_SESSION['horario']; ?></p>
                <p>Fecha: <?php echo date("Y-m-d")?></p>
                <p>Hora: <?php echo date("h:i:sa")?></p>
            </div>
        </div>
        <div class="mid-right">

            <div class="risk-level">
                <div class="green risk-signal"></div>
                <div class="yellow risk-signal"></div>
                <div class="red risk-signal"></div>
            </div>
           <!--  <div class="student-buttom">
                <button type="button" class="pass-list button-style" action="../controls/controlerFichar.php" method="post">Fichar</button>
                <button type="button" class="record button-style">Historial</button>

            </div> -->
            <form action="../controls/controlerFichar.php" method="post" id="button_fichar">
                <input type="submit" name="someAction" value="FICHAR"/>
            </form>
            <form action="../controls/controlHistorialUsuario.php" method="post" id="button_fichar">
                <input type="submit" name="someAction" value="HISTORIAL" id="historial"/>
            </form>
        </div>

    </main>
    <footer>
        <div class="bottom-info">
            <p>@2019 <span>Spicy Banana</span> from <span>FactoriaF5.</span></p>
        </div>
    </footer>
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 -->    <script src="viewShowProfile.js"></script>
</body>

</html>