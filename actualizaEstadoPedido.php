<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
require("class.phpmailer.php");
require("class.smtp.php");
?>
<?php 
$_SESSION["RUTEO"][0]=$_POST;
if($_POST){
        $ID=$_POST["ID"];
        $RUTEO=$_POST["RUTEO"];
        
         
        foreach ($_SESSION['RUTEO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE tblventas SET `PayPalDatos`=:RUTEO  WHERE `ID`=:ID ");            
            
            $sentencia->bindParam(":ID",$ID);
            $sentencia->bindParam(":RUTEO",$RUTEO);
            
            $sentencia->execute();

        }    
            
    

    }

?>

<?php
/**
 * @version 1.0
 */


// Valores enviados desde el formulario


$nombre = "Actualizacion de Pedido n° ".$ID;
$email = "info@frutale.com.ar";




$mensaje = "Pedido n° ".$ID."ha sido cargado para entregar en proximo dia de entrega";




// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1370141.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@cumar.com.ar";  // Mi cuenta de correo
$smtpClave = "Rosales1864";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "no-reply@c1791144.ferozo.com";

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

$mail->Subject = "Ruteo desde Sistema"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Pedido Ruteado <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Frutale"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 

?>
<script> 
<!--
window.location.replace('listadoPedidos.php'); 
//-->
</script>
<?php
/* Esto producirá un error. Fíjese en el html
 * que se muestra antes que la llamada a header() */
header('Location: http://www.infobae.com/');
exit;
?>
<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Actualizado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>







<?php
include 'templates/pie.php';
?>