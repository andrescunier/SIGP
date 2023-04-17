<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>



     <br>
    <?php if($mensaje!="") {?>
     <div class="alert alert-success" role="alert">
     <?php echo $mensaje; ?>

        <a href="mostrarcarrito.php#" badge badge-success>Ver carrito de Compras</a>
     </div>  
    <?php }?>
     <div >
     <?php
            $sentencia=$pdo->prepare('SELECT SUM(MovCaja) as mtotal FROM cajas where TipoPago="Banco" and Observaciones="Pesos" ');
            $sentencia->execute();
            $totalCaja=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($totalCaja as $totales){
               
            }
            
           
            
         ?>
<div><h1>Movimiento de Banco  </h1></div>
<div >
<h3 class="text-right"> Saldo Actual $ <?php print ($totales['mtotal'])?> </h3>
</div>
 


           <?php
            $sentencia=$pdo->prepare('SELECT * FROM cajas where TipoPago="Banco" and Observaciones="Pesos" order by FechaRecibo asc');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
           <table class="table table-striped">
     <thead>
    <tr>
      <th width="20%" text-right>Fecha</th>
      <th width="15%" text-right>Nombre</th>
      <th width="20%" text-right>N°Comprobante</th>
      <th width="20%" text-right>Detalle</th>
      <th width="15%" text-right>Importe</th>
      <th width="20%" text-right>Saldo</th>
    </tr>
  </thead>
  </table>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
 
                <tbody>
                    
                    
                        <tr>
                        <td width="20%"><?php echo $producto['FechaRecibo'] ?></td>
                        <td width="15%"><?php echo $producto['APELLIDO'] ?></td>
                        <td width="20%" text-right ><?php echo $producto['N°Comprobante']  ?></td>
                        <td width="20%" text-right><?php echo $producto['Observaciones'] ?></td>
                        <td width="15%" text-right>$<?php echo $producto['MovCaja'] ?></td>
                        
                        <?php $saldo+=$producto['MovCaja'] ?>
                        <td width="20%" text-right>$<?php echo $saldo ?></td>
                        
                        
                        
                        </tr>
                        
                    
                    </tbody>
                </table>     
                        <?php } ?>
                        
    </div>
</div>
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
  
<?php

include 'templates/pie.php';
?>