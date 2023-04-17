<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php 
$_SESSION["MEDIO"][0]=$_POST;
if($_POST){
    $ID=$_POST["ID"];
    $cuenta=$_POST["cuenta"];
    $codCuenta=$_POST["codCuenta"];
    $subCuenta=$_POST["subCuenta"];
        
        
         
        foreach ($_SESSION['MEDIO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE cuentas SET  `Cuenta`=:cuenta ,`Codigo`=:codCuenta , `subCuenta`=:subCuenta 
              WHERE `ID`=:ID ");            


            $sentencia->bindParam(":ID",$ID);
            $sentencia->bindParam(":codCuenta",$codCuenta);
            $sentencia->bindParam(":cuenta",$cuenta);
            $sentencia->bindParam(":subCuenta",$subCuenta);
            $sentencia->execute();

        }    
            
       

    }

?>

<<div class="main-panel">          
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


<script> 
window.setTimeout(function() {
    window.location.replace('listadoCuentas.php');
}, 1500);
   
</script>






<?php
include 'templates/pie.php';

?>