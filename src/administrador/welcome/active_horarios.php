<?php
    require_once('./../../../config/mysqli_connect.php');
    
    $sql = "select HoraInicio,HoraFin from horario;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<h5>".$row["HoraInicio"]."-".$row["HoraFin"]."</h5>";
        }
    } else echo "Sin fechas";
?> 