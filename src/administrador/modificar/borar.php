<?php 
include("Qery.php");
$id = $_POST['id'];
delete('horario','idHorario',$id);

?>