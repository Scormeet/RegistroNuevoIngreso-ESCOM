<?php
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case "/RegistroNuevoIngreso-ESCOM/" :
        require __DIR__ . '/index.html';
        break;
    case '/RegistroNuevoIngreso-ESCOM' :
        require __DIR__ . '/index.html';
        break;
    case '/RegistroNuevoIngreso-ESCOM/login' :
        require __DIR__ . '/src/administrador/login/index.html';
        break;
    case '/RegistroNuevoIngreso-ESCOM/loginS' :
        require __DIR__ . '/src/administrador/login/login.php';
        break;
    case '/RegistroNuevoIngreso-ESCOM/aspirante' :
        require __DIR__ . '/src/aspirante/index.html';
        break;
    case '/RegistroNuevoIngreso-ESCOM/administrador/modificar' :
        require __DIR__ . '/src/administrador/modificar/index.php';
        break;
    case '/RegistroNuevoIngreso-ESCOM/administrador/reportes' :
        require __DIR__ . '/src/administrador/reportes/index.html';
        break;
    case '/RegistroNuevoIngreso-ESCOM/administrador' :
        require __DIR__ . '/src/administrador/welcome/welcome.html';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . '/src/404.html';
        break;
}
?>