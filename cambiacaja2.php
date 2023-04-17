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
$idNueva=$_POST['idNueva'];


$sentencia=$pdo->prepare("UPDATE tbldetallpagos SET DESCARGADO='$idNueva' WHERE DESCARGADO='$idCierre'");
$sentencia->execute();




$sentencia=$pdo->prepare("UPDATE tbldetalleventa SET DESCARGADO='$idNueva' WHERE DESCARGADO='$idCierre'");
$sentencia->execute();

$sentencia=$pdo->prepare("UPDATE cierresCaja SET numero='$idNueva' WHERE numero='$idCierre'");
$sentencia->execute();





?>
















 



  
<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Cambiado el número!</h1>
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

$mail->Subject = EMPRESA." CAJA  del ".'N° '.$idCierre." CAMBIO a CAJA  del N ".$idNueva; // Este es el titulo del email.
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





<?php
include 'templates/pie.php';
?>