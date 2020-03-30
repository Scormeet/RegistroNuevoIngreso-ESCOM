

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
<br>
</br>
 

<?php
echo "<br>";
   //require_once('/RegistroNuevoIngreso-ESCOM/config/mysqli_connect.php');
   require_once('./../../../config/mysqli_connect.php');
   //Obtiene las fechas que se haran el examen
   $sql = "select * from aspirantes;";
   $result = mysqli_query($conn,$sql);
   $resultCheck = mysqli_num_rows($result);
   $cont = 1;
   echo "<table align='center' cellspacing='2' cellpadding='2' border='1' bgcolor=dddddd>";
   echo "<tr>";
   echo "<td colspan='4' align='center' bgcolor='666666'><font color='#FFFFFF'><strong> Aspirantes Actuales&nbsp;<i class></i> <a  href='agregar.php'> <img src='/RegistroNuevoIngreso-ESCOM/images/234.png' width='30' height='30' ></a></strong></font></td>";
   echo "</tr>";
   echo "<tr bgcolor='aaaaaa'>";
       echo "<td>Nombre</td>";
       echo"<td align='center'>Apellido Paterno";
       echo"</td>";
       echo "<td align='center'> Apellido Materno";
       echo "<td align='center'>CURP";
       echo "<td align='center'>Fecha de Nacimiento";
       echo "<td align='center'>Lugar de Nacimiento";
       echo "<td align='center'>Sexo";
       echo "<td align='center'>Calle y Número";
       echo "<td align='center'>Colonia";
       echo "<td align='center'>CP";
       echo "<td align='center'>Delegación";
       echo "<td align='center'>Télefono";
       echo "<td align='center'>e-mail";
       echo "<td align='center'>huhuhuh";
       echo "<td align='center'>huhuhuh";
       echo "<td align='center'>Escuela";
       echo "<td align='center'>Área";
       echo "<td align='center'>Promedio";
       echo "<td align='center'>Elección";
       echo "<td align='center'>Fecha de Registro";
       echo "<td align='center'>Id de Examen";   

       echo "</td>";
   echo "</tr>";
   if($resultCheck>0){
    

       echo  "<div>";
       while($row = mysqli_fetch_assoc($result)){
           //$fechasArray[]=$row;
           /*echo  "<div>";
               echo "<div class='columna1' align='center'>".$row ["idHorario"]."</div>";
               echo "<div  class='columna1' align='center'>".$row ["HoraInicio"]."</div>";
               echo "<div class='columna1' align='center'>".$row ["HoraFin"]."</div>";
               echo "<div class='columna1' align='center'><a  href='/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/borar.php?id=".$row["idHorario"]."'> <img src='/RegistroNuevoIngreso-ESCOM/images/1.png' width='30' height='30' >";
           echo "</div>";

           */


echo "<tr>";
   echo" <td>".$row ["Nombre"]."</td>";
    echo "<td align='center'>" .$row ["CURP"]. "</td>";
    echo "<td align='center'>".$row ["Fecha_nac"]."</td>";
    echo "<td align='center'><a  href='/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/borrar.php?id=".$row["CURP"]."'> <img src='/RegistroNuevoIngreso-ESCOM/images/1.png' width='30' height='30' > </td>";
echo "</tr>"; 
           
           $cont++;
       }
      echo "</div>";
   } else echo "Sin horarios";
echo "<br/>";



?>








 

