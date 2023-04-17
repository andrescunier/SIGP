<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<br>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

    <h3>Movimientos de Compras y Ventas </h3>
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

    
          

     
               
            </td>
        </tr>

                
 
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
    
    </br>
           
    <?php $filtro=$producto['DNI'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT tblventas.ID, tblventas.Fecha, tblventas.Correo ,clientes.APELLIDO,clientes.NOMBRE, tblventas.domicilio, tblventas.SOCIO ,ctactes.N°Comprobante ,tblventas.status, tblventas.PayPalDatos , tbldetalleventa.IDPRODUCTO, tldproductos.Nombre , tbldetalleventa.CANTIDAD, tbldetalleventa.PRECIOUNITARIO FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  left join clientes ON tblventas.SOCIO=clientes.SOCIO LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA ORDER by tblventas.Fecha desc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
                        
         
        
         <table class="table table-striped">
             <thead colspan="5">
                  <tr>
                     
                     <th width="10%" text-center>Fecha</th>
                     <th width="5%" text-center>Movimiento</th>
                     <th width="20%" text-center>Comprobante</th>
                     <th width="20%" text-center>Cliente/Prove</th>
                     <th width="10%" text-center>Descripcion</th>
                     
                     <th width="5%" text-center>Cantidad</th>
                     <th width="5%" text-center>Precio</th>
                     <th width="5%" text-center>Importe</th>
                     
                                             </tr>
                                             </thead>
</table>         

<?php foreach($listaProductos as $producto) { ?>
    
    <table class="table">
           
           <tbody class="buscar">
                     <tr>
                     <td width="10%" text-center ><?php echo $producto['Fecha'] ?></td>
                     <td width="5%" text-center><?php echo $producto['status'] ?></td>
                     <td width="20%" text-center><?php echo $producto['N°Comprobante'] ?></td>
                     
                     <td width="20%"><?php echo $producto['NOMBRE'] ?></td>
                     
                     <td width="10%"><?php echo $producto['Nombre'] ?></td>
                     
                     <td width="5%"><?php echo $producto['CANTIDAD']*-1 ?></td>
                     <?php  $saldo=$producto['PRECIOUNITARIO']*-1;$saldo2=$producto['PRECIOUNITARIO']*$producto['CANTIDAD'] ?>
                     <td width="5%"><?php echo $saldo ?></td>
<td width="5%"><?php echo $saldo2 ?></td>
                         
                         </td>
                     </tr>
                     
                 
             </tbody>
             </table>      
                     <?php } ?>




     
<?php
include 'templates/pie.php';
?>