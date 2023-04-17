<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

     <div class="row">
         <?php
           // $sentencia=$pdo->prepare('SELECT ctactes.SOCIO,SUM(ctactes.MovCtaCte) as TOTAL,clientes.APELLIDO ,clientes.TELEFONO  from ctactes 
           // LEFT JOIN clientes ON clientes.SOCIO=ctactes.SOCIO
           // GROUP BY `SOCIO` ORDER BY TOTAL DESC'); 
           $sentencia=$pdo->prepare('SELECT * from cuentassoc where ESTADO="PROVE" ');
           $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
                <tbody>
                     <tr>
                        <th width="15%" text-center>DEUDA</th>
                        <th width="40%" text-center>NOMBRE y APELLIDO</th>
                        <th width="20%" text-center>TELEFONO</th>
                        <th width="5%" text-center></th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                        <th width="5%"></th> 
                        </tr>
                    
                        <tr>
                        <td width="15%">$<?php echo $producto['TOTAL'] ?></td>
                        <td width="20%" text-center><?php echo $producto['NOMBRE'] ?></td>
                        <td width="20%" text-center><?php echo $producto['TELEFONO'] ?></td>
                         <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Pagar">Pagar</button> 
                            </form>
                            </td>
                              <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Comprar">Comprar</button> 
                            </form>
                            </td>



                          <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerVentas">Ver Compras</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="AgregarP">Ver CtaCte</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="ModificarP">Modificar Datos</button> 
                            </form>
                            </td>
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