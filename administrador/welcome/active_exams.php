<?php 
    require_once('./../../mysqli_connect.php');

    if(isset($_GET)) {
        $sql = "select COUNT(idExamen)as count from examen;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row["count"];
            }
        } else echo "Ninguno";
    }  
?>