<?php
require 'Prestamo.php';

$capital = $_POST['capital'];
$tipo =$_POST['tipo'];
$plazo = $_POST['plazo'];
$interes=0.1123;
            
$prestamo= new Prestamo();    
$prestamo->setCapital($capital);
$prestamo->setIterador(intval($tipo));
$prestamo->setTasaInteres($interes);

$prestamo->pagos(1, $plazo, $prestamo->calcCuotaFrancesa($plazo));

imprimirTablas($prestamo->calcTablaDePagos(false), $prestamo->calcTablaDePagos(true));

function imprimirTablas($tablaFrancesa, $tablaAlemana,$dec=2)
{
   require 'tablasAmortizacion.template.php';
}


            

            
            
