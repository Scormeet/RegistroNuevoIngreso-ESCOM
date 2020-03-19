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
    <link rel="stylesheet" type="text/css" href="./../vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./welcome.php"">EIIS-ESCOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="./welcome.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./reportes.php">Reportes </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./modificar.php">Modificar</a>
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

    <h1> Bienvenido <?php echo $_SESSION['user']?></h1>
    <hr/>
</body>
</html>
;