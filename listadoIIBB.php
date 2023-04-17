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
              <h1 class="card-title">DETALLE DE INGRESOS PARA IIBB

 </h1>
              <div class="row">


              <div class="form-group row">
                  <form action="listadoIIBB.php" method="get" class="form-sample" target="_blank">

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
                    <div ><button  class="btn btn-secondary" type="submit" class="form-control" value="buscar">Buscar</button></div> 

                  </form>
                </div>

                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <th width="8%" text-right>Fecha </th>    
    

    <th width="8%" text-right>Numero</th>
    <th width="8%" text-right>Actividad</th>

    <th width="8%" text-right>Imp. Neto Grabado</th>
   
    <th width="8%" text-right>IVA</th>
    <th width="8%" text-right>Imp. Total</th>

                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php
            $sentencia=$pdo->prepare("SELECT tblventas.ID, tblventas.Fecha,clientes.APELLIDO,clientes.NOMBRE, tblventas.domicilio, tblventas.SOCIO ,ctactes.N°Comprobante ,tblventas.status, tblventas.PayPalDatos , tbldetalleventa.IDPRODUCTO, tldproductos.Nombre , tbldetalleventa.CANTIDAD, tbldetalleventa.PRECIOUNITARIO,(tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21 as NETO, (tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)-((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21) AS IVA , tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO as TOTAL FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  left join clientes ON tblventas.SOCIO=clientes.SOCIO LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA  WHERE tblventas.SOCIO=12 AND (tblventas.Fecha BETWEEN date('$desde') AND date('$hasta')) ORDER by tblventas.Fecha desc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
  <tr>
  <td width="8%"><?php $date=date_create($producto['Fecha']) ; echo date_format($date,"d/m/Y") ?></td>
                      
                      <td width="8%" text-right><?php echo substr($producto['N°Comprobante'], -4) ?></td>
                      <td width="8%" text-right><?php echo $producto['Nombre']  ?></td>
              
                      <td width="8%" text-right> <?php echo number_format($producto['NETO'],2)  ?></td>
           
                      <td width="8%" text-right> <?php echo number_format($producto['IVA'],2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['TOTAL'],2)  ?></td>
                            
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div style="align:right;"><a href="excelIIBB.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?><button type="button" class="btn btn-secondary">Exportar a Excel</button></a></div> 

        </div>
        </div>
       

        </div>
        </div>
        </div>
        </div>
       
       <?php include 'templates/pie.php'; ?>