<?php
class Alumno 
{
    protected $host = 'localhost';
    protected $user = '';
    private $password = '';
    protected $database = 'notas_terciario';
    protected $conn;

    private $alumno_id;
    private $nombre;
    private $apellido;
    private $dni;
    private $f_nacimiento;
    private $carrera_id;

   

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

  public function obtenerNombreCompleto() {
    return $this->nombre . ' ' . $this->apellido;
  }

  public function closeConnection() {
    $this->conn->close();
}
}

?>
