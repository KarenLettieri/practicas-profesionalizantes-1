<?php
class Carrera {
    private $carrera_id;
    private $nombre;

    public function __construct($carrera_id, $nombre) {
        $this->carrera_id = $carrera_id;
        $this->nombre = $nombre;
    }
}

?>