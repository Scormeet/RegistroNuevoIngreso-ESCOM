<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../administrador/login/");
    }
?>
<html>

<head>
    <title>
        Bienvenido
    </title>
    <link rel="icon" type="image/png" href="../images/logoescom.png"/>
    <link rel="stylesheet" type="text/css" href="./../vendor/bootstrap/css/bootstrap.min.css">
    <script src="./../js/chart.js"></script>
</head>

<body>
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">EIIS-ESCOM</a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes/">Reportes </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/modificar/">Modificar</a>
                    </li>
                </ul>
                <form class="my-2 my-lg-0" action="logout.php" method="GET">
                    <li class="navbar-nav nav-item active">
                        <button type="submit"><a class="nav-link">Cerrar Sesion</a></button>
                    </li>
                </form>
            </div>
    </nav>
    <!-- END Navbar -->
    <br/>
    <div class="container">
        <h1 class="display-4"> Bienvenido <b><?php echo $_SESSION['user']?></b></h1>
    </div>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h4>Examenes activos <b>27</b></h4>
                <hr/>
                <h4>Fechas de aplicación de examen</h4>
                <h5>10/02/2020</h5>
                <h5>11/02/2020</h5>
                <h5>12/02/2020</h5>
            </div>
            <div class="col-sm">
                <canvas id="barChar" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <canvas id="doughnut" width="400" height="400"></canvas>
        </div>
        <div class="col-sm">

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

        var ctx2 = document.getElementById('doughnut').getContext('2d');
        var myPieChart = new Chart(ctx2, {
            type: 'pie',
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
;