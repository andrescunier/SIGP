<?php

include 'pacientes.php';
include 'templates/cabecera.php'

?>
<br>


 

    <h3>Paciente Nuevo </h3>
<table class="table table-striped ">
    <tbody>
       
       
        
       
       
       
        
    </tbody>
</table>
<?php
session_destroy();
session_start();
$_SESSION["PACIENTE"][0]=1;
?>


<tr>
          
<td colspan="5"></td>
              <th> <form action="grabar.php" method="post"> </th>
                <div class="alert alert-success">
                    <div class="form-group">
                <label for="my-input">Apellido y Nombre :</label>
                    <input id="nombre" class="form-control" type="text" name="ApellidoNombre" placeholder="Por favor escribe aqui Apellido y Nombre actual del Paciente" required>
                    <label for="my-input">DNI:</label>
                    <input id="domicilio" class="form-control" type="text" name="DNI" placeholder="Por favor escribe aqui DNI del paciente" required>
                    <label for="my-input">Padres:</label>
                    <input id="email" class="form-control" type="text" name="Padres" placeholder="Por favor escribe aqui talla del paciente" required>
                    <label for="my-input">Telefono:</label>
                    <input id="tel" class="form-control" type="Text" name="Telefono" placeholder="Por favor escribe aqui motivo de la consulta" required>
                    <label for="my-input">Email:</label>
                    <input id="tel" class="form-control" type="Email" name="Email" placeholder="Por favor escribe aqui motivo de la consulta" required>                    
                    <label for="my-input">Fecha de Nacimiento:</label>
                    <input id="horario" class="form-control" type="Date" name="FechaNacim" placeholder="Por favor escribe aqui las vacunas" required>
                    <label for="my-input">ObraSocial:</label>
                    <input id="texto" class="form-control" type="text" name="ObraSocial" placeholder="Por favor escribe aqui los estudios pedidos" required>
                    <label for="my-input">Numero de Afiliado:</label>
                    <input id="texto" class="form-control" type="text" name="NumeroAfiliado" placeholder="Por favor escribe aqui el PC" required>    
                    <label for="my-input">Antecedentes Medicos:</label>
                    <input id="texto" class="form-control" type="text" name="Antecedentes" placeholder="Por favor escribe aqui los Antecedentes Medicos" required>    
                    <label for="my-input">Direccion:</label>
                    <input id="texto" class="form-control" type="text" name="Direccion" placeholder="Por favor escriba la Direccion" required>
                    <label for="my-input">Grupo y Factor :</label>
                    <input id="texto" class="form-control" type="text" name="GrupoFactor" placeholder="Por favor escriba la Direccion" required>    
                </div>
                   
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Grabar">Grabar</button>
                </form>
               
            </td>
        </tr>

        


     
<?php
include 'templates/pie.php';
?>
