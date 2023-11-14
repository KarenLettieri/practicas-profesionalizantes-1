<?php

class UnidadCurricular {
    private $uc_id;
    private $nombre;
    private $carrera_id;
    private $correlativa;
    private $formato;

    public function __construct($nombre, $carrera_id, $correlativa, $formato)   {
            $this->nombre = $nombre;
            $this->carrera_id = $carrera_id;
            $this->correlativa = (string) $correlativa;
            $this->formato = (string) $formato;
}
}

?>