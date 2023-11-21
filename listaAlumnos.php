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
  <img src="logourquiza.png" >
  </div>
  <div id="establecimiento"><h2>Establecimiento</h2>
  </div>
  
  <div id="establecimiento-1">
  <h4>ESCUELA SUPERIOR DE COMERCIO NRO 49 "CAPITÁN GENERAL URQUIZA" - No 49 |</h4>
  </div>

    

      <div id="establecimiento-1">
  <h5>Nombre Profesor:</h5>
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
            <th>DNI</th>
            <th>Carrera</th>
            <th>Asistencias</th>
            <th>Comision</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumnos as $alumno) : ?>
            <tr>
                
                <td><?= $alumno['nombre'] ?></td>
                <td><?= $alumno['apellido'] ?></td>
                <td><?= $alumno['dni'] ?></td>
                <td><?= isset($carrerasMap[$alumno['carrera_id']]) ? $carrerasMap[$alumno['carrera_id']] : 'Carrera no especificada' ?></td>
                <td></td>
                <td><?= isset($alumno['id_comision']) ? $alumno['id_comision'] : 'Sin comisión' ?></td>
                <!-- Agrega más celdas según tus necesidades -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
