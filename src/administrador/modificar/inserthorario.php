

    
<?php
    if(isset($_POST)){
        $h1 = $_POST["inicio"];
        $h2 = $_POST["final"];

        if($h2 && $h1 ) {
                //require_once('/RegistroNuevoIngreso-ESCOM/config/mysqli_connect.php');// para ver si el registo existe
                require_once('./../../../config/mysqli_connect.php');
                $sql = "select * from horario where HoraInicio='".$h1."' && HoraInicio='".$h2.";";
                $result = mysqli_query($conn,$sql);
                $resultCheck = 0;
                
                if($resultCheck==0){
                $sql = "INSERT INTO Horario(HoraInicio,HoraFin) values(?,?);";
                $stmt = mysqli_prepare($conn,$sql);
                

                mysqli_stmt_bind_param($stmt,"ss",$h1,$h2);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
            
                if($affected_rows == 1){
                    echo "horario Registrado Exitosamente";
                    mysqli_stmt_close($stmt);
                    header('Location: /RegistroNuevoIngreso-ESCOM/src/administrador/modificar/index.html');
                    
                } else{
                    echo "Error en agregar el horario";
                }
            }else{
                echo "EL HORARIO YA HA SIDO REGISTRADO";
                header('Status: 301 Moved Permanently', false, 301);
               
                exit();
            }        
        }
    }
?>