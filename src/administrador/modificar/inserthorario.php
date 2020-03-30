
<script>hola pvt0</script>
    
<?php 
include("Qery.php");
$h1 = $_POST['Hinicio'];
$h2 = $_POST['Hfinal'];
echo $h1;
insertaHorar($h1,$h2);
//echo"exito";
//header("location:index.html");

?>