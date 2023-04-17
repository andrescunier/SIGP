<?php
include 'segur.php';
include 'carritoCompras.php';
include 'templates/cabecera.php';


?>


<?php 
    if($_POST){
        $total=0;
        $SID=session_id();
        $Correo=$_POST["fecha"];
        $Comprobante=$_POST["Comprobante"];
        $Socio=$_POST["Socio"];
        $Observaciones=$_POST["Observaciones"];
        $Complejo=$_POST['Complejo'];
        $TipoC=$_POST["TipoCompro"];
        foreach ($_SESSION['CARRITOCOMPRA'] as $indice => $producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
           
        }
       
        
        $sentencia=$pdo->prepare("INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PayPalDatos`, `Fecha`, `SOCIO`, `Total`, `status`,`Complejo`) 
        VALUES (NULL, :ClaveTransaccion, '',:Fecha,:SOCIO, :Total, 'Compra',:Complejo);");
        $sentencia->bindParam(":ClaveTransaccion",$SID);
        $sentencia->bindParam(":Fecha",$Correo);
        $sentencia->bindParam(":SOCIO",$Socio);
        $sentencia->bindParam(":Total",$total);
        $sentencia->bindParam(":Complejo",$Complejo);
        $sentencia->execute(); 
        


            $idVenta=$pdo->lastInsertID();

            foreach ($_SESSION['CARRITOCOMPRA'] as $indice => $producto){
                $sentencia=$pdo->prepare("INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`,`Complejo`) 
                VALUES (NULL,:IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD*-1, '0',:Complejo);");
                $sentencia->bindParam(":IDVENTA",$idVenta);
                $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
                $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
                $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
                $sentencia->bindParam(":Complejo",$Complejo);
                 $sentencia->execute();

            }



         $sentencia=$pdo->prepare("INSERT INTO `ctactes` (`Fecha`, `FechaRecibo`,`TipoComp`, `N°Comprobante`, `SOCIO`, `Observaciones`, `TipoPago`,`MovCtaCte`,`Complejo`,`IDVENTA`) 
        VALUES (now(), :Fecha,:TipoC,:Comprobante,:SOCIO,:Observaciones,'Compra',:MovCtaCte,:Complejo,:IDVENTA);");    
        $sentencia->bindParam(":Fecha",$Correo);
        $sentencia->bindParam(":TipoC",$TipoC);
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



<script >
    window.location.replace('listadoProveedorCompra.php'); 
</script>



<?php


unset($_SESSION['CARRITOCOMPRA']);
include 'templates/pie.php';
?>