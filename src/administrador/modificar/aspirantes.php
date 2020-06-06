

<style type="text/css">
  
  .tabla{
    display: table;
    width: 500px;
  }
  .columna1{
    display: table-cell;
    width: 50px;
    height: 5px;
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
   echo "<table align='left' cellspacing='2' cellpadding='2' border='1' bgcolor=dddddd>";
   echo "<tr>";
   echo "<td colspan='22' align='center' bgcolor='666666'><font color='#FFFFFF'><strong> Aspirantes Actuales&nbsp;<i class></i></strong></font></td>";
   echo "</tr>";
   echo "<tr bgcolor='aaaaaa'>";
       echo "<td>Nombre</td>";
       echo"<td align='center'>Apellido Paterno";
       echo"</td>";
       echo "<td align='center'> Apellido Materno";
       echo "<td align='center'>CURP";
       echo "<td align='center'>Fecha de Nacimiento";  
       echo "<td align='center'>Calle y Número";
       echo "<td align='center'>Colonia";       
       echo "<td align='center'>Delegación";
       echo "<td align='center'>Télefono";
       echo "<td align='center'>e-mail";
       echo "<td align='center'>ins_proc";       
       echo "<td align='center'>Escuela";       
       echo "<td align='center'>Promedio";
       echo "<td align='center'>Fecha de Registro";
       echo "<td align='center'>Elección";      
       echo "<td align='center'>Id de Examen";  
        echo "<td align='center'>ELIMINAR";
       echo "</td>"; 

       echo "</td>";
       echo "</tr>";
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
    echo" <td>".$row ["nombre"]."</td>";
    echo "<td align='center'>" .$row ["paterno"]. "</td>";
    echo "<td align='center'>".$row ["materno"]."</td>";
    echo "<td align='center'>" .$row ["CURP"]. "</td>";
    echo "<td align='center'>".$row ["Fecha_nac"]."</td>";
    echo "<td align='center'>" .$row ["cyn"]. "</td>";
    echo "<td align='center'>".$row ["colonia"]."</td>";    
    echo "<td align='center'>".$row ["delegacion"]."</td>";
    echo "<td align='center'>".$row ["telefono"]."</td>";
    echo "<td align='center'>" .$row ["email"]. "</td>";
    echo "<td align='center'>".$row ["ins_proc"]."</td>";   
    echo "<td align='center'>" .$row ["escuela"]. "</td>";   
    echo "<td align='center'>".$row ["promedio"]."</td>";
    echo "<td align='center'>".$row ["Fecha_registro"]."</td>"; 
    echo "<td align='center'>" .$row ["eleccion"]. "</td>";       
    echo "<td align='center'>".$row ["Examen_idExamen"]."</td>";
    
    echo "<td align='center'> <img src='/RegistroNuevoIngreso-ESCOM/images/1.png' onclick=alerta3('".$row["CURP"]."'); width='30' height='30' > </td>";
echo "</tr>"; 
           
           $cont++;
       }
      echo "</div>";
   } else echo " Sin Alumnos";
echo "<br/>";



?>








 

