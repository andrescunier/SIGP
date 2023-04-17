<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<?php 
$_SESSION["MEDIOPAGO"][0]=$_POST;
if($_POST){
        
       
        $Medio=$_POST["Medio"];
        
        
        
         
        foreach ($_SESSION['MEDIOPAGO'] as $indice => $producto){
            $sentencia=$pdo->prepare("INSERT INTO `MediosDePago` ( `Medio`) VALUES (:Medio);");            
            $sentencia->bindParam(":Medio",$Medio);
            $sentencia->execute();

        }    
            
       

    }
?>

<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Ingresado!!!</h1>
                  <p class="card-description mb-0">
                  </p>
                  <p class="card-description">
            
                  </p>
                  <div class="template-demo d-flex justify-content-between flex-wrap">
                    </div>
                </div>
              </div>
            </div>


<script> 
window.setTimeout(function() {
    window.location.replace('listadoMediosDePago.php');
}, 1500);
   
</script>





<?php
include 'templates/pie.php';
?>