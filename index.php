<?php
    $request = $_SERVER['REQUEST_URI'];
    session_start();

    switch ($request) {
        // Rutas abiertas a todo tipo de usuario
        case "/RegistroNuevoIngreso-ESCOM/" :
            require __DIR__ . '/index.html';
            break;
        case '/RegistroNuevoIngreso-ESCOM/login' :
            if(!isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/login/index.html';
            else
                header("Location: /RegistroNuevoIngreso-ESCOM/administrador");
        break;
            break;
        case '/RegistroNuevoIngreso-ESCOM/loginS' :
            require __DIR__ . '/src/administrador/login/login.php';
            break;
        case '/RegistroNuevoIngreso-ESCOM/aspirante' :
            require __DIR__ . '/src/aspirante/index.html';
            break;
        
        // Rutas que necesitan una sesion para acceder como administrador
        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar' :
            if(isset($_SESSION['user']))
            require __DIR__ . '/src/administrador/modificar/index.php';
            else
                header("Location: /RegistroNuevoIngreso-ESCOM/login");
            break;
        case '/RegistroNuevoIngreso-ESCOM/administrador/reportes' :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/reportes/index.html';
            else
                header("Location: /RegistroNuevoIngreso-ESCOM/login");
            break;
        case '/RegistroNuevoIngreso-ESCOM/administrador' :
            if(isset($_SESSION['user']))
                require __DIR__ . '/src/administrador/welcome/welcome.html';
            else
                header("Location: /RegistroNuevoIngreso-ESCOM/login");
            break;

        // Rutas de direccionamiento
        case '/RegistroNuevoIngreso-ESCOM' :
            require __DIR__ . '/index.html';
            break;
        case '/RegistroNuevoIngreso-ESCOM/login/' :
            header("Location: /RegistroNuevoIngreso-ESCOM/login");
            break;

        case '/RegistroNuevoIngreso-ESCOM/aspirante/' :
            header("Location: /RegistroNuevoIngreso-ESCOM/aspirante");
            break;
        
        case '/RegistroNuevoIngreso-ESCOM/administrador/' :
            header("Location: /RegistroNuevoIngreso-ESCOM/administrador");
            break;
            
        case '/RegistroNuevoIngreso-ESCOM/administrador/reportes/' :
            header("Location: /RegistroNuevoIngreso-ESCOM/administrador/reportes");
            break;

        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/' :
            header("Location: /RegistroNuevoIngreso-ESCOM/administrador/modificar");
            break;

        // Ruta 404 para una ruta no valida
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>