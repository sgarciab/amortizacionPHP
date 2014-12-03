<?php


$capital = $_POST['capital'];
$plazo = $_POST['plazo'];
$interes=0.1123;





$datosVencimiento=array();
$datosVencimiento['capital']=$capital;
$datosVencimiento['plazo']=$plazo;
$datosVencimiento['tasa']= $interes;
$datosVencimiento['interes']=  bcmul($datosVencimiento['capital'], bcmul(  $datosVencimiento['plazo'],  bcdiv($datosVencimiento['tasa'] ,'365')));
$datosVencimiento['pago']=  bcadd($datosVencimiento['capital'],$datosVencimiento['interes']);


    
imprimirTablas($datosVencimiento);


function imprimirTablas($datosVencimiento,$dec=2)
{
   require 'tablasVencimiento.template.php';
}


            

            
            
