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
    $this->query = "DELETE FROM correlatividades WHERE correlatividad_id = '$this->correlatividad_id'";
    $this->execute_single_query();
}

protected function update() {
    $this->query = "UPDATE correlatividades SET uc_id = '$this->uc_id', correlativa = '$this->correlativa' WHERE correlatividad_id = '$this->correlatividad_id'";
    $this->execute_single_query();
}

public function getCorrelatividades() {
    $this->query = "SELECT '$this->correlativa' FROM correlatividades WHERE uc_id = '$this->uc_id'";
    $this->get_results_from_query();
    return $this->rows;
}
}

?>