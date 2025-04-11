<?php
Class Moto {
    private $codigoMoto;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncrAnual;
    private $activa;

    /** CONSTRUCTOR
     * @param INT $codigoMoto;
     * @param FLOAT $costo;
     * @param INT $anioFabricacion;
     * @param STRING $descripcion;
     * @param FLOAT $porcIncrAanual;
     * @param BOOL $activa;
     */
    public function __construct($codigoMoto,$costo,$anioFabricacion,$descripcion,$porcIncrAanual,$activa){
        $this-> codigoMoto = $codigoMoto;
        $this-> costo = $costo;
        $this-> anioFabricacion = $anioFabricacion;
        $this-> descripcion = $descripcion;
        $this-> porcIncrAnual = $porcIncrAanual;
        $this-> activa = $activa;  
    }
    // GETTERS
    public function getCodigoMoto(){
        return $this-> codigoMoto;
    }
    public function getCosto(){
        return $this-> costo;
    }
    public function getAnioFabricacion(){
        return $this-> anioFabricacion;
    }
    public function getDescripcion(){
        return $this-> descripcion;
    }
    public function getPorcIncrAnual(){
        return $this-> porcIncrAnual;
    }
    public function getActiva(){
        return $this-> activa;
    }

    // SETTERS
    public function setCodigoMoto($codigoMoto){
        $this-> codigoMoto = $codigoMoto;
    }
    public function setCosto($costo){
        $this-> costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this-> anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this-> descripcion = $descripcion;
    }
    public function setPorcIncrAnual ($porcIncrAanual){
        $this-> porcIncrAnual = $porcIncrAanual;
    }
    public function setActiva ($activa){
        $this-> activa = $activa;
    }
    // TOSTRING
    public function __toString(){
        $estado = $this->getActiva() ? "Disponible" : "No disponible";
        return "Código de la moto: " . $this->getCodigoMoto() . "\n". 
        "Anio de fabricación: " . $this->getAnioFabricacion() . "\n" .
        "Costo: " . "$" . $this->getCosto() . "\n".
        "Descripciópn: " . $this->getDescripcion() .  "\n" .
        "Porcentaje de Incremento Anual: " . $this->getPorcIncrAnual() . "%" . "\n" . 
        "Estado: " . $estado . "\n";
    }


    // DAR PRECIO DE VENTA
    public function darPrecioVenta (){
        $aniosTranscurridos = 2025 - $this->getAnioFabricacion();

        if($this->getActiva()){
            $precioVenta = $this->getCosto() + $this->getCosto() *($aniosTranscurridos*($this->getPorcIncrAnual()/100));
        } else{
            $precioVenta = -1;        }
        return $precioVenta;
    }
}
?>