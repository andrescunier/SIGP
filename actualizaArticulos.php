<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php 
$_SESSION["CARRITO"][0]=$_POST;
if($_POST){
        $ID=$_POST["ID"];
        $Nombre=$_POST["Nombre"];
        $Descripcion=$_POST["Descripcion"];
        $Precio=$_POST["Precio"];
        $Imagen=$_POST["Imagen"];
        $Categoria=$_POST["Categoria"];
        $CodArtExterno=$_POST["CodArtExterno"];
        
        
         
        foreach ($_SESSION['CARRITO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE tldproductos SET  `Nombre`=:Nombre,`Descripcion`=:Descripcion,
            `Precio`=:Precio, `Imagen`=:Imagen ,`Categoria`=:Categoria,`CodArtExterno`=:CodArtExterno
              WHERE `ID`=:ID ");            
            
            $sentencia->bindParam(":ID",$ID);
            $sentencia->bindParam(":Nombre",$Nombre);
            $sentencia->bindParam(":Descripcion",$Descripcion);
            $sentencia->bindParam(":Precio",$Precio);
            $sentencia->bindParam(":Imagen",$Imagen);
            $sentencia->bindParam(":Categoria",$Categoria);
            $sentencia->bindParam(":CodArtExterno",$CodArtExterno);
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
    window.location.replace('articulos.php');
}, 1500);
   
</script>



<?php
include 'templates/pie.php';

?>