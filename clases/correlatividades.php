<?php

class Correlatividades extends Database {

   private $correlatividad_id;    
    private $uc_id;
    private $correlativa;

    public function __construct($correlatividad_id, $uc_id, $correlativa) {
        $this->correlatividad_id = $correlatividad_id;
        $this->uc_id = $uc_id;
        $this->correlativa = $correlativa;
    }

    public function getCorrelatividadId() {
        return $this->correlatividad_id;
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