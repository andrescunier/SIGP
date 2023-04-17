<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php 
$_SESSION["MEDIO"][0]=$_POST;
if($_POST){
        $ID=$_POST["ID"];
        $Medio=$_POST["Medio"];
        
        
        
         
        foreach ($_SESSION['MEDIO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE MediosDePago SET  `Medio`=:Medio
              WHERE `ID`=:ID ");            
            
            $sentencia->bindParam(":ID",$ID);
            $sentencia->bindParam(":Medio",$Medio);
            $sentencia->execute();

        }    
            
       

    }

?>

<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Actualizado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>


<script> 
window.setTimeout(function() {
    window.location.replace('listadoMediosDePago.php');
}, 1500);
   
</script>






<?php
include 'templates/pie.php';

?>