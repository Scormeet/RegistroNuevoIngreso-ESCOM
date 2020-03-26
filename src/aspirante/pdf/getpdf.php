<?php
    if($_POST['id']){
        $id = $_POST['id'];
        $success = "";
        $error = "";
        
        //Aplicar algun hash para el CURP

        //FIN
        
        $nombre_fichero = "uploads/".$id.".pdf";
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