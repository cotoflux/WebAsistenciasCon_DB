<?php
    session_start();
    include "../controls/controlAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/profileUserHistory.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Bienvendido Administrador</title>
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
        
    <div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#menu1">Listado de Today</a></li>
    <li><a data-toggle="pill" href="#totalretrasos">Listado Retrasos Totales</a></li>
    <li><a data-toggle="pill" href="#justificantes">Listado Justificantes</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="menu1" class="tab-pane fade active in">
      <h3>Listado de Today</h3>
      <table border=1>
           <tr>
            <th>Nombre</td>
            <th>Dia</td> 
            <th>Hora</td>
           </tr>
           <?php 
           
         foreach ($_SESSION['historialDeHoy'] as $value) {
              //var_dump($_SESSION["historialDeHoy"]);
            echo "<tr>";
            echo "<td>".$value['name']."</td>";
            echo "<td>".$value['date']."</td>";
            echo "<td>".$value['time']."</td>";           
            echo "</tr>";
           } 
        //    while ($fila = mysqli_fetch_array($result)) {
        //     echo "<td>".$fila['id']."</td>";
        // }
    ?>
       </table>


    </div>




    <div id="totalretrasos" class="tab-pane fade">
      <h3>Listado Retrasos totales</h3>
      <table border=1>
           <tr>
            <th>Nombre</td>
            <th>Apellido</td> 
            <th>Total Faltas</td>
            <th>Total Retrasos</th>
           </tr>
           <?php 
           foreach ($_SESSION['historialTotalesUsuarios'] as $value2) {
            echo "<tr>";
            echo "<td>".$value2['name']."</td>";
            echo "<td>".$value2['last_name']."</td>";
            echo "<td>".$value2['total_faltas']."</td>";        
            echo "<td>".$value2['total_retrasos']."</td>";    
            echo "</tr>";
           }
        //    while ($fila = mysqli_fetch_array($result)) {
        //     echo "<td>".$fila['id']."</td>";
        // }
    ?>
       </table>
  </div>

    <div id="justificantes" class="tab-pane fade">
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#justificantes_sin_validar">Listado de Today</a></li>
        <li><a data-toggle="pill" href="#justificantes_validados">Listado Retrasos Totales</a></li>
      </ul>
  
      <div class="tab-content">
          <div id="justificantes_sin_validar" class="tab-pane fade">
            
                    <h3>Listado de justificantes pendientes de validar</h3>
                    <table border=1>
                    <tr>
                      <th>Nombre</td>
                      <th>Apellido</td> 
                      <th>Justificante</td>
                      <th>Validación justificantel</th>
                      <th>Fecha</th>
                    </tr>
                    <?php 
                    foreach ($_SESSION['historialJustificantesUsuarios'] as $value3) {
                      echo "<tr>";
                      echo "<td>".$value3['name']."</td>";
                      echo "<td>".$value3['last_name']."</td>";
                      echo "<td>".$value3['proof']."</td>";        
                      echo "<td>".$value3['validated_proof']."</td>";    
                      echo "<td>".$value3['date']."</td>"; 
                      echo "</tr>";
                    }
                  //    while ($fila = mysqli_fetch_array($result)) {
                  //     echo "<td>".$fila['id']."</td>";
                  // }
              ?>
                </table>  
          </div>
          <div id="justificantes_validados" class="tab-pane fade">
          <h3>Listado de justificantes Validados</h3>
                    <table border=1>
                    <tr>
                      <th>Nombre</td>
                      <th>Apellido</td> 
                      <th>Justificante</td>
                      <th>Validación justificantel</th>
                      <th>Fecha</th>
                    </tr>
                    <?php 
                    foreach ($_SESSION['historialJustificantesUsuarios'] as $value3) {
                      echo "<tr>";
                      echo "<td>".$value3['name']."</td>";
                      echo "<td>".$value3['last_name']."</td>";
                      echo "<td>".$value3['proof']."</td>";        
                      echo "<td>".$value3['validated_proof']."</td>";    
                      echo "<td>".$value3['date']."</td>"; 
                      echo "</tr>";
                    }
                  //    while ($fila = mysqli_fetch_array($result)) {
                  //     echo "<td>".$fila['id']."</td>";
                  // }
              ?>
                </table>  
          </div>
      </div>
   
  </div>
</div>

    </main>
    <footer>
        <div class="bottom-info">
            <p>@2019 <span>Spicy Banana</span> from <span>FactoriaF5.</span></p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>