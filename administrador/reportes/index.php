<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../administrador/login/");
    } else require_once('./../../mysqli_connect.php');
?>
<html>
<head>
    <title>
        Reportes
    </title>
    <link rel="icon" type="image/png" href="../../images/logoescom.png" />
    <link rel="stylesheet" type="text/css" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/661a586d03.js" crossorigin="anonymous"></script>
    <script src="./../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./../../js/reporte.js"></script>
    <script src="./../../js/chart.js"></script>
    <script>
        window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #BCB1EB;">
        <a class="navbar-brand" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">EIIS-ESCOM</a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes/">Reportes <span
                            class="sr-only">(current)</span></a>
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
    <div class="container" align="center">
        <h1 class="display-4">Reportes de los <b>exámenes</b>&nbsp; &nbsp;<i class="fas fa-edit"></i></h1>
    </div>
    <hr />
    <br />
    <div class="container">
        <div class="row">
            <?php
            //Obtiene las fechas que se haran el examen
             $sql = "select fecha from fecha;";
             $resultFecha = mysqli_query($conn,$sql);
             $resultCheckFecha = mysqli_num_rows($resultFecha);
             $cont = 1;
             if($resultCheckFecha>0){
               while($row = mysqli_fetch_assoc($resultFecha)){
                    $fechasArray[]=$row;
                    echo "<div class='col-sm' align='center'>";
                    echo "<button class='btn btn-warning' onClick='showRegistry(".$cont.")' type='button'>".$row["fecha"]."</button>";
                    echo "</div>";
                    $cont++;
                   }
             } else echo "Sin fechas";
            ?>
        </div>
    </div>
    <br />
    <div id="registros">
        <?php
        //Genera la cantidad de registros por cada fecha
        for($i = 1; $i<$cont+1; $i++){
            echo "<div id='".$i."' class='container' style='display: none'>";
            echo "<div class='row'>";
            echo "<div class='col-sm'>";
            echo "<canvas id='barChar".$i."' width='150px' height='100px'></canvas>";
            echo "</div>";
            echo "<div class='col-sm'>";
            echo "<h3>".((object)($fechasArray[$i-1]))->fecha."</h3><br />"; //3423423423423432
            echo "<table class='table'>";
            echo "<thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Horario</th>
                    <th scope='col'>Salón</th>
                    <th scope='col'>Cupos</th>
                </tr>
                </thead>";
            echo "<tbody><tr>";
            //Genera las tablas con su informacion
            $sql = "select idExamen,fecha,horaInicio,horaFinalización,salon,cupos from examen INNER JOIN fecha ON examen.Fecha_idfecha = fecha.idfecha INNER JOIN horario ON examen.Horario_idHorario = horario.idhorario INNER JOIN salon ON examen.Salon_idSalon = salon.idSalon where fecha='".((object)($fechasArray[$i-1]))->fecha."';";
            $resultExamen = mysqli_query($conn,$sql);
            $resultCheckExamen = mysqli_num_rows($resultExamen);
            $cont = 1;
            if($resultCheckExamen>0){
                while($row = mysqli_fetch_assoc($resultExamen)){
                    echo "<th scope='row'>".$cont."</th>";
                    echo "<td>".$row["horaInicio"]."-".$row["horaFinalización"]."</td>";
                    echo "<td>".$row["salon"]."</td>";
                    echo "<td>".$row["cupos"]."</td>";
                    echo "</tr>";
                    $output[]=$row;
                    $cont++;
                    }
            } else echo "Sin fechas";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            //Generating Chart base to show empty
            echo "<script>
                var data".$i." = {
                    labels: ['Horario']
                }
                var ctx".$i." = document.getElementById('barChar".$i."').getContext('2d');
                var myChart".$i." = new Chart(ctx".$i.", {
                    type: 'bar',
                    data: data".$i.",
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
            </script>";
        }
        // Fill the charts generated before
        $sql = "select * from horario;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<script>";
            echo "var randomProperty = function (obj) {
                var keys = Object.keys(obj);
                return obj[keys[ keys.length * Math.random() << 0]];
            };";
            echo "var random = Math.floor(Math.random() * 100) + 1;";
            echo "var newDataset = {
                label: '".$row["HoraInicio"]."-".$row["HoraFinalización"]."',
                backgroundColor: randomProperty(chartColors),
                borderColor: 'white',
                borderWidth: 1,
                data: [random],
            }
            data1.datasets.push(newDataset);
            data2.datasets.push(newDataset)
            myChart1.update();;
            myChart2.update();";
            echo "</script>";
        }
        } else echo "Sin fechas";
        ?>
    </div>
</body>
<!-- <script>
    var ctx = document.getElementById('barChar1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['12:00-1:30', '1:30-3:00', '3:00-4:30', '4:30-6:00'],
            datasets: [{
                label: 'Grupos llenos1',
                data: [4, 12, 5, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
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
</script> -->
</html>