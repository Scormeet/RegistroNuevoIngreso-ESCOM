<?php 
    if(isset($_POST['submit'])){
        $name= $_POST['nomUsu'];
        $pass= $_POST['password'];

        if($name && $pass){
            require_once('./../../mysqli_connect.php');
            $sql = "select * from administrador where NumTrabajador='".$name."'AND Contraseña='".$pass."';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
        
            if($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['user'] = $name;
                    header("Location: ../welcome/welcome.html");
                }
            } else {
                header("Location: ./index.html");
                exit;
            }
        } else 
            echo "Datos no valido";
    } else
        echo "que haces aqui perro";
?>