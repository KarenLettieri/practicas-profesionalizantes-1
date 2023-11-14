<?php
abstract class Database
{
    protected $host = 'localhost';
    protected $user = '';
    private $password = '';
    protected $query;
    protected $database = 'notas_terciario';
    protected $conn;
    protected $rows = array();

    abstract protected function create();
    abstract protected function update();
    abstract protected function delete();


    private function open_connection()
    {
        if ($this->conn == null) {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        }
        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    private function close_connection()
    {
        $this->conn->close();
    }

    protected function execute_single_query()
    {
        $this->open_connection();
        $this->conn->query($this->query);

    }


    protected function get_results_from_query()
    {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        array_pop($this->rows);
    }
}
?>