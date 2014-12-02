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

    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/amortizacion.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/amortizacion.js"></script>
   </head>
   <body>
       <div class="container">
           <form class="form-amortizacion" id="formularioAmort" action="" method="POST">
            <h2 class="form-amortizacion-heading"><?php echo $messageTitle ?></h2>
            <div class="inputs">
                
            <label for="inputCapital" class="labels">Capital</label>
            <input type="number" id="inputCapital" class="form-control" placeholder="20000" required autofocus min="0" step="100">
            
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
            <input type="number" id="inputPlazo" class="form-control" placeholder="12" required autofocus min="0" step="1">
             </div>
            <hr>
        
            <button class="btn btn-primary btn-block" id="buttonSubmit" type="submit">Calcular Tabla e Intereses</button>
               
           </form>
           
           
           <div id="tablasAmortizacion" class="tablasAmortizacion">
               
               
           </div>
       </div>
       
       


   </body>
 </html>
