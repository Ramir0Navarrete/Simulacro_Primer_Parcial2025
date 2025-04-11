<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";

//objetos clientes

$objCliente1 = new Cliente("Ramiro", "Navarrete", true, "DNI", 39681359);
$objCliente2 = new Cliente("Karen", "Gonzales", true, "DNI", 37549593);

//objetos motos

$objMotos1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMotos2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMotos3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

//objetos empresa

$coleccion_de_motos= [$objMotos1, $objMotos2, $objMotos3];
$coleccion_de_clientes = [$objCliente1, $objCliente2];
$coleccion_de_ventas_realizadas=[];
$objetoEmpresa = new Empresa("Alta Gama","Av Argenetina 123",$coleccion_de_clientes,$coleccion_de_motos,$coleccion_de_ventas_realizadas);

// registrar ventas
$codigos =[11,12,13];

$ventaNum1 = $objetoEmpresa->registrarVenta($codigos,$objCliente2);
echo $ventaNum1 == -1 ? "Importe de venta 1: VENTA NO DISPONIBLE\n" : "importe de venta: $ventaNum1\n";

$ventaNum2 = $objetoEmpresa->registrarVenta([0], $objCliente2);
echo $ventaNum2 == -1 ? "Importe de venta 2: VENTA NO DISPONIBLE\n" : "importe de venta: $ventaNum2\n";

$ventaNum3 = $objetoEmpresa->registrarVenta([2], $objCliente2);
echo $ventaNum3 == -1 ? "Importe de venta 3: VENTA NO DISPONIBLE\n" : "importe de venta: $ventaNum3\n";

// ventas por cliente
$ventasClienteUno = $objetoEmpresa->retornarVentasxCliente("DNI",39681359);
echo "VENTAS DEL CLIENTE 1:\n";
$cantVentasUno = count($ventasClienteUno);
if($cantVentasUno == 0){
    echo "NO SE ENCONTRARON VENTAS. \n";
} else{
    foreach ($ventasClienteUno as $venta){
        echo $venta . "\n---------------\n";
    }
}
$ventasClienteDos = $objetoEmpresa->retornarVentasxCliente("DNI",37549593);
echo "VENTAS DEL CLIENTE 2:\n";
$cantVentasDos = count($ventasClienteDos);
if($cantVentasDos == 0){
    echo "NO SE ENCONTRARON VENTAS. \n";
} else{
    foreach ($ventasClienteDos as $venta){
        echo $venta . "\n---------------\n";
    }
}
// mostrar empresa
echo "\nINFORMACIÓN DE LA EMPRESA:\n";
echo $objetoEmpresa;
?>





