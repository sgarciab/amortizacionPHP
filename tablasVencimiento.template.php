<div  id="contentVenci"  class="">
    <h4>Pago al Vencimiento </h4>
        <table  class="table table-bordered">
            <tr><td class="summaryLabel"> Capital</td>    <td class="summaryValue">$<?= number_format($datosVencimiento['capital'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel">Ingrese el Plazo en D&iacute;as</td>      <td class="summaryValue"><?= number_format($datosVencimiento['plazo'], 0, ',', '.')   ?> </td></tr>
        </table>
    <input type="hidden" id="valTasa" value="<?=$datosVencimiento['tasa']?>" >
    <input type="hidden" id="valCapital" value="<?=$datosVencimiento['capital']?>" >
    
        <table  class="table table-bordered">
            <tr><td class="summaryLabel">Tasa de Inter&eacute;s Nominal </td>    <td class="summaryValue"><?= number_format(bcmul($datosVencimiento['tasa'],'100'), $dec, ',', '.')   ?>%</td></tr>
            <tr><td class="summaryLabel">Inter&eacute;s al Vencimiento</td>      <td class="summaryValue">$<?= number_format($datosVencimiento['interes'], $dec, ',', '.')   ?></td></tr>
            <tr><td class="summaryLabel">Pago Total al Vencimiento</td>          <td class="summaryValue">$<?= number_format($datosVencimiento['pago'], $dec, ',', '.')   ?></td></tr>
        </table>
        
</div>