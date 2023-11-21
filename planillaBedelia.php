<?php
include_once 'clases/generarLista.php';
include_once 'clases/alumno.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilla de Alumnos</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="styles.css">  
</head>
<body>

<header class="bg-dark text-white text-center py-2">
      <h1>Planilla Alumnos</h1>
    </header>
<table>
<div id="establecimiento">
  <img src="Untitled.png">
  </div>
  <div id="establecimiento"><h2>Establecimiento</h2>
  </div>
  
  <div id="establecimiento-1">
  <h4>ESCUELA SUPERIOR DE COMERCIO NRO 49 "CAPITÁN GENERAL URQUIZA" - No 49 |</h4>
  </div>

  <div id="establecimiento">
  <h2>MESA</h2>
      </div>

      <div id="establecimiento-2">    
  <div class="parent">
<div class="div1"> 
</div>
<h3>Acta de examenes N°:</h3>
<h3>Libro N°:</h3>
<h3>Folio N°:</h3>
</div> 
      </div>

      <div id="establecimiento-1">
  <h5>Estructura Curricular: 2120/2016</h5>
  <h5>Fecha: </h5>
  <div class="parent-1">
    <h5>Año: </h5>
    <h5>Materia: </h5>
</div> 
      </div>
    <thead>   
    <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Doc.Identidad</th>
            <th>Carrera</th>
            <th>Nota Final</th>
            <th>Condicion</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumnos as $alumno) : ?>
            <tr>
                
                <td><?= $alumno['nombre'] ?></td>
                <td><?= $alumno['apellido'] ?></td>
                <td><?= $alumno['dni'] ?></td>
                <td><?= isset($carrerasMap[$alumno['carrera_id']]) ? $carrerasMap[$alumno['carrera_id']] : 'Carrera no especificada' ?></td>
            
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>