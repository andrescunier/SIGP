<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

require("class.phpmailer.php");
require("class.smtp.php");
//print_r($_POST);
?>


<?php 


$idCierre=$_POST['idCierre'];
$fechaNueva=$_POST['fechaNueva'];

 
$sentencia=$pdo->prepare("SELECT IDVENTA from tbldetallpagos WHERE DESCARGADO='$idCierre' ");
$sentencia->execute();
$listadoPago=$sentencia->fetchAll(PDO::FETCH_ASSOC);


foreach($listadoPago as $listaa) {
    $aaa=$listaa['IDVENTA'];
    $aaaa=$fechaNueva;
   
    $sentencia=$pdo->prepare("UPDATE ctactes SET FechaRecibo='$aaaa' WHERE IDPAGO='$aaa'  ");
    $sentencia->execute();   
}



$sentencia=$pdo->prepare("SELECT IDVENTA from tbldetalleventa WHERE DESCARGADO='$idCierre'");
$sentencia->execute();
$listadoVenta=$sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($listadoVenta as $listab) {
    $bbb=$listab['IDVENTA'];
    $aaaaa=$fechaNueva;
    $sentencia=$pdo->prepare("UPDATE ctactes SET FechaRecibo='$aaaaa' WHERE IDVENTA='$bbb'  ");
    $sentencia->execute();   
}






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
    
    <h1 class="display-4">¡CAMBIADA!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>
       


<?php
/**
 * @version 1.0
 */


// Valores enviados desde el formulario


$email = "info@cumar.com.ar";




$mensaje = 'Esta caja ha sido cambiada de fechaS'; 





// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1370141.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@cumar.com.ar";  // Mi cuenta de correo
$smtpClave = "Rosales1864";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "cunier@gmail.com";
$nombre="CAMBIA CAJA ";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = EMPRESA." CAJA  del ".'N° '.$articulo." CAMBIO A LA FECHA DEL ".$fechaNueva; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />".EMPRESA."<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n  "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 


?>

<script> 
window.setTimeout(function() {
window.location.replace('cerradas.php'); 
}, 3000);
</script>