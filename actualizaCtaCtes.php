<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
/*print_r($_POST);*/
?>
<?php 
$_SESSION["RUTEO"][0]=$_POST;
if($_POST){
        $IDPAGO=$_POST["IDPAGO"];
        
        
         
        foreach ($_SESSION['RUTEO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE ctactes SET `ver`=NOW()  WHERE `IDPAGO`=:IDPAGO ");            
            
            $sentencia->bindParam(":IDPAGO",$IDPAGO);
            
            
            $sentencia->execute();

        }    
            
        foreach ($_SESSION['RUTEO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE tbldetallpagos SET `DESCARGADO`=-1  WHERE `IDVENTA`=:IDPAGO ");            
            
            $sentencia->bindParam(":IDPAGO",$IDPAGO);
            
            
            $sentencia->execute();

        } 

    }
?>


<script> 
<!--
/*window.location.replace('listadoLeadsPendientes.php'); */
//-->
</script>
<div class="col-12">
                  <div class="table-responsive">
<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Actualizado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>

</div>
</div>
</div>
</div>


<script> 
<!--
//window.location.replace('listadoLeadsPendientes.php'); 
//-->
</script>




<?php
include 'templates/pie.php';
?>