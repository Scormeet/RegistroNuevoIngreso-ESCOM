

   <style type="text/css">
  
  .tabla{
    display: table;
    width: 400px;
  }
  .columna1{
    display: table-cell;
    width: 120px;
    height: 20px;
  }
  </style>
  
    
        <h1 class="display-4">Horarios Actuales&nbsp;<i class></i> <a  href="agregar.php"> <img src="/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/234.png" width="30" height="30" ></a></h1>
        
    
 
<?php
   //require_once('/RegistroNuevoIngreso-ESCOM/config/mysqli_connect.php');
   require_once('./../../../config/mysqli_connect.php');
   //Obtiene las fechas que se haran el examen
   $sql = "select * from horario;";
   $resultFecha = mysqli_query($conn,$sql);
   $resultCheckFecha = mysqli_num_rows($resultFecha);
   $cont = 1;
   if($resultCheckFecha>0){

       echo  "<div>";
       while($row = mysqli_fetch_assoc($resultFecha)){
           $fechasArray[]=$row;
           echo  "<div>";
               echo "<div class='columna1' align='center'>".$row ["idHorario"]."</div>";
               echo "<div  class='columna1' align='center'>".$row ["HoraInicio"]."</div>";
               echo "<div class='columna1' align='center'>".$row ["HoraFin"]."</div>";
               echo "<div class='columna1' align='center'><a  href='/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/borar.php?id=".$row["idHorario"]."'> <img src='/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/1.png' width='30' height='30' ></a> &nbsp;<a  href='eliminar.php?id=".$row["idHorario"]."'>  <img src='/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/ajustes.png' width='40' height='45'></a>";
           echo "</div>";
           
           $cont++;
       }
       echo "</div>";
   } else echo "Sin horarios";

?>
