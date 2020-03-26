

<html>
<head>
    <title>
        Modificar 
    </title>
    <link rel="icon" type="image/png" href="/RegistroNuevoIngreso-ESCOM/images/logo-escom-white.png" />
    <link rel="stylesheet" type="text/css" href="/RegistroNuevoIngreso-ESCOM/vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/661a586d03.js" crossorigin="anonymous"></script>
    <script src="/RegistroNuevoIngreso-ESCOM/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/RegistroNuevoIngreso-ESCOM/js/reporte.js?6"></script>
    <script src="/RegistroNuevoIngreso-ESCOM/js/chart.js"></script>
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F5EEF8;">
        <a class="navbar-brand" href="/RegistroNuevoIngreso-ESCOM/administrador">EIIS-ESCOM</a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>   

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link"
                    href="/RegistroNuevoIngreso-ESCOM/administrador">Inicio<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/reportes">Reportes </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/RegistroNuevoIngreso-ESCOM/administrador/modificar">Modificar</a>
                </li>
                </ul>
            <form class="my-2 my-lg-0 " action="/RegistroNuevoIngreso-ESCOM/src/administrador/logout.php" method="GET">
                <button class="btn btn-outline-info" type="submit"><a class="nav-link">Cerrar Sesión</a></button>
            </form>

        </div>
    </nav>
    <!-- end navbar-->
<br />
    <div class="container" align="center">
        <h1 class="display-4">MODIFICAR&nbsp; &nbsp;<i class="fas fa-edit"></i></h1>
    </div>
    <hr />
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios';" type="button">GRUPOS</button>
            </div>
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="cargarDatos();" type="button">HORARIOS</button>
            </div>
            <div class="col-sm" align="center">
                <button class="btn btn-warning" onclick="location.href = '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios';" type="button">ASPIRANTES</button>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div id="horario" class="row">
            
            <script>
                function cargarDatos(){
                   
                $.ajax(
                    '/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/horarios.php',
                    {
                        success: function (data) {
                            $('#horario').html(data);
                        },
                        error: function () {
                            alert('There was some error performing the AJAX call!');
                        }
                    }
                );
                }
                /*$.ajax(
                    '/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/modifica.php',
                    {
                        success: function (data) {
                            $('#horario').html(data);
                        },
                        error: function () {
                            alert('There was some error performing the AJAX call!');
                        }
                    }
                );
                // setInterval(function () {
                    // $('#fechas').load("active_fechas.php").fadeIn("slow");
                // }, 100);*/
            </script>
        </div>
    </div>
    <br />



</body>



</html>