<?php
    require_once('./../../mysqli_connect.php');

    $sql = "select fecha from fecha;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<h5>".$row["fecha"]."</h5>";
        }
    } else echo "Sin fechas";
?> 