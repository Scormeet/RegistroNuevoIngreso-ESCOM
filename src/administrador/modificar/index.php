
<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../administrador/login/");
    }
?>
<html>
<head>
    <title>
        Modificar 
    </title>
    <link rel="icon" type="image/png" href="../../images/logoescom.png" />
    <link rel="stylesheet" type="text/css" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/661a586d03.js" crossorigin="anonymous"></script>
    <script src="./../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./../../js/reporte.js"></script>
    <script src="./../../js/chart.js"></script>
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
<br />
    <div class="container" align="center">
        <h1 class="display-4">MODIFICAR&nbsp; &nbsp;<i class="fas fa-edit"></i></h1>
    </div>
    <hr />
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios.php';" type="button">GRUPOS</button>
            </div>
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios.php';" type="button">HORARIOS</button>
            </div>
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios.php';" type="button">ASPIRANTES</button>
            </div>
        </div>
    </div>
    <br />
    



</body>



</html>