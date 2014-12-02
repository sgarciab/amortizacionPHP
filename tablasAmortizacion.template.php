
<div id="contentTables">
    
    <div id="divFrancesa" class="divAmort">
        <h3>Amortizacion Francesa <small> Cuotas Iguales</small></h3>
        <hr>
        <table  class="table table-bordered">
            <tr><td><strong>Cuota <?= $tipoAmortizacion ?></strong></td><td>$<?= number_format($datosFrancesa['cuota'], $dec, ',', '.')   ?></td></tr>
            <tr><td><strong>Inter&eacute;s Acumulado</strong></td><td>$<?= number_format($datosFrancesa['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td><strong>Tasa de Inter&eacute;s Nominal</strong></td><td><?= number_format($datosFrancesa['tasa'], $dec, ',', '.')   ?>%</td></tr>
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
                    <td> <?= number_format($value['Periodo'], 0, ',', '.')          ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Cuota'], $dec, ',', '.')         ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Amortizacion'], $dec, ',', '.')  ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Interes'], $dec, ',', '.')       ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                <?php  else: ?>     
                    <tr class="headerRow"> <?= PHP_EOL; ?>
                    <td> 0 </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                    
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
            <tr><td><strong>Cuota de Capital <?= $tipoAmortizacion ?></strong></td><td>$<?= number_format($datosAlemana['cuota'], $dec, ',', '.')   ?></td></tr>
            <tr><td><strong>Inter&eacute;s Acumulado</strong></td><td>$<?= number_format($datosAlemana['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td><strong>Tasa de Inter&eacute;s Nominal</strong></td><td><?= number_format($datosAlemana['tasa'], $dec, ',', '.')   ?>%</td></tr>
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
                    <td> <?= number_format($value['Periodo'], 0, ',', '.')          ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Cuota'], $dec, ',', '.')         ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Amortizacion'], $dec, ',', '.')  ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Interes'], $dec, ',', '.')       ?> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                <?php  else: ?>     
                    <tr> <?= PHP_EOL; ?>
                    <td> 0 </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> </td> <?=PHP_EOL; ?>
                    <td> $<?= number_format($value['Saldo'] , $dec, ',', '.')        ?> </td> <?=PHP_EOL; ?>
                    
                <?php  endif; ?> 
           <?php    endforeach; ?>

        </table>  
    </div>


</div>
