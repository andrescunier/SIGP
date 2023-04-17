<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<?php 
$_SESSION["MEDIOPAGO"][0]=$_POST;
if($_POST){
        
  $cuenta=$_POST["cuenta"];
        $codCuenta=$_POST["codCuenta"];
        $subCuenta=$_POST["subCuenta"];
        
        
        
         
        foreach ($_SESSION['MEDIOPAGO'] as $indice => $producto){
            $sentencia=$pdo->prepare("INSERT INTO `cuentas` ( `Codigo`,`Cuenta`,`subCuenta`) VALUES (:codCuenta,:cuenta,:subCuenta);");            
            $sentencia->bindParam(":codCuenta",$codCuenta);
            $sentencia->bindParam(":cuenta",$cuenta);
            $sentencia->bindParam(":subCuenta",$subCuenta);
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
                  <h1 class="card-title">Ingresado!!!</h1>
                  <p class="card-description mb-0">
                  </p>
                  <p class="card-description">
            
                  </p>
                  <div class="template-demo d-flex justify-content-between flex-wrap">
                    </div>
                </div>
              </div>
            </div>


<script> 
window.setTimeout(function() {
    window.location.replace('listadoCuentas.php');
}, 1500);
   
</script>





<?php
include 'templates/pie.php';
?>