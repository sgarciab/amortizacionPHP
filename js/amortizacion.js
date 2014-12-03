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
        });
    });
    
    
    $('#inputTipoAmortizacion').change(function(){
        $('#inputPlazo').val('');

        $('#inputPlazo').attr('max',$('#inputTipoAmortizacion').val()*4);
        
        
    });
 
});
