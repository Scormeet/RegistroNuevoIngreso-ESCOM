<?php
    require_once('./../../mysqli_connect.php');

    $sql = "select fecha from fecha;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            $sql2 = "select count(idExamen) as llenos from examen inner join fecha on examen.Fecha_idFecha = fecha.idFecha where fecha='".$row["fecha"]."' AND cupos = 0;";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);

            if ($resultCheck2 > 0) {
                if ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<script>";
                    echo "var randomProperty = function (obj) {
                        var keys = Object.keys(obj);
                        var randomPicked = keys.length * Math.random() << 0;
                        var dataPicked = obj[keys[randomPicked]];
                        var color = keys[randomPicked];
                        delete chartColors[color];

                        return dataPicked;
                    }; ";
                    echo "var newDataset = {
                    label: '".$row['fecha']."',
                        backgroundColor: randomProperty(chartColors),
                            borderColor: 'white',
                                borderWidth: 1,
                                    data: [".$row2['llenos']."],
            }
                data.datasets.push(newDataset);
                myChart.update(); ";
            }
        }
        echo "</script>";
        }
    }
?> 