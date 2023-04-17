<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

/*
print_r($_SESSION['ARTICULO'] );     

  
        echo $APELLIDO;
         echo $DOCUMENTO;
          echo $CUIL;
          echo$CALLE;
          echo $ID;   
          */

?>
<?php 
$_SESSION["ARTICULO"][0]=$_POST;
if($_POST){
        
       
        $APELLIDO=$_POST["APELLIDO"];
        $DOCUMENTO=$_POST["DOCUMENTO"];
        $CUIL=$_POST["CUILCUIT"];
        $CALLE=$_POST["CALLE"];
        $ID=$_POST["ID"];
       

        
         
        foreach ($_SESSION['ARTICULO'] as $indice => $producto){
            $sentencia=$pdo->prepare("INSERT INTO `tldproductos` ( `Nombre`,  `Precio`, `Descripcion`, `Imagen`,`ID`) VALUES (:APELLIDO,:DOCUMENTO,:CUIL,:CALLE,:ID);");            
            $sentencia->bindParam(":APELLIDO",$APELLIDO);
            $sentencia->bindParam(":DOCUMENTO",$DOCUMENTO);
            $sentencia->bindParam(":CUIL",$CUIL);
            $sentencia->bindParam(":CALLE",$CALLE);
            $sentencia->bindParam(":ID",$ID);
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
    window.location.replace('articulos.php');
}, 1500);
   
</script>




<?php
include 'templates/pie.php';
?>