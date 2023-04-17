<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
 <?php if(!empty($_SESSION['SEGUR'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['SEGUR'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>



<?php } ?>
<div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa palabra clave a  Buscar...">
      </div>
      
<br>
     <div class="table">
     <table >
            <thead>
                     <tr>
                       <th scope="col"  width="2%" text-left >ID</th>
                         <th scope="col"  width="10%" text-left >Tipo </th>
                        <th scope="col" width="15%"  >Nombre y Apellido</th>
                       <th scope="col" width="15%" text-left>Direccion</th>
                       
                       <th scope="col" width="10%" text-left>WhatsApp</th>
                        
                        <th scope="col" width="10%" text-left > Email</th>
                        <th scope="col" width="10%" text-left>Mensaje</th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%"></th> 
         </tr>
         </thead>
</table>
<?php
            $sentencia=$pdo->prepare('SELECT * FROM clientes where ESTADO="LEAD" and Complejo="RTPURU" and  ALTA is null  order by SOCIO desc');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           // print_r($listaProductos);
            

         ?>
         <?php foreach($listaProductos as $producto) { ?>
            <table class="table-responsive buscar">
           
                <tbody  class="buscar">
                     
   
                        <tr>
                        <td width="2%" text-left ><?php echo $producto['SOCIO'] ?></td>
                         <td width="10%" text-left ><?php echo $producto['BAJA'] ?></td>
                        <td width="15%" text-left ><?php echo $producto['NOMBRE'] ?></td>
                        <td width="15%" text-left ><?php echo $producto['APELLIDO']  ?></td>

                  
                        <td width="10%" text-left><a href="https://wa.me/<?php echo $producto['TELEFONO'] ?>"><?php echo $producto['TELEFONO'] ?></td>
                        <td width="10%" text-left ><a href="mailto:<?php echo $producto['Correo electronico'] ?>"><?php echo $producto['Correo electronico'] ?></td>
                        <td width="10%" text-left></td>
                        <td width="10%" text-left >
                            <form action="actualizaEstadoLead.php" method="post">
                            <input type="hidden"
                            name="ID" 
                            id="ID" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Contactado">Contactado</button> 
                            </form>
                            </td>

                            <td width="10%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="ModificarLead">Modificar Datos</button> 
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