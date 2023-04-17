<?php

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
     <div class="row">
         <?php
            $sentencia=$pdo->prepare('SELECT * FROM clientes where ESTADO="PROVE" order by ESTADO asc, SOCIO asc');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
                <tbody>
                     <tr>
                        <th width="15%" text-center>SOCIO</th>
                        <th width="20%" text-center>Apellido y Nombre</th>
                        <th width="20%" text-center>Obra Social</th>
                        <th width="20%" text-center>Telefono</th>
                        <th width="10%" text-center>Estado</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                        <th width="5%"></th> 
                        </tr>
                    
                        <tr>
                        <td width="15%"><?php echo $producto['SOCIO'] ?></td>
                        <td width="20%" text-center ><?php echo $producto['APELLIDO'] , $producto['NOMBRE'] ?></td>
                        <td width="20%" text-center><?php echo $producto['CertPlan'] ?></td>
                        <td width="20%" text-center><?php echo $producto['TELÉFONO'] ?></td>
                        <td width="10%" text-center><?php echo $producto['ESTADO'] ?></td>
                        <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="Agregar">Nuevo Pago</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="Agregar">Ver CtaCte</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="Agregar">Modificar Datos</button> 
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