<!DOCTYPE HTML> 
 <html>
   <head>
     <title><?php echo $title ?></title>
     
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/amortizacion.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="js/amortizacion.js"></script>
   </head>
   <body>
       <div class="container" id="container">
            <ul>
                <li><a href="#divPagosPeriodicos">Pagos Peri&oacute;dicos</a></li>
                <li><a href="#divPagosVencimiento">Pagos por Vencimiento</a></li>
            </ul>
           <div  id="divPagosPeriodicos"  class="divAmort">
           <h3 class="form-amortizacion-heading"><?php echo $messageTitle ?></h3>
           
           <form class="form-amortizacion" id="formularioAmort" action="" method="POST">
            <div class="inputs">
                
            <label for="inputCapital" class="labels">Capital</label>
            <input type="number" id="inputCapital" class="form-control" placeholder="20000" required autofocus min="1000" step="100">
            
            </div>
            
            <div class="inputs">
            <label for="inputTipoAmortizacion" class="labels">Tipo de Amortizacion</label>
            <select id="inputTipoAmortizacion"  class="form-control" required>
                <option value="" disabled selected>TIPO DE AMORTIZACION</option>
                <?php foreach ($optionsAmortizacion as $key => $item): ?>
                    <option value="<?= $key ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            
             <div class="inputs">
            <label for="inputPlazo" class="labels">Plazo</label>
            <input type="number" id="inputPlazo" class="form-control" placeholder="12" required autofocus min="1" step="1" max="48">
             </div>
            <hr>
        
            <button class="btn btn-primary btn-block" id="buttonSubmit" type="submit">Calcular Tabla e Intereses</button>
               
           </form>
           
           
           <div id="tablasAmortizacion" class="tablasAmortizacion">
               
               
           </div>
           
           </div>
           
            <div id="divPagosVencimiento" class="divAmort">
               

                    <h3 class="form-amortizacion-heading"><?php echo $messageTitle ?></h3>
                    <form class="form-amortizacion" id="formularioVenci" action="" method="POST">
                     <div class="inputs">

                     <label for="inputCapitalVenci" class="labels">Capital</label>
                     <input type="number" id="inputCapitalVenci" class="form-control" placeholder="20000" required autofocus min="1000" step="100">

                     </div>


                      <div class="inputs">
                          <label for="inputPlazoVenci" class="labels">Plazo en d&iacute;as</label>
                        <input type="number" id="inputPlazoVenci" class="form-control" placeholder="12" required autofocus min="1" step="1" max="365">
                      </div>
                     <hr>

                     <button class="btn btn-primary btn-block" id="buttonSubmitVenci" type="submit">Calcular Total a Pagar e Interes</button>

                    </form>


                    <div id="tablasVenci" class="tablasAmortizacion">


                    </div>

                
                
 
            </div>
           
       </div>
       
   </body>
 </html>
