
<?php
    require_once('./../../../config/mysqli_connect.php');

    function delete($tblname,$field_id,$id){

        $sql = "delete from ".$tblname." where ".$field_id."=".$id."";
        
        return db_query($sql);
    }

    function select_id($tblname,$field_name,$field_id){
        $sql = "Select * from ".$tblname." where ".$field_name." = ".$field_id."";
        $db=db_query($sql);
        $GLOBALS['row'] = mysqli_fetch_object($db);
    
        return $sql;
    
    }

?>