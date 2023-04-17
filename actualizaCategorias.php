<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php 
$_SESSION["MEDIO"][0]=$_POST;
if($_POST){
    $ID=$_POST["ID"];
    $categoria=$_POST["categoria"];
    
        
        
         
        foreach ($_SESSION['MEDIO'] as $indice => $producto){
            $sentencia=$pdo->prepare("UPDATE categorias SET   `categoria`=:categoria 
              WHERE `ID`=:ID ");            


            $sentencia->bindParam(":ID",$ID);
         
            $sentencia->bindParam(":categoria",$categoria);
         
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
    window.location.replace('listadoCategorias.php');
}, 1500);
   
</script>






<?php
include 'templates/pie.php';

?>