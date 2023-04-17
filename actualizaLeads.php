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
        $COMENTARIO=$_POST["COMENTARIO"];
         $TELEFONO=$_POST["TELEFONO"];
       
       
       
        $Correo=$_POST["Correo"];
        
         
        foreach ($_SESSION['CARRITO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE clientes SET  `APELLIDO`=:APELLIDO,
             `NOMBRE`=:NOMBRE, `DOCUMENTO`=:DOCUMENTO, `CUIL/CUIT`=:CUIL, `CALLE`=:CALLE, `Nº`=:N, `BAJA`=:BAJA, `Pcia.`=:Pcia,  `COMENTARIOS`=:COMENTARIO, `TELEFONO`=:TELEFONO, `LOCALIDAD`=:LOCALIDAD, `Fecha nac.`=:Fechanac, `Correo electronico`=:Correo WHERE `SOCIO`=:SOCIO ");            
            
            $sentencia->bindParam(":SOCIO",$SOCIO);
            $sentencia->bindParam(":APELLIDO",$APELLIDO);
            $sentencia->bindParam(":NOMBRE",$NOMBRE);
           
            $sentencia->bindParam(":DOCUMENTO",$DOCUMENTO);
            $sentencia->bindParam(":CUIL",$CUIL);
            $sentencia->bindParam(":CALLE",$CALLE);
            $sentencia->bindParam(":N",$N);
            $sentencia->bindParam(":BAJA",$BAJA);
            $sentencia->bindParam(":Pcia",$Pcia);
           
            $sentencia->bindParam(":COMENTARIO",$COMENTARIO);
           
            $sentencia->bindParam(":TELEFONO",$TELEFONO);
           
            $sentencia->bindParam(":LOCALIDAD",$LOCALIDAD);
            
            $sentencia->bindParam(":Fechanac",$Fechanac);
            $sentencia->bindParam(":Correo",$Correo);
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

<?php

   

// redirecciona a la página anterior
 

?>
<script> 
<!--
window.location.replace('listadoLeadsPendientes.php'); 
//-->
</script>




<?php
include 'templates/pie.php';
?>