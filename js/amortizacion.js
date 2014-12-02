$(document).ready(function () {
    
    $('#formularioAmort').on('submit',function(e){
        e.preventDefault();
        
        $('#tablasAmortizacion').load('tablasAmortizacion.php',{
           capital:$('#inputCapital').val(),
           tipo:$('#inputCapital').val(),
           plazo:$('#inputPlazo').val(),
           async:false
        },function(){
            
        });
    });
 
});
