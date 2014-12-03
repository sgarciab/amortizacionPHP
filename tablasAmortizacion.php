<?php
require 'clases/Prestamo.php';

$capital = $_POST['capital'];
$tipo =$_POST['tipo'];
$plazo = $_POST['plazo'];
$interes=0.1123;



$optionsAmortizacion=array('12'=>'Mensual','4'=>'Trimestal','2'=>'Semestral');

$tipoAmortizacion=$optionsAmortizacion[$tipo];

$prestamo= new Prestamo();    
$prestamo->setCapital($capital);
$prestamo->setIterador(intval($tipo));
$prestamo->setTasaInteres($interes);
$prestamo->pagos(1, $plazo, $prestamo->calcCuotaFrancesa($plazo));


$amortFrancesa=$prestamo->calcTablaDePagos(false);
$amortAlemana=$prestamo->calcTablaDePagos(true);

$datosFrancesa=array();
$datosFrancesa['cuota']=0;
$datosFrancesa['interes']=0;
$datosFrancesa['tasa']=$interes*100;
foreach ($amortFrancesa as $value)
{
     $datosFrancesa['interes']=$datosFrancesa['interes']+$value['Interes'];
     $datosFrancesa['cuota']=$value['Cuota'];
}


$datosAlemana=array();
$datosAlemana['cuota']=0;
$datosAlemana['interes']=0;
$datosAlemana['tasa']=$interes*100;
foreach ($amortAlemana as $value)
{
     $datosAlemana['interes']=$datosAlemana['interes']+$value['Interes'];
     $datosAlemana['cuota']=$value['Amortizacion'];
}


$datosVencimiento=array();
$datosVencimiento['capital']=$capital;
$datosVencimiento['plazo']=bcmul( $plazo, bcmul( '30', bcdiv($tipo,'12')));
$datosVencimiento['tasa']= $interes;
$datosVencimiento['interes']=  bcmul($datosVencimiento['capital'], bcmul(  $datosVencimiento['plazo'],  bcdiv($datosVencimiento['tasa'] ,'365')));
$datosVencimiento['pago']=  bcadd($datosVencimiento['capital'],$datosVencimiento['interes']);


    
imprimirTablas($amortFrancesa, $amortAlemana,$datosFrancesa,$datosAlemana,$tipoAmortizacion,$datosVencimiento);


function imprimirTablas($tablaFrancesa, $tablaAlemana,$datosFrancesa,$datosAlemana,$tipoAmortizacion,$datosVencimiento,$dec=2)
{
   require 'tablasAmortizacion.template.php';
}


            

            
            
