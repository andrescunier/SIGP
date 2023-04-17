<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';


/*print_r($_SESSION['COBROS']);

print_r($_SESSION['CARRITOCOBRO']);

print_r($_POST);*/


?>
<?php 
        
   
     

 if($_POST){
        $total=0;
        $SID=session_id();
        $Correo=$_POST["fecha"];
        $Comprobante=$_POST["Comprobante"];
        $Socio=-1;
        $Observaciones=$_POST["Observaciones"];
        $Complejo=$_POST['Complejo'];

        foreach ($_SESSION['CARRITOCOBRO'] as $indice => $producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
           
        }
        
        
        $sentencia=$pdo->prepare("INSERT INTO `tblctasctes` (`ID`, `ClaveTransaccion`, `PayPalDatos`, `Fecha`, `SOCIO`, `Total`, `status`,`domicilio`,`Complejo`) 
        VALUES (NULL, :ClaveTransaccion, '',:Fecha,:SOCIO, :Total, 'Pago',:domicilio,:Complejo);");
        $sentencia->bindParam(":ClaveTransaccion",$SID);
        $sentencia->bindParam(":Fecha",$Correo);
        $sentencia->bindParam(":SOCIO",$Socio);
        $sentencia->bindParam(":Total",$total);
        $sentencia->bindParam(":Complejo",$Complejo);
        $sentencia->bindParam(":domicilio",$Observaciones);
        
        $sentencia->execute(); 
        

            $idVenta=$pdo->lastInsertID();

            foreach ($_SESSION['CARRITOCOBRO'] as $indice => $producto){
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
            VALUES (now(), :Fecha,:Comprobante,:SOCIO,:Observaciones,'Gasto',:MovCtaCte*-1,:Complejo,:IDVENTA,:MovCtaCte*-1);");    
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


<?php
unset($_POST);



if (!empty($_SESSION['CARRITOVENTA'])) {

unset($_SESSION['CARRITOVENTA']);
}

if (!empty($_SESSION['CARRITOCOBRO'])) {

unset($_SESSION['CARRITOCOBRO']);
}

if (!empty($_SESSION['COBRO'])) {

unset($_SESSION['COBRO']);
}
   

    // redirecciona a la página anterior
//    header("Location:index.php?");

?>

-
<script> 

window.location.replace('menu.php'); 

</script>




<?php

include 'templates/pie.php';
?>