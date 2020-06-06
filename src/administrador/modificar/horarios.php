<?php

echo "<br>";
   //require_once('/RegistroNuevoIngreso-ESCOM/config/mysqli_connect.php');
   require_once('./../../../config/mysqli_connect.php');
   //Obtiene las fechas que se haran el examen
   $sql = "select * from horario;";
   $result = mysqli_query($conn,$sql);
   $resultCheck = mysqli_num_rows($result);
   $cont = 1;
   echo "<table align='center' cellspacing='2' cellpadding='2' border='1' bgcolor=dddddd>";
   echo "<tr>";
   echo "<td colspan='4' align='center' bgcolor='666666'><font color='#FFFFFF'><strong> Horarios Actuales&nbsp;<i class></i><img src='/RegistroNuevoIngreso-ESCOM/images/234.png' width='30' height='30' onclick=DespliegaForm();></strong></font></td>";
   echo "</tr>";
   echo "<tr bgcolor='aaaaaa'>";
       echo "<td>ID DE HORARIO</td>";
       echo"<td align='center'>HORA INICIO";
       echo"</td>";
       echo "<td align='center'> HORA DE FIN ";
       echo "<td align='center'>ELIMINAR";
       echo "</td>";
   echo "</tr>";
   if($resultCheck>0){
    

       echo  "<div>";
       while($row = mysqli_fetch_assoc($result)){


echo "<tr>";
   echo" <td>".$row ["idHorario"]."</td>";
    echo "<td align='center'>" .$row ["HoraInicio"]. "</td>";
    echo "<td align='center'>".$row ["HoraFin"]."</td>";
    echo "<td align='center'> <img src='/RegistroNuevoIngreso-ESCOM/images/1.png' onclick=alerta(".$row["idHorario"]."); width='30' height='30' > </td>";
echo "</tr>"; 
           
           $cont++;
       }
      echo "</div>";
   } else echo "Sin horarios";
echo "<br/>";


?>

