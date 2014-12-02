
<div id="contentTables">
    
    <div id="divFrancesa">
        <h4>Amortizacion Francesa <small> Cuotas Iguales</small></h4>
        <table  class="table table-bordered">
            <th>Periodo</th><th>Cuota</th><th>Capital</th><th>Inter&eacute;s</th><th>Saldo Capital</th>
            <?php    foreach ($tablaFrancesa as $value): ?>
                    
                <?php   if($value['Periodo']>0): ?>
                
                    <tr> <?= PHP_EOL; ?>
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
    
    
    <div id="divAlemana" class="divAmort">
        <h4>Amortizacion Alemana <small>Iguales Aportes al Capital </small></h4>
        <table class="table table-bordered">
          <th>Periodo</th><th>Cuota</th><th>Capital</th><th>Inter&eacute;s</th><th>Saldo Capital</th>
            <?php    foreach ($tablaAlemana as $value): ?>
                <?php   if($value['Periodo']>0): ?>
                    <tr> <?= PHP_EOL; ?>
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
