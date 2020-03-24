<?php
    require_once('./../../../config/mysqli_connect.php');
    
    //Obtiene las fechas que se haran el examen
    $sql = "select fecha from fecha;";
    $resultFecha = mysqli_query($conn,$sql);
    $resultCheckFecha = mysqli_num_rows($resultFecha);
    $cont = 1;
    if($resultCheckFecha>0){
        while($row = mysqli_fetch_assoc($resultFecha)){
            $fechasArray[]=$row;
            echo "<div class='col-sm' align='center'>";
            echo "<button class='btn btn-warning' onClick='showRegistry(".$cont.")' type='button'>".$row["fecha"]."</button>";
            echo "</div>";
            $cont++;
        }
    } else echo "Sin fechas";
?>