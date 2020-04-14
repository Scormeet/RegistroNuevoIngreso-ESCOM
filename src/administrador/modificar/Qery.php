
<?php
    function db_query($query) {
        $connection = mysqli_connect("localhost","root","N0M3L0","ingreso");
        $result = mysqli_query($connection,$query);
    
        return $result;
    }
    
    function delete($tblname,$field_id,$id){
    
        $sql = "delete from ".$tblname." where ".$field_id."=".$id."";
        
        return db_query($sql);
    }

    function insertaHorar($h1,$h2){
    
        $sql = "insert into horarios (HoraInicio, HoraFin )values (".$h1.",".$h2.")"."";
        
        return db_query($sql);
    }
    function select_id($tblname,$field_name,$field_id){
        $sql = "Select * from ".$tblname." where ".$field_name." = ".$field_id."";
        $db=db_query($sql);
        $GLOBALS['row'] = mysqli_fetch_object($db);
    
        return $sql;
    
    }


?>