<?php


include 'pacientes.php';
include 'templates/cabecera.php';

?>
<?php 
print_r($_POST);
$sentencia=$pdo->prepare("INSERT INTO `pacient` (`ApellidoNombre`,`DNI`,`FechaNacim`,`Padres`,`Telefono`,`Email`,`ObraSocial`,`NumeroAfiliado`,`Direccion`,`Antecedentes`) 
                VALUES (1,2,3,4,5,6,7,8,9);");
$sentencia->execute();                
    if($_POST){
        $ApellidoNombre=$_POST["ApellidoNombre"];
        $DNI=$_POST["DNI"];
        $FechaNacim=$_POST["FechaNacim"];
        $Padres=$_POST["Padres"];
        $Telefono=$_POST["Telefono"];
        $Email=$_POST["Email"]; 
        $ObraSocial=$_POST["ObraSocial"];
        $NumeroAfiliado=$_POST["NumeroAfiliado"];
        $Direccion=$_POST["Direccion"];
        $Antecedentes=$_POST["Antecedentes"];   
        $GrupoFactor=$_POST["GrupoFactor"];  
        foreach ($_SESSION['PACIENTE'] as $indice => $producto){   
                $sentencia=$pdo->prepare("INSERT INTO `paciente` (`ApellidoNombre`,`DNI`,`FechaNacim`,`Padres`,`Telefono`,`Email`,`ObraSocial`,`NumeroAfiliado`,`Direccion`,`Antecedentes`,`GrupoFactor`) 
                VALUES (:ApellidoNombre,:DNI,:FechaNacim,:Padres,:Telefono,:Email,:ObraSocial,:NumeroAfiliado,:Direccion,:Antecedentes,:GrupoFactor);");
                $sentencia->bindParam(":ApellidoNombre",$ApellidoNombre);
                $sentencia->bindParam(":DNI",$DNI);
                $sentencia->bindParam(":FechaNacim",$FechaNacim);
                $sentencia->bindParam(":Padres",$Padres);
                $sentencia->bindParam(":Telefono",$Telefono);
                $sentencia->bindParam(":Email",$Email);
                $sentencia->bindParam(":ObraSocial",$ObraSocial);
                $sentencia->bindParam(":NumeroAfiliado",$NumeroAfiliado);
                $sentencia->bindParam(":Direccion",$Direccion);
                $sentencia->bindParam(":Antecedentes",$Antecedentes);
                $sentencia->bindParam(":GrupoFactor",$GrupoFactor);
                $sentencia->execute();
                                                                }

        
            
       

    }
?>

<div class="jumbotron text-center">
    <!-- Set up a container element for the button -->
    
    <h1 class="display-4">¡Registrado!</h1>
    <hr class="my-4">
    <div id="paypal-button-container"></div>

    
   
</div>

<?php session_destroy(); ?>
<?php

   

    // redirecciona a la página anterior
//    header("Location:index.php?");

?>





<?php
include 'templates/pie.php';
?>