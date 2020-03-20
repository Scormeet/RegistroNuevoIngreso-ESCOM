<?php
  // Variables de conexion BD
  $servername = "localhost";
  $username = "root";
  $password = "N0M3L0";
  $dbname  = "ingreso";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  echo '<script>';
  echo 'console.log('. json_encode( 'Conexion establecida con la BD' ) .')';
  echo '</script>';
?>