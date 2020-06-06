<?php
    $request = $_SERVER['REQUEST_URI'];
    session_start();
    switch ($request) {
        // Rutas abiertas a todo tipo de usuario
        case "/https://registro-nuevo-ingreso-escom.herokuapp.com/" :
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
            require __DIR__ . '/src/administrador/modificar/index.html';
            else
                header("Location: /RegistroNuevoIngreso-ESCOM/login");
            break;

        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/horarios' :
            
            require __DIR__ . '/src/administrador/modificar/horarios.php';
            
            break; 
            
            
        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/formhorario' :
            
            require __DIR__ . '/src/administrador/modificar/formulariohorario.php';
                
             break;

        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/inserthorario.php' :
            
            require __DIR__ . '/src/administrador/modificar/inserthorario.php';
                
             break;

             ////
             case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/grupos' :
            
                require __DIR__ . '/src/administrador/modificar/grupos.php';
                
                break; 
                
                
            case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/formsalon' :            
                require __DIR__ . '/src/administrador/modificar/formulariosalon.php';                
                 break;
            case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/insertsalon.php' :         
                require __DIR__ . '/src/administrador/modificar/insertgrupo.php';             
                 break;
        case '/RegistroNuevoIngreso-ESCOM/administrador/modificar/borar' :
            if(isset($_SESSION['user']))
            require __DIR__ . '/src/administrador/modificar/borar.php';
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

        // Rutas de direccionamiento POST and NO ONE
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
        case '/RegistroNuevoIngreso-ESCOM/pdfP' :
            require __DIR__ . '/pdf/registar.html';
            break;
            case '/RegistroNuevoIngreso-ESCOM/aspirante/pdfG' :
                require __DIR__ . '/src/aspirante/pdf/obtenerPDF.html';
                break;
        case '/RegistroNuevoIngreso-ESCOM/savepdf' :
            require __DIR__ . '/pdf/savepdf.php';
            break;
        case '/RegistroNuevoIngreso-ESCOM/getpdf' :
            require __DIR__ . '/src/aspirante/pdf/getpdf.php';
            break;
        // Ruta 404 para una ruta no valida
        default:
            http_response_code(404);
            require __DIR__ . '/src/404.html';
            break;
    }
?>