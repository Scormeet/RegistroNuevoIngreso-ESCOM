<?php
    if(isset($_POST)){
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
                require_once(' require_once(./../../../config/mysqli_connect.php');
                $sql = "select * from aspirantes where CURP='".$curp."';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck==0){
                $sql = "INSERT INTO Aspirantes(Nombre,paterno,materno,CURP,Fecha_nac,lugar_nac,sexo,cyn,colonia,cp,delegacion,telefono,email,ins_proc,ent_proc,escuela,area,promedio,eleccion,Fecha_registro,Examen_idExamen) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_prepare($conn,$sql);
                date_default_timezone_set('America/Mexico_City');
                setlocale(LC_TIME, 'es_MX.UTF-8');
                $Fecha_registro=date("Y-m-d H:i:s");

                // Consulta de los examenes disponibles para registrar
                $sql = "SELECT idexamen FROM examen WHERE inscritos>=0 AND inscritos<30;";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                $examenarray= array();
                if($resultCheck>0){
                    while($row = mysqli_fetch_assoc($result)){
                        array_push($examenarray,$row["idexamen"]);
                    }
                    shuffle( $examenarray );
                    $idexamen=(int)$examenarray[0];
                    
                } else echo "Ninguno";

                mysqli_stmt_bind_param($stmt,"sssssssssisdsssssissi",$nombre,$paterno,$materno,$curp,$fecha_nac,$lugar_nac,$sexo,$cyn,$colonia,$cp,$delegacion,$telefono,$email,$ins_proc,$ent_proc,$escuela,$area,$promedio,$eleccion,$Fecha_registro,$idexamen);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
            
                if($affected_rows == 1){
                    echo "Alumno Registrado Exitosamente";
                    mysqli_stmt_close($stmt);
                    $sql = "select fecha,salon,horaInicio,horaFin from examen INNER JOIN salon on examen.Salon_idSalon=salon.idSalon INNER JOIN fecha ON examen.Fecha_idFecha = fecha.idFecha INNER JOIN horario ON examen.Horario_idHorario = horario.idHorario where idExamen = ".$idexamen.";";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    $salon = "";
                    $horario = "";
                    $fecha = "";
                    if($resultCheck>0){
                        if($row = mysqli_fetch_assoc($result)){
                            $salon = $row["salon"];
                            $horario = $row["horaInicio"]."-".$row["horaFin"]; 
                            $fecha = $row["fecha"];
                        }
                    } 
                    $hash = hash('md5', $curp);
                    //Generador de PDF del examen al aspirante
                    require_once("./../../src/aspirante/pdf/generatepdf.php");
                    $pdf = new myPDF();
                    $nombreA = $nombre." ".$paterno." ".$materno;
                    $salonA = $salon;
                    $horarioA = $horario;
                    $fechaA = $fecha;
                    $pdf->AliasNbPages();
                    $pdf->AddPage('L','A4',0);
                    $pdf->body();
                    $pdf->Output('F', './../../uploads/'.$hash.'.pdf');
                } else{
                    echo "Error en agregar el Alumno";
                }
            }else{
                echo "EL ALUMNO YA HA SIDO REGISTRADO";
                header('Status: 301 Moved Permanently', false, 301);
                // header('Location: ./../../index.html');
                exit();
            }        
        }
    }
?>