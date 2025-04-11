<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";

class Empresa {    private $denom;
    private $direcc;
    private $coleccion_clientes;
    private $coleccion_motos;
    private $coleccion_ventas;

    /** CONSTRUCTOR
     * @param STRING $denom;
     * @param STRING $direcc;
     * @param ARRAY $coleccion_clientes;
     * @param ARRAY $coleccion_motos;
     * @param ARRAY $coleccion_ventas;
     */
    
    public function __construct($denom,$direcc,$coleccion_clientes,$coleccion_motos,$coleccion_ventas){
        $this-> denom = $denom;
        $this-> direcc = $direcc;
        $this-> coleccion_clientes = $coleccion_clientes;
        $this-> coleccion_motos = $coleccion_motos;
        $this-> coleccion_ventas = $coleccion_ventas;   
    }
    
    // GETTERS
    public function getDenom(){
        return $this-> denom;
    }
    public function getDirecc(){
        return $this-> direcc;
    }
    public function getClientesColecc(){
        return $this-> coleccion_clientes;
    }
    public function getMotosColecc(){
        return $this-> coleccion_motos;
    }
    public function getVentasColecc(){
        return $this-> coleccion_ventas;
    }
    // SETTERS
    public function setDenom($denom){
        $this-> denom = $denom;
    }
    public function setDirecc($direcc){
        $this-> direcc = $direcc;
    }
    public function setClientesColecc($coleccion_clientes){
        $this-> coleccion_clientes = $coleccion_clientes;
    }
    public function setMotosColecc($coleccion_motos){
        $this-> coleccion_motos = $coleccion_motos;
    }
    public function setVentasColecc($coleccion_ventas){
        $this-> coleccion_ventas = $coleccion_ventas;
    }

    // MÉTODO TOSTRING
    public function __toString(){
        $clientes = "";
        foreach($this->getClientesColecc() as $cliente){
            $clientes = $clientes . $cliente . "\n \n";
        }
        $motos = "";
        foreach($this->getMotosColecc() as $moto){
            $motos = $motos . $moto . "\n \n";
        }
        $ventas = "";
        foreach($this->getVentasColecc() as $venta){
            $ventas = $ventas . $venta . "\n \n";
        }
        return "Denominación: " . $this->getDenom() . "\n" . "Dirección: " . $this->getDirecc() . "\n" .
        "Colección de clientes: " . $clientes . "\n" .
        "Colección de motos: " . $motos . "\n" .
        "Colección de ventas: " . $ventas . "\n";  
    }

    // RETORNAR MOTO
    public function retornarMoto($codigoMoto){
        $coleccionMotos = $this->getMotosColecc();
        $encontrada = false;
        $i = 0;
        $cant = count($coleccionMotos);
        $hayMotos = null;
        
        while ($i < $cant && !$encontrada){
            if($coleccionMotos[$i]->getCodigoMoto() == $codigoMoto){
                $hayMotos = $coleccionMotos[$i];
                $encontrada = true;
            }
            $i++;
        }
        return $hayMotos;
    }

    // REGISTRAR VENTA
    public function registrarVenta($colCodigosMoto,$objCliente){
        $importeFinal = -1;

        if($objCliente->getEstado()){
            $coleccionVentaMotos=[];
            $precioTotal = 0;
            $i=0;
            $cantCodigos = count($colCodigosMoto);
            while($i < $cantCodigos){
                $codigo = $colCodigosMoto[$i];
                $moto = $this->retornarMoto($codigo);

                if($moto !== null && $moto->getActiva()){
                    $precio = $moto->darPrecioVenta();
                    if($precio > 0){
                        $coleccionVentaMotos[]=$moto;
                        $precioTotal += $precio;
                        $moto->setActiva(false);
                    }
                }
                $i++;
            }
            if(count($coleccionVentaMotos) > 0){
                $fechaActual = date("d/m/Y");
                $numeroVenta = count($this->getVentasColecc()) +1;

                $venta = new Venta($numeroVenta,$fechaActual,$objCliente,$coleccionVentaMotos,$precioTotal);
                $ventas = $this->getVentasColecc();
                $ventas[] = $venta;
                $this->setVentasColecc($ventas);
                $importeFinal = $precioTotal;
                 
                
        }

    }
        return $importeFinal;
    }
    // RETORNAR VENTAS POR CLIENTE 
    public function retornarVentasxCliente($tipo,$numDocumento){
        $ventasPorCliente = [];
        $coleccionVentas = $this->getVentasColecc();
        $cant = count($coleccionVentas);
        $i = 0;

        while($i < $cant){
            $venta = $coleccionVentas[$i];
            $cliente = $venta->getRefeCliente();
            if($cliente->getTipoDoc() == $tipo && $cliente->getNumDoc() == $numDocumento){
                $ventasPorCliente[]=$venta;
            }
            $i++;
        }
        return $ventasPorCliente;
    }
}
?>