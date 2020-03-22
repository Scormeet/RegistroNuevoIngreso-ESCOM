<?php
//Genera la cantidad de registros por cada fecha
require_once('./../../mysqli_connect.php');
if(isset($_POST["selector"])){
    $str = "";
    $div_active = (int)$_POST["selector"];
    $str = "<script>console.log(".$div_active.");</script>";
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
    
    for($i = 1; $i<$cont2; $i++){
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
        $str .= "<h3>".((object)($fechasArray[$i-1]))->fecha."</h3><br />"; //3423423423423432
        $str .="<table class='table'>";
        $str .= "<thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Horario</th>
                <th scope='col'>Salón</th>
                <th scope='col'>Cupos</th>
            </tr>
            </thead>";
            $str .= "<tbody><tr>";
        
            //Genera las tablas con su informacion
        $sql = "select idExamen,fecha,horaInicio,HoraFin,salon,cupos from examen INNER JOIN fecha ON examen.Fecha_idfecha = fecha.idfecha INNER JOIN horario ON examen.Horario_idHorario = horario.idhorario INNER JOIN salon ON examen.Salon_idSalon = salon.idSalon where fecha='".((object)($fechasArray[$i-1]))->fecha."';";
        $resultExamen = mysqli_query($conn,$sql);
        $resultCheckExamen = mysqli_num_rows($resultExamen);
        $cont = 1;
        if($resultCheckExamen>0){
            while($row = mysqli_fetch_assoc($resultExamen)){
                $str .= "<th scope='row'>".$row["idExamen"]."</th>";
                $str .= "<td>".$row["horaInicio"]."-".$row["HoraFin"]."</td>";
                $str .= "<td>".$row["salon"]."</td>";
                $str .= "<td>".$row["cupos"]."</td>";
                $str .= "</tr>";
                $output[]=$row;
                $cont++;
            }
        } else $str .= "Sin examenes programados";
        $str .= "</tbody>";
        $str .= "</table>";
        // $str .="</div>";
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
                    animation: {
                        duration: 0 
                    },
                    title: {
                        display: true,
                        text: 'Inscritos'
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
        // Fill the charts generated before
        $sql = "select horaInicio,horaFin from horario;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        $cont2=0;

        $data = array();

        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                $labels[] = $row["horaInicio"]."-".$row["horaFin"];
                $sql2 = "select(200-sum(f1.cupos))AS inscritos,horario.HoraInicio,horario.HoraFin,f1.Fecha from(select examen.Horario_idHorario,examen.cupos,fecha.Fecha FROM fecha INNER JOIN examen ON Examen.Fecha_idFecha=fecha.idFecha where fecha.Fecha='".((object)($fechasArray[$cont2]))->fecha."')AS F1 inner join horario on F1.Horario_idHorario=horario.idHorario group by horario.idHorario;";
                $result2 = mysqli_query($conn,$sql2);
                $resultCheck2 = mysqli_num_rows($result2);
                if($resultCheck2>0){
                    $bool = True;
                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($bool===True){
                            array_push($data,[$row2["inscritos"]]);
                            $bool = False;
                        }
                        else
                            array_push($data[$cont2],$row2["inscritos"]);
                    }
                }
            $bool = True;
            $cont2++;    
            }

    } else $str .= "Sin fechas";

    $colorArray = array(
        "rgb(185, 247, 167)"  => "rgb(185, 247, 167)",
        );
    $backgroundColor = (string)array_rand($colorArray,1);
    
    echo json_encode( array (
        'table' => $str,
        'label' => $labels,
        'fechas' => $fechasArray,
        'datasets'=> [$data],
        'backgroundColor' => $backgroundColor
    ));
}

?>