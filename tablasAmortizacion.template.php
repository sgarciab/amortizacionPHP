
<div id="contentTables">
    
    <ul>
        <li><a href="#divPagosPeriodicos">Pagos Peri&oacute;cos</a></li>
    <li><a href="#divPagosVencimiento">Pagos por Vencimiento</a></li>
    
    </ul>
    <div  id="divPagosPeriodicos"  class="divAmort">
    <h2>Pagos Peri&oacute;dicos <small> Tablas de Amortizaci&oacute;n</small></h2>
    <div id="divFrancesa" class="divAmort">
        <h3>Amortizacion Francesa <small> Cuotas Iguales</small></h3>
        <hr>
        <table  class="table table-bordered">
            <tr><td class="summaryLabel"><strong>Cuota <?= $tipoAmortizacion ?></strong></td>   <td class="summaryValue">$<?= number_format($datosFrancesa['cuota'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Inter&eacute;s Acumulado</strong></td>         <td class="summaryValue">$<?= number_format($datosFrancesa['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Tasa de Inter&eacute;s Nominal</strong></td>   <td class="summaryValue"><?= number_format($datosFrancesa['tasa'], $dec, ',', '.')   ?>%</td></tr>
        </table>
        
        <hr>
        <table  class="table table-bordered">
            <th>Periodo</th><th>Cuota</th><th>Capital</th><th>Inter&eacute;s</th><th>Saldo Capital</th>
            <?php ?>
            <?php    foreach ($tablaFrancesa as $value): ?>
                    
                <?php   if ($value['Periodo'] % 2 == 0)
                            $cl='par'; 
                        else
                            $cl='impar'
                            ?>
            
                <?php   if($value['Periodo']>0): ?>
                    
                    <tr class="<?= $cl?>"> <?= PHP_EOL; ?>
                    <td class="periodo"> <?= number_format($value['Periodo'], 0, ',', '.')          ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Cuota'], $dec, ',', '.')         ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Amortizacion'], $dec, ',', '.')  ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Interes'], $dec, ',', '.')       ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                <?php  else: ?>     
                    <tr class="<?= $cl?>"> <?= PHP_EOL; ?>
                    <td class="periodo"> 0 </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                    
                <?php  endif; ?>       
           <?php    endforeach; ?>

        </table>  
    </div>
    
    <hr>
    <hr>
    <div id="divAlemana" class="divAmort">
        <h3>Amortizacion Alemana <small>Iguales Aportes al Capital </small></h3>
        <hr>
        <table  class="table table-bordered">
            <tr><td class="summaryLabel"><strong>Cuota de Capital <?= $tipoAmortizacion ?></strong></td>    <td class="summaryValue">$<?= number_format($datosAlemana['cuota'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Inter&eacute;s Acumulado</strong></td>                     <td class="summaryValue">$<?= number_format($datosAlemana['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Tasa de Inter&eacute;s Nominal</strong></td>               <td class="summaryValue"><?= number_format($datosAlemana['tasa'], $dec, ',', '.')   ?>%</td></tr>
        </table>
        
        <hr>
        <table class="table table-bordered">
          <th>Periodo</th><th>Cuota</th><th>Capital</th><th>Inter&eacute;s</th><th>Saldo Capital</th>
            <?php    foreach ($tablaAlemana as $value): ?>
                <?php   if ($value['Periodo'] % 2 == 0)
                            $cl='par'; 
                        else
                            $cl='impar'
                            ?>
            
                <?php   if($value['Periodo']>0): ?>
                    
                    <tr class="<?= $cl?>"> <?= PHP_EOL; ?>
                    <td class="periodo"> <?= number_format($value['Periodo'], 0, ',', '.')          ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Cuota'], $dec, ',', '.')         ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Amortizacion'], $dec, ',', '.')  ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Interes'], $dec, ',', '.')       ?> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                <?php  else: ?>     
                    <tr> <?= PHP_EOL; ?>
                    <td class="periodo"> 0 </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> </td> <?=PHP_EOL; ?>
                    <td class="numbers"> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                    
                <?php  endif; ?> 
           <?php    endforeach; ?>

        </table>  
    </div>
    <hr>
    </div>
    
    <div  id="divPagosVencimiento"  class="divAmort">
    <h2>Pago al Vencimiento </h2>
        <table  class="table table-bordered">
            <tr><td class="summaryLabel"><strong> Capital <?= $tipoAmortizacion ?></strong></td>    <td class="summaryValue">$<?= number_format($datosVencimiento['capital'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Plazo en D&iacute;as</strong></td>                 <td class="summaryValue"><?= number_format($datosVencimiento['plazo'], 0, ',', '.')   ?></td></tr>
        </table>
        
        <table  class="table table-bordered">
            <tr><td class="summaryLabel"><strong>Tasa de Inter&eacute;s Nominal </strong></td>    <td class="summaryValue"><?= number_format(bcmul($datosVencimiento['tasa'],'100'), $dec, ',', '.')   ?>%</td></tr>
            <tr><td class="summaryLabel"><strong>Inter&eacute;s al Vencimiento</strong></td>      <td class="summaryValue">$<?= number_format($datosVencimiento['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel"><strong>Pago Total al Vencimiento</strong></td>          <td class="summaryValue">$<?= number_format($datosVencimiento['pago'], $dec, ',', '.')   ?></td></tr>
        </table>
        
    </div>


</div>
