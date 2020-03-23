<?php
    //Genera la cantidad de registros por cada fecha
    require_once('./../../mysqli_connect.php');
    
    if(isset($_POST["selector"])){
        $str = "";
        $div_active = (int)$_POST["selector"];
        $scrollPosition = (int)$_POST["scrollNumber"];
        $sql = "select fecha from fecha;";
        $resultFecha = mysqli_query($conn,$sql);
        $resultCheckFecha = mysqli_num_rows($resultFecha);
        $cont2 = 1;
        $fechasArray = [];
        if($resultCheckFecha>0){
            while($row = mysqli_fetch_assoc($resultFecha)){
                $fechasArray[]=$row;
                $cont2++;
            }
        } else $str.= "Sin fechas";
        
        for($i = 1; $i<($cont2); $i++){
            if($i === $div_active)
                $str .= "<div id='".$i."' class='container' style='display:block'>";
            else 
                $str .= "<div id='".$i."' class='container' style='display:none'>";
            $str .= "<div class='row'>";
            $str .= "<div class='col'></div>";
            $str .= "<div class='col-8'>";
            $str .= "<canvas id='barChar".$i."' width='150px' height='100px'></canvas>";
            $str .= "</div>";
            $str .="<div class='col'></div>";
            $str .="</div>";
            $str .= "<h3><i class='fas fa-calendar-day'></i>&nbsp;".((object)($fechasArray[$i-1]))->fecha."</h3><br />"; //3423423423423432
            $str .="<table class='table'>";
            $str .= "<thead>
                <tr>
                    <th scope='col'># Examen</th>
                    <th scope='col'>Horario</th>
                    <th scope='col'>Salón</th>
                    <th scope='col'>Inscritos</th>
                </tr>
                </thead>";
            $str .= "<tbody><tr>";
            
            //Genera las tablas con su informacion
            $sql = "select idExamen,fecha,horaInicio,HoraFin,salon,inscritos from examen INNER JOIN fecha ON examen.Fecha_idfecha = fecha.idfecha INNER JOIN horario ON examen.Horario_idHorario = horario.idhorario INNER JOIN salon ON examen.Salon_idSalon = salon.idSalon where fecha='".((object)($fechasArray[$i-1]))->fecha."';";
            $resultExamen = mysqli_query($conn,$sql);
            $resultCheckExamen = mysqli_num_rows($resultExamen);
            $cont = 1;
            if($resultCheckExamen>0){
                while($row = mysqli_fetch_assoc($resultExamen)){
                    $str .= "<th scope='row'>".$row["idExamen"]."</th>";
                    $str .= "<td>".$row["horaInicio"]."-".$row["HoraFin"]."</td>";
                    $str .= "<td>".$row["salon"]."</td>";
                    $str .= "<td>".$row["inscritos"]."</td>";
                    $str .= "</tr>";
                    $output[]=$row;
                    $cont++;
                }
            } else $str .= "Sin examenes programados";
            $str .= "</tbody>";
            $str .= "</table>";
            $str .= "</div>";
            $str .= "</div>";

            //Generating Chart base to show empty
            $str .= "<script>
                data".$i." = {
                }
                var ctx".$i." = document.getElementById('barChar".$i."').getContext('2d');
                var myChart".$i." = new Chart(ctx".$i.", {
                    type: 'bar',
                    data: data".$i.",
                    options: {
                        legend: { display: false },
                        animation: {
                            duration: 0 
                        },
                        title: {
                            display: true,
                            text: 'Alumnos inscritos a un examen por hora'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>";
        }
        $labels = array();
        $data = array();
        for($j = 0; $j<sizeof($fechasArray);$j++){
            $sql = "select(sum(f1.inscritos))AS Alumnos_inscritos,horario.HoraInicio,horario.HoraFin,f1.Fecha  From (SELECT examen.Horario_idHorario,examen.inscritos,fecha.Fecha FROM fecha INNER JOIN examen ON Examen.Fecha_idFecha=fecha.idFecha where fecha.Fecha='".((object)($fechasArray[$j]))->fecha."')AS F1 inner join horario on F1.Horario_idHorario=horario.idHorario group by horario.idHorario;";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            array_push($labels,[]);
            array_push($data,[]);
            if($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){
                    array_push($labels[$j],$row["HoraInicio"]."-".$row["HoraFin"]);
                    array_push($data[$j],$row["Alumnos_inscritos"]);
                }
            }
        }
        $colorArray = array("rgb(185, 247, 167)"  => "rgb(185, 247, 167)");
        $backgroundColor = (string)array_rand($colorArray,1);
        $str.= "<script>window.scrollTo(0,".$scrollPosition."); </script>";
        echo json_encode( array (
            'table' => $str,
            'labels' => $labels,
            'fechas' => $fechasArray,
            'datasets'=> [$data]
        ));
    }
?>