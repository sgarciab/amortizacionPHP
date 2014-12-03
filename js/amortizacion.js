$(document).ready(function () {
    
    $('#formularioAmort').on('submit',function(e){
        e.preventDefault();
        
        $('#tablasAmortizacion').load('tablasAmortizacion.php',{
           capital:$('#inputCapital').val(),
           tipo:$('#inputTipoAmortizacion').val(),
           plazo:$('#inputPlazo').val(),
           async:false
        },function(){
            $('#contentTables').tabs();
            $('#inputPlazoVencimiento').keyup(function(){
                var plazo=$('#inputPlazoVencimiento').val();
                var capital=parseFloat($('#valCapital').val());
                var tasa=$('#valTasa').val();
                
                var interes= capital*plazo*(tasa/365);
                var pago=interes+capital;
                $('#inputInteres').val(interes.toFixed(2));
                $('#inputPago').val(pago.toFixed(2));

            });
        });
    });
    
    
    $('#inputTipoAmortizacion').change(function(){
        $('#inputPlazo').val('');

        $('#inputPlazo').attr('max',$('#inputTipoAmortizacion').val()*4);
        
        
    });
 
});
