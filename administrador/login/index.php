<html>
<head>
    <title>Login</title>
    <link rel="icon" type="image/png" href="../../images/logo-escom-white.png"/>
    <link rel="stylesheet" type="text/css" href="./../../css/login.css">
    <link rel="stylesheet" type="text/css" href="./../../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/661a586d03.js" crossorigin="anonymous"></script>
</head>

<body class="body-background">
    <div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-6 col-xs-12 div-style">
                <a class="link " href="/RegistroNuevoIngreso-ESCOM/">Regresar</a>
            <form action="./login.php" method="POST">
                <div class="d-flex justify-content-center mx-auto main-label" >
                    <h2>Login</h2>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    <input id="nomUsu" type="text" class="form-control" name="nomUsu" placeholder="Numero de trabajador" required>
                </div>
                
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
                    <input id="passsword" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group justify-content-center d-flex">
                    <button type="submit" name="submit" class="btn btn-primary button-submit">Login</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>