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
                    $array [] = (int)$row2["llenos"]; 
            }
        }
        $array2 [] = $row["fecha"];
    }
  

    $colorArray = array(
    "red"  => "rgb(255, 121, 121)",
    );

     $data = array();
     $data['data'] = $array;
     $data['backgroundColor'] = (string)array_rand($colorArray,1);;


    echo json_encode( array (
        'labels' => $array2,
        'datasets'=> [$data]
    ));
    }
?> 