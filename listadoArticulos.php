<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

     <div class="row">
     <table class="table table-striped">
      
     <tbody>
                     <tr>
                        <th width="20%" text-center>Producto</th>
                        <th width="20%" text-center>Cantidad</th>
                        <th width="20%" text-center>Producto</th>
                        <th width="20%" text-center>Cantidad</th>
                        <th width="20%" text-center>Cantidad</th>
                         
                        </tr>
    </table>
         <?php
            $sentencia=$pdo->prepare('SELECT * FROM `tldproductos`');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
         
            <table class="table table-striped">
                <tbody>
                    
                        <tr>
                        <td width="20%"><?php echo $producto['ID'] ?></td>
                        <td width="20%"><?php echo $producto['Nombre'] ?></td>
                        <td width="20%"><?php echo $producto['Precio'] ?></td>
                        <td width="20%"><?php echo $producto['Descripcion'] ?></td>
                        <td width="20%" text-center ><?php echo $producto['Imagen'] ?></td>
                         
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