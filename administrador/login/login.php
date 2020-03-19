<?php 

if(isset($_POST['submit'])){
    $name= $_POST['nomUsu'];
    $password= $_POST['password'];

    print_r($_POST);
    echo '<br/>Nombre de usuario a enviar a la BD: '.$name.'<br/>';
    echo 'password a enviar a la BD: '.$password;

    echo 'Verificando datos....<br/><br/>';
    
    //Revisarlo en la BD
    
    session_start();
    $_SESSION['id'] = "12345";
    $_SESSION['user'] = $name;

    echo 'Sesion iniciada con: <br/>';
    print_r($_SESSION);

    header("Location: ../welcome.php");
}


?>