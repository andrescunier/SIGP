<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

/*
print_r($_SESSION['COBROS']);

print_r($_SESSION['CARRITOCOBRO']);

print_r($_POST);
*/

?>
<?php 
        
   
     

 if($_POST){
        $total=0;
        $SID=$_POST["Horario"];
        $PayPalDatos=$_POST["Cancha"];
        $Correo=$_POST["fecha"];
        $Comprobante=$_POST["Comprobante"];
        $Socio=$_POST["Socio"];
        $Observaciones=$_POST["Observaciones"];
        $Complejo=$_POST['Complejo'];

        foreach ($_SESSION['CARRITOVENTA'] as $indice => $producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']*-1);
           
        }
        
        
        $sentencia=$pdo->prepare("INSERT INTO `tblctasctes` (`ID`, `ClaveTransaccion`, `PayPalDatos`, `Fecha`, `SOCIO`, `Total`, `status`,`domicilio`,`Complejo`) 
        VALUES (NULL, :ClaveTransaccion, :PayPalDatos,:Fecha,:SOCIO, :Total, 'Cobro',:domicilio,:Complejo);");
        $sentencia->bindParam(":ClaveTransaccion",$SID);
        $sentencia->bindParam(":PayPalDatos",$PayPalDatos);
        $sentencia->bindParam(":Fecha",$Correo);
        $sentencia->bindParam(":SOCIO",$Socio);
        $sentencia->bindParam(":Total",$total);
        $sentencia->bindParam(":Complejo",$Complejo);
        $sentencia->bindParam(":domicilio",$Observaciones);
        
        $sentencia->execute(); 
        

            $idVenta=$pdo->lastInsertID();

            foreach ($_SESSION['CARRITOVENTA'] as $indice => $producto){
                $sentencia=$pdo->prepare("INSERT INTO `tbldetallpagos` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`, `Complejo`) 
                VALUES (NULL,:IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO*-1, :CANTIDAD, '0',:Complejo);");
                $sentencia->bindParam(":IDVENTA",$idVenta);
                $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
                $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
                $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
                $sentencia->bindParam(":Complejo",$Complejo); 
                 $sentencia->execute();

            }


            $sentencia=$pdo->prepare("INSERT INTO `ctactes` (`Fecha`, `FechaRecibo`, `N°Comprobante`, `SOCIO`, `Observaciones`, `TipoPago`,`MovCtaCte`,`Complejo`,`IDPAGO`,`MovCaja`) 
            VALUES (now(), :Fecha,:Comprobante,:SOCIO,:Observaciones,'Cobro',:MovCtaCte,:Complejo,:IDVENTA, :MovCtaCte);");    
            $sentencia->bindParam(":Fecha",$Correo);
            $sentencia->bindParam(":Comprobante",$Comprobante);  
            $sentencia->bindParam(":SOCIO",$Socio);  
            $sentencia->bindParam(":Observaciones",$Observaciones);  
            $sentencia->bindParam(":MovCtaCte",$total);
            $sentencia->bindParam(":IDVENTA",$idVenta);
            $sentencia->bindParam(":Complejo",$Complejo); 
            $sentencia->execute();


       // echo "<h3>".$total."</h3>";

    }
?>







<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Registrado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>



<script> 
window.setTimeout(function() {
window.location.replace('listadoClientesCrobranzas.php'); 
}, 3000);
</script>




<?php


unset($_POST);
   

    // redirecciona a la página anterior
//    header("Location:index.php?");

include 'templates/pie.php';
?>