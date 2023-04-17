<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
/*print_r($_POST);*/
?>
<?php 
$_SESSION["RUTEO"][0]=$_POST;
if($_POST){
        $ID=$_POST["ID"];
        $RUTEO=date('d/m/y',time());
        
         
        foreach ($_SESSION['RUTEO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE clientes SET `ALTA`=:RUTEO  WHERE `ID`=:ID ");            
            
            $sentencia->bindParam(":ID",$ID);
            $sentencia->bindParam(":RUTEO",$RUTEO);
            
            $sentencia->execute();

        }    
            
    

    }
?>


<script> 
<!--
/*window.location.replace('listadoLeadsPendientes.php'); */
//-->
</script>

<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Actualizado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>


<script> 
<!--
window.location.replace('listadoLeadsPendientes.php'); 
//-->
</script>




<?php
include 'templates/pie.php';
?>