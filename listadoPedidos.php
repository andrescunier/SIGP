<?php

include 'carrito.php';
include 'templates/cabecera.php';
?>

     <div class="row">
     <table class="table table-striped">
      
     <tbody>
                     <tr>
                        <th width="10%" text-center>ID.Pedido</th>
                        <th width="15%" text-center>FechaCompra</th>
                        <th width="15%" text-center>Domicilio</th>
                        <th width="10%" text-center>WhattApp</th>
                        <th width="10%" text-center>Apellido</th>
                        <th width="10%" text-center>Nombre</th>
                      
                        <th width="10%" text-center>Accion</th>
                      
                         
                        </tr>
    </table>
         <?php
         //   $total=0;
         //   $sentencia=$pdo->prepare('SELECT tblventas.ID,`Fecha`,`Correo`,`Total`,`status`,`SOCIO`,tbldetalleventa.IDPRODUCTO, tldproductos.Nombre,tbldetalleventa.CANTIDAD,tbldetalleventa.PRECIOUNITARIO FROM tblventas INNER join tbldetalleventa on tbldetalleventa.IDVENTA=tblventas.ID LEFT JOIN tldproductos ON tldproductos.ID=tbldetalleventa.IDPRODUCTO ORDER BY tblventas.ID DESC');
         //   $sentencia->execute();
         //   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            $total=0;
               $sentencia=$pdo->prepare('SELECT tblventas.ID , tblventas.Fecha ,tblventas.domicilio, tblventas.Correo , tblventas.SOCIO , clientes.APELLIDO, clientes.NOMBRE, tblventas.PayPalDatos from tblventas INNER JOIN clientes on tblventas.SOCIO=clientes.SOCIO WHERE tblventas.status="Vendido" AND tblventas.PayPalDatos="" ORDER BY tblventas.ID desc');
               $sentencia->execute();
               $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);





         ?>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
                <tbody>
                    
                        <tr>
                        <td width="10%"><?php echo $producto['ID'] ?></td>
                        <td width="15%" text-center ><?php echo $producto['Fecha'] ?></td>
                        <td width="15%" text-center ><?php echo $producto['domicilio'] ?></td>
                        <td width="10%"><?php echo $producto['Correo'] ?></td>
                            <td width="10%" text-center ><?php echo $producto['APELLIDO'] ?></td>
                        <td width="10%" text-center ><?php echo $producto['NOMBRE'] ?></td>
                     <!--   <td width="10%" text-center ><?php echo $producto['PayPalDatos'] ?></td> -->
                        <td scope="row" width="10%">
                            <form action="actualizaEstadoPedido.php" method="post">
                             <input type="hidden"
                            name="ID" 
                            id="ID" 
                            value="<?php echo ( $producto['ID']);?>">
                            <input type="hidden"
                            name="RUTEO" 
                            id="RUTEO" 
                            value="Ruteado">   
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="Rutear">Rutear</button> 
                            </form>
                            
                            </td>
                            
                        </tr>
                        
                    
                    </tbody>
                </table>     
                <?php }  ?>   
                        
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