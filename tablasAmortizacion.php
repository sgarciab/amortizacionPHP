<?php
require 'Prestamo.php';

$capital = $_POST['capital'];
$tipo =$_POST['tipo'];
$plazo = $_POST['plazo'];
$interes=0.1123;
            
$prestamo= new Prestamo();    
$prestamo->setCapital($capital);
$prestamo->setTasaInteres($interes);
$prestamo->pagos(1, $plazo, $prestamo->calcCuotaFrancesa($plazo));
$prestamo->calcTablaDePagos(true);
$prestamo->getHtmlPrestamo();
$prestamo->calcTablaDePagos();
$prestamo->getHtmlPrestamo();


            

            
            
