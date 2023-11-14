<?php
class Alumno {
    private $alumno_id;
    private $nombre;
    private $apellido;
    private $dni;
    private $f_nacimiento;
    private $carrera_id;

  public function __construct($nombre, $apellido, $dni) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->dni = $dni;
  }

  public function obtenerNombreCompleto() {
    return $this->nombre . ' ' . $this->apellido;
  }
}

?>
