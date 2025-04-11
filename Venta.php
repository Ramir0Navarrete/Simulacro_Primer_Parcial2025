<?php
include_once "Moto.php";
include_once "Cliente.php";
Class Venta {
    private $numeroVenta;
    private $fechaVenta;
    private $refeCliente;
    private $refeColeMotos;
    private $precioFinal;

    /** CONSTRUCTOR
     * @param INT $numeroVenta;
     * @param STRING $fechaVenta;
     * @param CLASS $refeCliente;
     * @param ARRAY $refeColeMotos;
     * @param FLOAT $precioFinal;
     */

    public function __construct($numeroVenta,$fechaVenta, Cliente $refeCliente, $refeColeMotos, $precioFinal){
        $this-> numeroVenta = $numeroVenta;
        $this-> fechaVenta = $fechaVenta;
        $this-> refeCliente = $refeCliente;
        $this-> refeColeMotos = $refeColeMotos;
        $this-> precioFinal = $precioFinal; 
    }

    // GETTERS
    public function getNumVenta(){
        return $this-> numeroVenta;
    }
    public function getFechaVenta(){
        return $this-> fechaVenta;
    }
    public function getRefeCliente(){
        return $this-> refeCliente;
    }
    public function getRefeColeMotos(){
        return $this-> refeColeMotos;
    }
    public function getPrecioFinal(){
        return $this-> precioFinal;
    }
    // SETTERS 
    public function setNumVenta($numeroVenta){
        $this-> numeroVenta = $numeroVenta;
    }
    public function setFechaVenta($fechaVenta){
        $this-> fechaVenta = $fechaVenta;
    }
    public function setRefeCliente($refeCliente){
        $this-> refeCliente = $refeCliente;
    }
    public function setRefeColeMotos($refeColeMotos){
        $this-> refeColeMotos = $refeColeMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this-> precioFinal = $precioFinal;
    }

    // MÉTODO TOSTRING
    public function __toString(){
        $motos = $this->getRefeColeMotos();
        $coleccionMotos = "";
        foreach ($motos as $moto){
            $coleccionMotos = $coleccionMotos . $moto . "\n";
        }
        return 
        "Venta número: " . $this->getNumVenta() . "\n" .
         "Fecha de la venta: " . $this->getFechaVenta() . "\n" .
        "Cliente: " . $this->getRefeCliente() . "\n" .
        "Colección de Motos: " . $coleccionMotos . "\n" .
        "El precio final es: $ " . $this->getPrecioFinal();
    }

    // INCORPORAR MOTO
    public function incorporarMoto(Moto $objMoto) {
        if ($objMoto->getActiva()) {
    
            $coleccion = $this->getRefeColeMotos();
            $coleccion[] = $objMoto;
            $this->setRefeColeMotos($coleccion);
    
    
            $precio = $this->getPrecioFinal() + $objMoto->darPrecioVenta();
            $this->setPrecioFinal($precio);
        }
    }
    
}
?>
    

