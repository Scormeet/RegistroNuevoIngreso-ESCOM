<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../administrador/login/");
    } 
?>
<html>

<head>
    <title>
        Reportes
    </title>
    <link rel="icon" type="image/png" href="../../images/logoescom.png" />
    <link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <script src="./../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./../../js/reporte.js"></script>
    <script src="../../js/chart.js"></script>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/welcome.php">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes/">Reportes <span class="sr-only">(current)</span></a>
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
    <br />
    <div class="container">
        <h1 class="display-4">Reportes de los <b>exámenes</b><i class="fas fa-edit"></i></h1>
    </div>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <button class="btn btn-warning" onClick="showRegistry(1)" type="button">10 de Febrero</button>
            </div>
            <div class="col-sm">
                <button class="btn btn-warning" onClick="showRegistry(2)" type="button">11 de Febrero</button>
            </div>
            <div class="col-sm">
                <button class="btn btn-warning" onClick="showRegistry(3)" type="button">12 de Febrero</button>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <hr/>
    <div id="registros">
        <div id="1" class="container" style="display: none">
            <h3>10 de Febrero</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Salón</th>
                        <th scope="col">Cupos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>12:00-1:30</td>
                        <td>1010</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>1:30-3:00</td>
                        <td>1011</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>3:00-4:30</td>
                        <td>1012</td>
                        <td>14</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="2" class="container" style="display: none">
        <h3>11 de Febrero</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Salón</th>
                        <th scope="col">Cupos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">4</th>
                        <td>12:00-1:30</td>
                        <td>1010</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>1:30-3:00</td>
                        <td>1011</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>3:00-4:30</td>
                        <td>1012</td>
                        <td>14</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="3" class="container" style="display: none">
        <h3>12 de Febrero</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Salón</th>
                        <th scope="col">Cupos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">7</th>
                        <td>12:00-1:30</td>
                        <td>1010</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>1:30-3:00</td>
                        <td>1011</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>3:00-4:30</td>
                        <td>1012</td>
                        <td>14</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>