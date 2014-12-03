$(document).ready(function () {
    $('#container').tabs();
    
    
    $('#formularioAmort').on('submit',function(e){
        e.preventDefault();
        
        $('#tablasAmortizacion').load('tablasAmortizacion.php',{
           capital:$('#inputCapital').val(),
           tipo:$('#inputTipoAmortizacion').val(),
           plazo:$('#inputPlazo').val(),
           async:false
        },function(){
            
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
    
    
    $('#formularioVenci').on('submit',function(e){
        e.preventDefault();
        
        $('#tablasVenci').load('tablasVencimiento.php',{
           capital:$('#inputCapitalVenci').val(),
           plazo:$('#inputPlazoVenci').val(),
           async:false
        },function(){
        
        });
    });
    
    
    $('#inputTipoAmortizacion').change(function(){
        $('#inputPlazo').val('');

        $('#inputPlazo').attr('max',$('#inputTipoAmortizacion').val()*4);
        
        
    });
 
});
