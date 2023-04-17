<?php
include 'segur.php';
$usuario="";
$pass="";

$cliente=$_POST['correo'];
     $sentencia=$pdo->prepare("SELECT * FROM usuarios where user='$cliente' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);


foreach($listaProductos as $producto) {   
  

  $password=$producto['password'] ;
  $usuario=$_POST['correo'];
  


        

        
        
        
    }


$pass=$_POST['pass']; 
    if ($pass==$password)
               {   
               header("Location:menu.php?");

               $_SESSION['LOGIN'][0]=3;
               $producto=array(
                
                'USUARIO'=>$usuario,
               
            );

            array_push($_SESSION['LOGIN'],$producto);

                }else{
                    header("Location:indexBad.php?");
               
                }
  


?>