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
                <li><a href="datosContacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        
    <div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#menu1">Coders que han Fichado Hoy</a></li>
    <li><a data-toggle="pill" href="#totalretrasos">Estado de Retrasos Totales por Coder</a></li>
    <li><a data-toggle="pill" href="#justificantes">Estado de los Justificantes</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="menu1" class="tab-pane fade active in">
      <h3>Listado Coders/Hora Fichaje</h3>
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
      <h3>Listado Total de Faltas/Retrasos</h3>
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
        <li class="active"><a data-toggle="pill" href="#justificantes_sin_validar">Listado para Validar/Desvalidar Justificantes</a></li>
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
                      <th>Validación justificante</th>
                      <th>Fecha</th>
                    </tr>
                    <?php 
                    foreach ($_SESSION['historialJustificantesValidadoUsuarios'] as $index => $value3) {
                      echo "<tr>";
                      echo "<td>".$value3['name']."</td>";
                      echo "<td>".$value3['last_name']."</td>";
                      echo "<td>".$value3['proof']."</td>";    
                      if(!$value3['validated_proof']){
                          echo "<td>
<a href='../controls/actualizaValidacionJustificantes.php?user_id=".$value3['id_user']."&validation=1&date=".$value3['date']."'>validar</a></td>";
                      }
                      else{                        
                        echo "<td>
                        <a href='../controls/actualizaValidacionJustificantes.php?user_id=".$value3['id_user']."&validation=0&date=".$value3['date']."'>desvaidar</a></td>";
                      } 
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
          <h3>Vista de Justificantes y Control de Validación</h3>
                    <table border=1>
                    <tr>
                      <th>Nombre</td>
                      <th>Apellido</td> 
                      <th>Justificante</td>
                      <th>Validación justificantel</th>
                      <th>Fecha</th>
                    </tr>
                    <?php 
                    foreach ($_SESSION['historialJustificantesValidadoUsuarios'] as $value4) {
                      echo "<tr>";
                      echo "<td>".$value4['name']."</td>";
                      echo "<td>".$value4['last_name']."</td>";
                      echo "<td><iframe src='../uploads/".$value4['proof']."'></iframe></td>";        
                      echo "<td>".$value4['validated_proof']."</td>";    
                      echo "<td>".$value4['date']."</td>"; 
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