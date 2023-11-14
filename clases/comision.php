<?php

class Comision {
    private $id_comision;
    private $carrera_id;
    private $uc_id;
    private $cupoMaximo;
    private $profesor_id;

    public function __construct($id_comision, $carrera_id, $uc_id, $cupoMaximo, $profesor_id) {
        $this->id_comision = $id_comision;
        $this->carrera_id = $carrera_id;
        $this->uc_id = $uc_id;
        $this->cupoMaximo = $cupoMaximo;
        $this->profesor_id = $profesor_id;
    }

    public function createComision(){
        return "Se creo la comision";
    }
}

?>