<?php
//Require necesario para hacer cualquier tipo de operacion en la BD
if(isset($_POST)){
    //print_r($_POST);
    $nombre=$_POST["name"];
    $paterno=$_POST["namep"];
    $materno=$_POST["namem"];
    $fecha_nac=$_POST["daten"];
    $lugar_nac=$_POST["placen"];
    $sexo=$_POST["sex"];
    $curp=$_POST["curp"];
    $cyn=$_POST["cyn"];
    $colonia=$_POST["col"];
    $cp=$_POST["cp"];
    $delegacion=$_POST["del"];
    $telefono=$_POST["tel"];
    $email=$_POST["email"];
    $ins_proc=$_POST["institute"];
    $ent_proc=$_POST["placep"];
    $escuela=$_POST["namee"];
    $area=$_POST["area"];
    $promedio=$_POST["prom"];
    $eleccion=$_POST["choice"];

    
    if($nombre && $paterno && $materno && $fecha_nac && $lugar_nac && $sexo && $curp && $cyn && $colonia
        && $cp && $delegacion && $telefono && $email && $ins_proc && $ent_proc && $escuela && $area 
        && $promedio && $eleccion) {
            require_once('./../../config/mysqli_connect.php');

            $sql = "select * from aspirantes where CURP='".$curp."';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            //echo $nombre;
            if($resultCheck==0){

            $sql = "INSERT INTO Aspirantes(Nombre,paterno,materno,CURP,Fecha_nac,lugar_nac,sexo,cyn,colonia,cp,delegacion,telefono,email,ins_proc,ent_proc,escuela,area,promedio,eleccion,Fecha_registro,Examen_idExamen) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conn,$sql);
            // i Integers
            // d Doubles
            // b Blobs
            // s Everything Else
            date_default_timezone_set('America/Mexico_City');
            setlocale(LC_TIME, 'es_MX.UTF-8');
            $Fecha_registro=date("Y-m-d H:i:s");
            $idexamen=100;
            //echo gettype($nombre),gettype($curp),$fnacimiento,gettype($fnacimiento),gettype($idexamen);
            mysqli_stmt_bind_param($stmt,"sssssssssisdsssssissi",$nombre,$paterno,$materno,$curp,$fecha_nac,$lugar_nac,$sexo,$cyn,$colonia,$cp,$delegacion,$telefono,$email,$ins_proc,$ent_proc,$escuela,$area,$promedio,$eleccion,$Fecha_registro,$idexamen);
            //echo "entraste";
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows == 1){
                echo "Alumno Registrado Exitosamente";
                mysqli_stmt_close($stmt);
                mysqli_close($conn);   

            } else{
                echo "Error en agregar el Alumno";
                //echo mysqli_error();
            }
        }else{
            window.location
            echo "EL ALUMNO YA HA SIDO REGISTRADO";
            //echo mysqli_error();
        }        
    }
}
            //require_once('./../../mysqli_connect.php');
?>