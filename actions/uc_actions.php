<?php

include 'db.php';
include 'clases/unidadcurricular.php';


if (isset($_POST['submit_uc'])) {
    $nombre = $_POST['nombre'];
    $carrera_id = $_POST['carrera_id'];
    $correlativa = $_POST['correlativa'];
    $formato = $_POST['formato'];

    
    $uc = new UnidadCurricular($nombre, $carrera_id, $correlativa, $formato);

    
    $uc->create();
   
    header("Location: success.html");
    exit();
}
?>
