<html>

<head>
    <title>
        Horarios
    </title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../images/logo-escom-white.png" />
    <link rel="stylesheet" type="text/css" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../../images/logoescom.png" />
    <style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  .boton_personalizado:hover{
    color: #1883ba;
    background-color: #ffffff;
  }
  .tabla{
    display: table;
    width: 400px;
  }
  .columna1{
    display: table-cell;
    width: 120px;
    height: 20px;
  }
  </style>

    <script src="https://kit.fontawesome.com/661a586d03.js" crossorigin="anonymous"></script>
    <script src="./../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./../../js/reporte.js?6"></script>
    <script src="./../../js/chart.js"></script>
    <script>
        window.chartColors = {
            red: 'rgb(255, 121, 121)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(247, 255, 121)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)',
            brown: 'rgb(240, 127, 103)',
            green: 'rgb(171, 254, 115)',
            turquish: 'rgb(230, 121, 255)'
        };
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F5EEF8;">
        <a class="navbar-brand" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome/welcome.html">EIIS-ESCOM</a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link"
                        href="/RegistroNuevoIngreso-ESCOM/administrador/welcome/welcome.html">Inicio<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes/">Reportes </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/modificar/">Modificar</a>
                </li>
            </ul>
            <form class="my-2 my-lg-0 " action="./../logout.php" method="GET">
                <button class="btn btn-outline-info" type="submit"><a class="nav-link">Cerrar Sesion</a></button>
            </form>

        </div>
    </nav>

    <div class="container" align="center">
        <h1 class="display-4">Horarios&nbsp; &nbsp;<i class="fas fa-edit"></i></h1>
    </div>

    <div class align="left">
        <h1 class="display-4">Horarios Actuales&nbsp; &nbsp;<i class></i></h1>
    </div>
<?php
    require_once('./../../mysqli_connect.php');
    
    //Obtiene las fechas que se haran el examen
    $sql = "select * from horario;";
    $resultFecha = mysqli_query($conn,$sql);
    $resultCheckFecha = mysqli_num_rows($resultFecha);
    $cont = 1;
    if($resultCheckFecha>0){

        echo  "<div>";
        while($row = mysqli_fetch_assoc($resultFecha)){
            $fechasArray[]=$row;
            echo  "<div>";
                echo "<div class='columna1' align='center'>".$row ["idHorario"]."</div>";
                echo "<div  class='columna1' align='center'>".$row ["HoraInicio"]."</div>";
                echo "<div class='columna1' align='center'>".$row ["HoraFin"]."</div>";
                echo "<div class='columna1' align='center'><a  href='eliminar.php?id=".$row["idHorario"]."'> <img src='1.png' width='30' height='30' ></a> &nbsp;<a  href='eliminar.php?id=".$row["idHorario"]."'> <img src='ajustes.png' width='40' height='45'></a>";
            echo "</div>";
            
            $cont++;
        }
        echo "</div>";
    } else echo "Sin fechas";

?>

