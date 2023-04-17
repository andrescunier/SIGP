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
       
        $DOCUMENTO=$_POST["DOCUMENTO"];
        $CUIL=$_POST["CUILCUIT"];
       
         $TELEFONO=$_POST["TELEFONO"];
       
     
       
        $Correo=$_POST["Correo"];
        $COMENTARIOS=$_POST["COMENTARIOS"]; 
        
         
        foreach ($_SESSION['CARRITO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE clientes SET  `APELLIDO`=:APELLIDO,
             `NOMBRE`=:NOMBRE, `DOCUMENTO`=:DOCUMENTO, `CUIL/CUIT`=:CUIL, `CALLE`=:CALLE, `Nº`=:N, `PISO`=:PISO, `Pcia.`=:Pcia,  `C.POSTAL`=:CPOSTAL, `TELEFONO`=:TELEFONO, `LOCALIDAD`=:LOCALIDAD,  `Correo electronico`=:Correo ,`COMENTARIOS`=:COMENTARIOS WHERE `SOCIO`=:SOCIO ");            
            
            $sentencia->bindParam(":SOCIO",$SOCIO);
            $sentencia->bindParam(":APELLIDO",$APELLIDO);
            $sentencia->bindParam(":NOMBRE",$NOMBRE);
            $sentencia->bindParam(":DOCUMENTO",$DOCUMENTO);
            $sentencia->bindParam(":CUIL",$CUIL);
            $sentencia->bindParam(":CALLE",$CALLE);
            $sentencia->bindParam(":N",$N);
            $sentencia->bindParam(":PISO",$PISO);
            $sentencia->bindParam(":Pcia",$Pcia);
            $sentencia->bindParam(":CPOSTAL",$CPOSTAL);
            $sentencia->bindParam(":TELEFONO",$TELEFONO);
            $sentencia->bindParam(":LOCALIDAD",$LOCALIDAD);
            $sentencia->bindParam(":Correo",$Correo);
            $sentencia->bindParam(":COMENTARIOS",$COMENTARIOS);
            $sentencia->execute();

        }    
            
       

    }

?>

<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Actualizado!!!</h1>
                  <p class="card-description mb-0">
                  </p>
                  <p class="card-description">
            
                  </p>
                  <div class="template-demo d-flex justify-content-between flex-wrap">
                    </div>
                </div>
              </div>
            </div>

<?php

   

// redirecciona a la página anterior
 

?>
<script> 
window.setTimeout(function() {
    window.location.replace('menu.php'); ; 
}, 3000);


</script>




<?php
include 'templates/pie.php';
?>