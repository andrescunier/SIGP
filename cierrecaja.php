<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

require("class.phpmailer.php");
require("class.smtp.php");
print_r($_POST);
?>


<?php 

$fechaCierre=$_POST['fechaCierre'];
$observacionCierre=$_POST['observacionesCierre'];
 echo $fechaCierre;             

$sentencia=$pdo->prepare("INSERT INTO `cierresCaja` (`Fecha`,`FechaCierre`,`Observaciones`) 
VALUES (now(),:fechaCierre,:observacionesCierre);");



$sentencia->bindParam(":fechaCierre",$fechaCierre);
$sentencia->bindParam(":observacionesCierre",$observacionesCierre);  
$sentencia->execute(); 
        

$idCierre=$pdo->lastInsertID();



$sentencia=$pdo->prepare("UPDATE tbldetallpagos SET DESCARGADO='$idCierre' WHERE (DESCARGADO=0 ) ");
$sentencia->execute(); 

$sentencia=$pdo->prepare("UPDATE tbldetalleventa SET DESCARGADO='$idCierre' WHERE (DESCARGADO=0 ) ");
$sentencia->execute(); 





$articulo=$idCierre;

?>




<?php
            $sentencia=$pdo->prepare("SELECT cierresCaja.Numero AS CIERRE,cierresCaja.Fecha AS FECHACIERRE,MAX(ctactes.FechaRecibo) AS FECHACAJA FROM `tbldetallpagos` INNER JOIN cierresCaja ON tbldetallpagos.DESCARGADO=cierresCaja.Numero INNER JOIN ctactes ON tbldetallpagos.IDVENTA=ctactes.IDPAGO WHERE cierresCaja.Numero='$articulo' GROUP BY CIERRE;");







            $sentencia->execute();
            $listado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    

         ?>
 <?php foreach($listado as $lista) { ?>
 <?php  $newDate = date("d/m/Y", strtotime($lista['FECHACAJA']));} ?>






<?php
            $sentencia=$pdo->prepare("SELECT clientes.Nombre as Cuenta, MediosDePago.Medio AS MEDIO,tblctasctes.status AS TIPOPAGO ,tblctasctes.Fecha AS FECHA,(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where ( tblctasctes.status='Cobro' and tbldetallpagos.DESCARGADO='$articulo') 
GROUP BY Cuenta,MediosDePago.Medio , tblctasctes.status");







            $sentencia->execute();
            $listaCero=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
          
          <?php
            $sentencia=$pdo->prepare("SELECT MediosDePago.Medio AS MEDIO,clientes.Nombre AS GASTO ,tblctasctes.status AS TIPOPAGO ,tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO AS TOTAL , ctactes.N°Comprobante as COMPROBANTE from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO LEFT JOIN ctactes ON tblctasctes.id=ctactes.IDPAGO where (tblctasctes.status='Pago' and tbldetallpagos.DESCARGADO='$articulo')
ORDER BY MediosDePago.Medio ASC,tblctasctes.ID ASC , tblctasctes.status");
            $sentencia->execute();
            $listaUno=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

       
            $sentencia=$pdo->prepare("SELECT MediosDePago.Medio AS MEDIO,sum(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where tbldetallpagos.DESCARGADO='$articulo'
GROUP BY MediosDePago.Medio");
            $sentencia->execute();
            $listaDos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
       
       
       ?>









 



  
<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Cerrada!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>
       

















<?php




  
    


   $mensaje .= 'COMPLEJO GRUN'."\n";
   $mensaje .= 'CIERRE DE CAJA N°'.$articulo."\n";
   $mensaje .= 'DE LA FECHA: '.$fechaCierre."\n";
   $mensaje .= 'LINK: '."http://dosvias.com.ar/BRUNO/GRUN6/cajaCerrada.php?id=".$articulo."\n";
    $saldo=0 ;

    $mensaje .= "-----------------------------------------------------------------------"."\n";

          foreach($listaCero as $producto) { 
          
           

            $mensaje .=$producto['Cuenta'].'-'.$producto['MEDIO'].':  $'.$producto['TOTAL'];
            $saldo+=$producto['TOTAL'] ;
          
                         
           
           
                        
                       
                         
 
                 } 

 $mensaje .= "-----------------------"."\n";
                 $mensaje .='INGRESOS TOTALES :$'.$saldo."\n";
                 $mensaje .= "-----------------------------------------------------------------------"."\n";


                 $mensaje .='DETALLE DE EGRESOS'."\n";
                       
             $saldo=0 ;
                foreach($listaUno as $producto) {
               
                
                    $mensaje .=$producto['MEDIO'].'-'.$producto['GASTO'].'  '.$producto['COMPROBANTE'].'  :$'.$producto['TOTAL']."\n";
                              
                              $saldo+=$producto['TOTAL'] ;
                              
                              
                              
                              
                              } 
                              $mensaje .= "-----------------------------------------------------------------------"."\n";

                              $mensaje .=' EGRESOS TOTALES:$ '.$saldo."\n";







                             
                              $mensaje .= "-----------------------------------------------------------------------"."\n";

                              $mensaje .='SALDOS'."\n";
                                  
 $saldo=0;


foreach($listaDos as $producto) { 

$mensaje .=$producto['MEDIO'].' :$'.$producto['TOTAL']."\n"; 

     
            $producto['TOTAL'];
             
             $saldo+=$producto['TOTAL'];
              
             
      

       } 

       $mensaje .= "-----------------------------------------------------------------------"."\n";

$mensaje .='CAJA TOTAL :$'.$saldo."\n";
$mensaje .= "-----------------------------------------------------------------------"."\n";




$my_apikey = "RD66NTKIYPU0UFCA5ZKG";
$destination = "5491157181130";
$message =$mensaje ;
$api_url = "http://panel.rapiwha.com/send_message.php";
$api_url .= "?apikey=". urlencode ($my_apikey);
$api_url .= "&number=". urlencode ($destination);
$api_url .= "&text=". urlencode ($message);
$my_result_object = json_decode(file_get_contents($api_url, false));
echo "<br>Result: ". $my_result_object->success;
echo "<br>Description: ". $my_result_object->description;
echo "<br>Code: ". $my_result_object->result_code;

?>

<script> 
//window.setTimeout(function() {
//window.location.replace('menu.php'); 
}, 3000);
</script>