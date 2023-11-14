<?php

class Nota {
    private $nota_id;
    private $alumno_id;
    private $uc_id;
    private $nota;

    public function __construct($nota_id, $alumno_id, $uc_id, $nota) {
        $this->nota_id = $nota_id;
        $this->alumno_id = $alumno_id;
        $this->uc_id = $uc_id;
        $this->nota = $nota;
    }

    public function getNotasbyAlumno($alumno_id) {
        if($alumno_id == $this->alumno_id){
            return $this->nota;
        }
        else {
            return "No se encontro la nota en ese alumno";
        }
    }

    
}

?>