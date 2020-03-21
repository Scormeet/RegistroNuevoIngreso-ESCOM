<?php
//Genera la cantidad de registros por cada fecha
require_once('./../../mysqli_connect.php');


    $sql = "select fecha from fecha;";
    $resultFecha = mysqli_query($conn,$sql);
    $resultCheckFecha = mysqli_num_rows($resultFecha);
    $cont2 = 1;
    if($resultCheckFecha>0){
    while($row = mysqli_fetch_assoc($resultFecha)){
        $fechasArray[]=$row;
        $cont2++;
        }
    } else echo "Sin fechas";
    echo "<script> console.log(".$cont2."); </script>";

    for($i = 1; $i<$cont2; $i++){
    echo "<div id='".$i."' class='container' style='display: none'>";
    echo "<div class='row'>";
    echo "<div class='col-sm'>";
    echo "<canvas id='barChar".$i."' width='150px' height='100px'></canvas>";
    echo "</div>";
    echo "<div class='col-sm'>";
    echo "<h3>".((object)($fechasArray[$i-1]))->fecha."</h3><br />"; //3423423423423432
    echo "<table class='table'>";
    echo "<thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>Horario</th>
            <th scope='col'>Salón</th>
            <th scope='col'>Cupos</th>
        </tr>
        </thead>";
    echo "<tbody><tr>";
    //Genera las tablas con su informacion
    $sql = "select idExamen,fecha,horaInicio,HoraFin,salon,cupos from examen INNER JOIN fecha ON examen.Fecha_idfecha = fecha.idfecha INNER JOIN horario ON examen.Horario_idHorario = horario.idhorario INNER JOIN salon ON examen.Salon_idSalon = salon.idSalon where fecha='".((object)($fechasArray[$i-1]))->fecha."';";
    $resultExamen = mysqli_query($conn,$sql);
    $resultCheckExamen = mysqli_num_rows($resultExamen);
    $cont = 1;
    if($resultCheckExamen>0){
        while($row = mysqli_fetch_assoc($resultExamen)){
            echo "<th scope='row'>".$row["idExamen"]."</th>";
            echo "<td>".$row["horaInicio"]."-".$row["HoraFin"]."</td>";
            echo "<td>".$row["salon"]."</td>";
            echo "<td>".$row["cupos"]."</td>";
            echo "</tr>";
            $output[]=$row;
            $cont++;
        }
    } else echo "Sin fechas";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    //Generating Chart base to show empty
    echo "<script>
        var data".$i." = {
            labels: ['Horario']
        }
        var ctx".$i." = document.getElementById('barChar".$i."').getContext('2d');
        var myChart".$i." = new Chart(ctx".$i.", {
            type: 'bar',
            data: data".$i.",
            options: {
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
    $sql = "select * from horario;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
    while($row = mysqli_fetch_assoc($result)){
    echo "<script>
        var randomProperty = function (obj) {
        var keys = Object.keys(obj);
        var randomPicked = keys.length * Math.random() << 0;
        var dataPicked =  obj[keys[randomPicked]];
        var color = keys[randomPicked];
        delete chartColors[color];                
        return dataPicked;
    };";
    //AQUIIIIIIIIIIIIIIIIIIIII
    echo "var random = Math.floor(Math.random() * 100) + 1;";
    echo "var newDataset = {
        label: '".$row["HoraInicio"]."-".$row["HoraFin"]."',
        backgroundColor: randomProperty(chartColors),
        borderColor: 'white',
        borderWidth: 1,
        data: [random],
    }
    data1.datasets.push(newDataset);
    data2.datasets.push(newDataset);
    data3.datasets.push(newDataset)
    myChart1.update();
    myChart2.update();
    myChart3.update();";
    echo "</script>";
    }
} else echo "Sin fechas";

?>