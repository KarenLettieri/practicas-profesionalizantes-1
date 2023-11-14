<?php
class Alumno {
  public $nombre;
  public $apellido;
  public $legajo;

  public function __construct($nombre, $apellido, $legajo) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->legajo = $legajo;
  }

  public function obtenerNombreCompleto() {
    return $this->nombre . ' ' . $this->apellido;
  }
}

?>
