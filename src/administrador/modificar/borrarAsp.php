<?php 
include("Qery.php");
$id = $_POST['id'];
delete('aspirantes','CURP',"'".$id."'");
?>