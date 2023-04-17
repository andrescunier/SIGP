<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php 
$_SESSION["CARRITO"][0]=$_POST;
if($_POST){
        $SOCIO=$_POST["SOCIO"];
        $NOMBRE=$_POST["NOMBRE"];
        $APELLIDO=$_POST["APELLIDO"];
        $BAJA=$_POST["BAJA"];
        $TELEFONO=$_POST["TELEFONO"];
        $COMENTARIO=$_POST["COMENTARIO"];
        $Correo=$_POST["Correo"];
        $ESTADO=$_POST["ESTADO"];
        $Complejo=$_POST["Complejo"];

        
  
        
         
        foreach ($_SESSION['CARRITO'] as $indice => $producto){
            $sentencia=$pdo->prepare("INSERT INTO `clientes` (`SOCIO`, `NOMBRE`, `APELLIDO`,`BAJA`,`TELEFONO`, `COMENTARIOS`,`Correo electronico`,`ESTADO`,`Complejo`) VALUES (:SOCIO,:NOMBRE,:APELLIDO,:BAJA,:TELEFONO,:COMENTARIO,:Correo,:ESTADO,:Complejo);");            
            
            $sentencia->bindParam(":SOCIO",$SOCIO);
            $sentencia->bindParam(":NOMBRE",$NOMBRE);
            $sentencia->bindParam(":APELLIDO",$APELLIDO);
            $sentencia->bindParam(":BAJA",$BAJA);
            $sentencia->bindParam(":TELEFONO",$TELEFONO);
            $sentencia->bindParam(":COMENTARIO",$COMENTARIO);
            $sentencia->bindParam(":Correo",$Correo);
            $sentencia->bindParam(":ESTADO",$ESTADO);
            $sentencia->bindParam(":Complejo",$Complejo);
            $sentencia->execute();



        }    
            
       

    }
?>

<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Ingresado !</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>



<script> 
window.setTimeout(function() {
    window.location.replace('listadoLeadsPendientes.php');
}, 3000);
   
</script>






<?php
include 'templates/pie.php';
?>