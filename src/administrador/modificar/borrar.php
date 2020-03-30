<?php 
include("Qery.php");
$id = $_POST['id'];
delete('salon','idSalon',$id);
?>