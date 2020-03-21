<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../administrador/login/");
    } else require_once('./../mysqli_connect.php');
?>
<html>

<head>
    <title>
        Bienvenido
    </title>
    <link rel="icon" type="image/png" href="../images/logo-escom-white.png" />
    <link rel="stylesheet" type="text/css" href="./../vendor/bootstrap/css/bootstrap.min.css">
    <script src="./../js/chart.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #BCB1EB;">
        <a class="navbar-brand" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">EIIS-ESCOM</a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">Inicio<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes/">Reportes </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/modificar/">Modificar</a>
                </li>
            </ul>
            <form class="my-2 my-lg-0 " action="logout.php" method="GET">
                <button class="btn btn-outline-success" type="submit"><a class="nav-link">Cerrar Sesion</a></button>
            </form>
        </div>
    </nav>
    <!-- END Navbar -->
    <br />
    <div class="container">
        <h1 class="display-4"> Bienvenido <b><?php echo $_SESSION['user']?></b></h1>
    </div>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h4>Examenes activos</h4>
                <h3 style="color: red">
                <?php 
                  $sql = "select COUNT(idExamen)as count from examen;";
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);
                  if($resultCheck>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo $row["count"];
                        }
                  } else echo "Ninguno";
                ?>
                </h3>
                <hr />
                <h4>Fechas de aplicación de examen</h4>
                  <?php
                   $sql = "select fecha from fecha;";
                   $result = mysqli_query($conn,$sql);
                   $resultCheck = mysqli_num_rows($result);
                   if($resultCheck>0){
                     while($row = mysqli_fetch_assoc($result)){
                         echo "<h5>".$row["fecha"]."</h5>";
                         }
                   } else echo "Sin fechas";
                  ?>
                <hr />
                <h4>Horarios de aplicacion de examen</h4>
                <?php
                   $sql = "select HoraInicio,HoraFinalización from horario;";
                   $result = mysqli_query($conn,$sql);
                   $resultCheck = mysqli_num_rows($result);
                   if($resultCheck>0){
                     while($row = mysqli_fetch_assoc($result)){
                         echo "<h5>".$row["HoraInicio"]."-".$row["HoraFinalización"]."</h5>";
                         }
                   } else echo "Sin fechas";
                  ?>
                <br />
                <button class="btn btn-primary btn-lg"
                    onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/';"
                    type="button">Configuración</button>
            </div>
            <div class="col-sm">
                <canvas id="barChar" width="350" height="300"></canvas>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Cupo</h1>
                <p class="lead">Grafica de alumnos inscritos en los examenes</p>
            </div>
        </div>
        <script>
            var ctx = document.getElementById('barChar').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['10/02/2020', '11/02/2020', '12/02/2020'],
                    datasets: [{
                        label: 'Grupos llenos',
                        data: [12, 5, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
</body>
</html>