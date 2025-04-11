<?php
class Cliente {
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDoc;
    private $numDoc;

    /** CONSTRUCTOR
     * @param STRING $nombre;
     * @param STRING $apellido;
     * @param BOOL $estado;
     * @param STRING $tipoDoc;
     * @param INT $numDoc;
     */
    public function __construct($nombre,$apellido,$estado,$tipoDoc,$numDoc){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;    
    }
    // GETTERS 
    public function getNombre(){
        return $this-> nombre;
    }
    public function getApellido(){
        return $this-> apellido;
    }
    public function getEstado(){
        return $this-> estado;
    }
    public function getTipoDoc(){
        return $this-> tipoDoc;
    }
    public function getNumDoc(){
        return $this-> numDoc;
    }
    // SETTERS
    public function setNombre($nombre){
        $this-> nombre = $nombre;
    }
    public function setApellido($apellido){
        $this-> apellido = $apellido;
    }
    public function setEstado($estado){
        $this-> estado = $estado;
    }
    public function setTipoDoc($tipoDoc){
        $this-> tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc){
        $this-> numDoc = $numDoc;
    }
    /** MÉTODO TOSTRING */
    public function __toString(){
        $estado = $this->getEstado() ? "Activo" : "Inactivo";
        return "Nombre: " . $this->getNombre() . "\n" .
         "Apellido: " . $this->getApellido() . "\n" .
          "Estado: " . $estado . "\n" .
        "Tipo de Documento: " . $this->getTipoDoc() . "\n" .
         "Número de Documento: " . $this->getNumDoc();
    }
       

}
?>