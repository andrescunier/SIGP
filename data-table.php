
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Purchased On</th>
                            <th>Customer</th>
                            <th>Ship to</th>
                            <th>Base Price</th>
                            <th>Purchased Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php



   $sentencia=$pdo->prepare("SELECT * FROM clientes where ESTADO='CLIEN'  order by Nombre asc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>


  <td  class="buscar" ><?php echo $producto['NOMBRE'] ?></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                            <form action="" method="post">
                 <input type="hidden"
                 name="DNI" 
                 id="DNI" 
                 value="<?php echo ( $producto['SOCIO']);?>">  
                              <button class="btn btn-outline-primary" type="submit" name="btnAccion" value="Modificar">Modificar Datos</button> 
                            </td>  
                  
                 </form>
                 </td>
                 
            
                 </tr>


                 <?php } ?>
                       


                        <tr>
                            <td>10</td>
                            <td>2003/12/26</td>
                            <td>Tom</td>
                            <td>Germany</td>
                            <td>$1100</td>
                            <td>$2300</td>
                            <td>
                              <label class="badge badge-danger">Pending</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        