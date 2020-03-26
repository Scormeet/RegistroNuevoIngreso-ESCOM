<?php 
include("Qery.php");
$id = $_GET['id'];
delete('horario','idHorario',$id);
header("location:index.php");
?>