<?php

class Profesor {
    private $profesor_id;
    private $mail;
    private $nombre_profesor;
    private $apellido_profesor;

    public function __construct($nombre_profesor, $apellido_profesor, $mail) {
        $this->nombre_profesor = $nombre_profesor;
        $this->apellido_profesor = $apellido_profesor;
        $this->mail = $mail;
        
}

}
?>