<?php

class GenerarLista {
    protected $host = 'localhost';
    protected $user = '';
    private $password = '';
    protected $database = 'notas_terciario';
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    public function getListaAlumnos() {
        
        $query = "SELECT * FROM alumnos";
        $result = $this->conn->query($query);
    
        $listaAlumnos = array();
    
        while ($row = $result->fetch_assoc()) {
            $listaAlumnos[] = $row;
        }
    
        return $listaAlumnos;
    }
    
    public function getCarreras() {
        $query = "SELECT * FROM carreras";
        $result = $this->conn->query($query);
    
        $carreras = array();
    
        while ($row = $result->fetch_assoc()) {
            $carreras[] = $row;
        }
    
        return $carreras;
    }

    public function getListaAlumnosByUc($id_uc) {
        $query = "SELECT * FROM alumnos WHERE id_uc = '$id_uc'";
        $result = $this->conn->query($query);
    
        $listaAlumnos = array();
    
        while ($row = $result->fetch_assoc()) {
            $listaAlumnos[] = $row;
        }
    
        return $listaAlumnos;
    }
    
      public function getListaAlumnosByComision($id_comision) {
        $query = "SELECT * FROM alumnos WHERE id_comision = '$id_comision'";
        $result = $this->conn->query($query);
    
        $listaAlumnos = array();
    
        while ($row = $result->fetch_assoc()) {
            $listaAlumnos[] = $row;
        }
    
        return $listaAlumnos;
    }

      public function closeConnection() {
        $this->conn->close();
}

}
?>