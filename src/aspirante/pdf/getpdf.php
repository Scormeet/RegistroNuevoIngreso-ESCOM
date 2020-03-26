<?php
    if($_POST['id']){
        $id = $_POST['id'];
        $success = "";
        $error = "";
        $hash = hash('md5', $id);
        
        $nombre_fichero = "uploads/".$hash.".pdf";
        if (file_exists($nombre_fichero)) {
            $success = "/RegistroNuevoIngreso-ESCOM/".$nombre_fichero;
        } 
        else 
            $error = "Aspirante no encontrado";
        echo json_encode( array (
        'success' => $success,
        'errorMessage' => $error,
        ));
    } 
?>