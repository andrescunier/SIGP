<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';




if (!empty($_SESSION['CARRITOVENTA'])) {

unset($_SESSION['CARRITOVENTA']);
}

if (!empty($_SESSION['CARRITOCOBRO'])) {
  

unset($_SESSION['CARRITOCOBRO']);
}

if (!empty($_SESSION['COBRO'])) {

unset($_SESSION['COBRO']);
}

?>
 <?php if(!empty($_SESSION['SEGUR'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['SEGUR'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>



<?php } ?>



<?php 
if(isset($_GET['desde'])) {
$desde=$_GET['desde'];    // id index exists
$hasta=$_GET['hasta'];
    
}
else
{
$desde=date("Y-m")."-01";    
$hasta=date("Y-m-d");    


//echo $desde;
//echo $hasta;    
}


?>





<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">LISTADO DE INGRESOS:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

  <?php echo $producto['DNI'] ?> 
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> </h1>
              <div class="row">


              <div class="form-group row">
                  <form action="listadoIngresos.php" method="get" class="form-sample" target="_blank">

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="fname">Desde:</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="fname" name="desde" value="<?php echo $desde?>">
                          </div>
                    </div>
                    
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="lname">Hasta:</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="lname"  name="hasta" value="<?php echo $hasta?>">
                          </div>
                    </div>      
                    <div class="form-group row">
                    <div class="col-sm-9">
                    <input type="submit" class="form-control" value="buscar"></div>
                  </form>
                </div>







                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Movimiento</th>
                            <th>Origen</th>
                            <th>Medio</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php $filtro=$producto['DNI'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT cuentas.Cuenta, cuentas.subCuenta, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID left join clientes ON tblctasctes.SOCIO=clientes.SOCIO LEFT JOIN ctactes ON tblctasctes.ID=ctactes.IDPAGO LEFT join cuentas ON clientes.DOCUMENTO=cuentas.ID where tblctasctes.status='Pago' AND tbldetallpagos.DESCARGADO>-1 AND (tblctasctes.Fecha BETWEEN date('$desde') AND date('$hasta')) GROUP BY subCuenta ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
              <td width="10%" text-center ><?php echo date($producto['Fecha']) ?></td>
                     <td width="20%" text-center><?php echo $producto['NºCOMPROBANTE'] ?></td>
                     <td width="20%"><?php echo $producto['NOMBRE']." ".$producto['APELLIDO'] ?></td>
                     
                     <td width="20%"><?php echo $producto['Medio'] ?></td>
                     
                     <td width="15%">$<?php echo number_format($producto['CANTIDAD']*$producto['PRECIOUNITARIO'], 2, ',', ' ') ?></td>
                     <?php  $saldo+=$producto['CANTIDAD']*$producto['PRECIOUNITARIO']?>
                     <td width="15%"><?php echo number_format($saldo, 2, ',', ' ') ?></td>
                         
                         </td>
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        
        
 <div class="content-wrapper">
       
       <div class="card">
           <div class="card-body">
            <a href="excelIngresos.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?>"><h1 class="card-title">ENVIAR INFORME A EXCEL

</h1></a>
             <div class="row">
        
             </div>
           </div>
         </div>
       </div>

        
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

       


       <?php include 'templates/pie.php'; ?>






