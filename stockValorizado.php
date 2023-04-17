<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

     <div class="row">
     <table class="table table-striped">
      
     <tbody>
                     <tr>
                        <th width="40%" text-center>Producto</th>
                        <th width="20%" text-center>Cantidad</th>
                        <th width="20%" text-center>Total</th>
                        <th width="20%" text-center></th>
                         
                        </tr>
    </table>
         <?php
            $total=0;
            $sentencia=$pdo->prepare('SELECT tblventas.ID, tblventas.Fecha, tblventas.Correo , tblventas.domicilio, tblventas.SOCIO , tblventas.status, tblventas.PayPalDatos , tbldetalleventa.IDPRODUCTO, tldproductos.Nombre , sum(tbldetalleventa.CANTIDAD)*-1 as CANTIDAD, sum(`CANTIDAD`)*-1* tldproductos.Precio AS VALOR , tbldetalleventa.PRECIOUNITARIO FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  GROUP BY tbldetalleventa.IDPRODUCTO order by Nombre asc');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
                <tbody>
                    
                        <tr>
                        <td width="40%"><?php echo $producto['Nombre'] ?></td>
                        <td width="20%" text-center ><?php echo $producto['CANTIDAD'] ?></td>
                        <td width="20%" text-center >$<?php echo $producto['VALOR'] ?></td>
                        <?php $total+=$producto['VALOR'] ?>
                        <td width="20%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['IDPRODUCTO']);?>" >    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="VerMovStock1">Ver Movimientos</button> 
                            </form>
                            </td>
                        </tr>
                        
                    
                    </tbody>
                </table>     
                <?php }  ?>   
                        
    </div>
    <h3  class="text-right">Total de la Valorizacion de la mercaderia $<?php  echo $total ?></h3> 
</div>
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
  
<?php

include 'templates/pie.php';
?>