<?php

class UnidadCurricular extends Database {
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


protected function create(){
    $this->query = "INSERT INTO correlatividades (uc_id, correlativa) VALUES ('$this->uc_id', '$this->correlativa')";
    $this->execute_single_query();
}

protected function delete() {
   $this->query="DELETE FROM unidadescurriculares WHERE uc_id = '$this->uc_id'";
    $this->execute_single_query();
}

protected function update() {
    $this->query="UPDATE unidadescurriculares SET nombre = '$this->nombre', carrera_id = '$this->carrera_id', correlativa = '$this->correlativa', formato = '$this->formato' WHERE uc_id = '$this->uc_id'";
}

public function getCondicion($nota, $asistencia) {
    switch($this->formato){
        case "taller":
            if($nota >= 6 && $asistencia >= 75){
                return "Promocion directa";
            }
            elseif($nota < 6 && $asistencia < 75){
                return "Alumno regular, debe rendir examen final";
            }
            else{
                return "Recursa";
            }
        case "materia":
            if($nota >= 8 && $asistencia >= 75){
                return "Promocion directa";
            }
            elseif(($nota >= 6 && $nota < 8) && $asistencia < 75){
                return "Alumno regular, debe rendir examen final";
            }
            else{
                return "Alumno libre.";
            }
            
           
        case "proyecto":
            if($nota >= 6 && $asistencia >= 75){
                return "Promocion directa";
            }
            else{
                return "Debe rendir examen final";
            }
            
        case "practicaprofesionalizante":
            if($nota >= 7 && $asistencia >= 75){
                return "Alumno en condiciones de rendir final";
            }
            else{
                return "Recursa";
            }
        default:
            return "No se encontro el formato";
        }


}
}

?>