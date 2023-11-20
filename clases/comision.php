<?php
require_once 'db.php'; 

class Comision extends Database {
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

  
    public function create() {
        $this->query = "INSERT INTO comisiones (carrera_id, uc_id, CupoMaximo, profesor_id) 
                  VALUES ('$this->carrera_id', '$this->uc_id', '$this->cupoMaximo', '$this->profesor_id')";
        $this->execute_single_query();

       
        if ($this->conn->affected_rows > 0) {
            return "Se creó la comisión correctamente.";
        } else {
            return "Error al crear la comisión: " . $this->conn->error;
        }
    }
   
    public function update() {
        $this->query = "UPDATE comisiones 
                  SET carrera_id = '$this->carrera_id', uc_id = '$this->uc_id', 
                      CupoMaximo = '$this->cupoMaximo', profesor_id = '$this->profesor_id' 
                  WHERE id_comision = '$this->id_comision'";
        $this->execute_single_query();

       
        if ($this->conn->affected_rows > 0) {
            return "Se actualizó la comisión correctamente.";
        } else {
            return "Error al actualizar la comisión: " . $this->conn->error;
        }
    }


    public function delete() {
        $this->query = "DELETE FROM comisiones WHERE id_comision = '$this->id_comision'";
        $this->execute_single_query();

        
        if ($this->conn->affected_rows > 0) {
            return "Se eliminó la comisión correctamente.";
        } else {
            return "Error al eliminar la comisión: " . $this->conn->error;
        }
    }

    public function createComisionConAsignacionEquitativa($alumnos) {
        $this->create(); 

        if ($this->id_comision) {
            
            $this->asignarAlumnosEquitativamente($alumnos);
            return "Se creó la comisión y se asignaron los alumnos equitativamente.";
        } else {
            return "Error al crear la comisión.";
        }
    }

    private function asignarAlumnosEquitativamente($alumnos) {
        $alumnosPorComision = min(floor(count($alumnos) / $this->cupoMaximo), $this->cupoMaximo);

        for ($i = 0; $i < $this->cupoMaximo; $i++) {
            $inicio = $i * $alumnosPorComision;
            $fin = $inicio + $alumnosPorComision;

            $alumnosAsignados = array_slice($alumnos, $inicio, $alumnosPorComision);

            foreach ($alumnosAsignados as $alumno) {
                $alumnoId = $alumno['alumno_id'];
                $query = "UPDATE alumnos SET comision_id = '$this->id_comision' WHERE alumno_id = '$alumnoId'";
                $this->execute_single_query();
            }
        }
    }

    private function obtenerDocentesComision() {
        $this->query = "SELECT DISTINCT p.* FROM profesores p
                        INNER JOIN comisiones c ON p.profesor_id = c.profesor_id
                        WHERE c.id_comision = '$this->id_comision'";
        $this->get_results_from_query();

        return $this->rows;
    }
    public function enviarPlanillaDocentes() {
        $docentes = $this->obtenerDocentesComision();
        foreach ($docentes as $docente) {
            $correoDocente = $docente['mail'];
            $asunto = "Planilla de notas para la comisión $this->id_comision";
            $mensaje = "Adjunto encontrarás la planilla de notas para la comisión $this->id_comision.";
            //PLANILLA DE ALUMNOS AGREGAR ACA
            mail($correoDocente, $asunto, $mensaje);
        }
    }

    public function getListaAlumnosComision() {
        if (!$this->id_comision) {
            return "La comisión no tiene un ID válido.";
        }

        $this->query = "SELECT a.* FROM alumnos a
                        INNER JOIN comisiones c ON a.comision_id = c.id_comision
                        WHERE c.id_comision = '$this->id_comision'";
        $this->get_results_from_query();

        return $this->rows;
    }


}


?>
