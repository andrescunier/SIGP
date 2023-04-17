<?php


$mensaje="";

$mensaje="";
$DNI="";


if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            
            
        $DNI=$_POST['DNI']; 
           
        $producto=array(
            'DNI'=>$DNI,
            'TEL'=>$DNI

            
        )    ;
        $_SESSION["COBROS"][0]=$producto;
        $mensaje= print_r( $_SESSION,true); 
        header("Location:CobrarCliente.php?"); 
        break;
        case 'Devolver':

            
            
            $DNI=$_POST['DNI']; 
               
            $producto=array(
                'DNI'=>$DNI,
                'TEL'=>$DNI
    
                
            )    ;
            $_SESSION["COBROS"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:DevolverCliente.php?"); 
            break;

        case 'AgregarP':

            
            
            $DNI=$_POST['DNI']; 
               
            $producto=array(
                'DNI'=>$DNI,
                'TEL'=>$DNI
    
                
            )    ;
            $_SESSION["CARRITO"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:ctacteProveedores.php?"); 
            break;
    

        case 'Comprar':

            
            
            $DNI=$_POST['DNI']; 
               
            $producto=array(
                'DNI'=>$DNI,
                'TEL'=>$DNI
    
                
            )    ;
            $_SESSION["COMPRAS"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:compras.php?"); 
            break;


           
            case 'Vender':

            
            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["VENTAS"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:venderCliente.php?"); 
                break;


        case 'Pagar':

            
            
            $DNI=$_POST['DNI']; 
               
            $producto=array(
                'DNI'=>$DNI,
                'TEL'=>$DNI
    
                
            )    ;
            $_SESSION["COBROS"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:PagarProvee.php?"); 
            break;
        


            case 'PagarConcepto':

            
            
            $DNI=-1; 
               
            $producto=array(
                'DNI'=>$DNI,
                'TEL'=>$DNI
    
                
            )    ;
            $_SESSION["COBROS"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:PagarProveeConcepto.php?"); 
            break;





           

            case 'AgregarItem':
                
            $juntas = explode("-", $_POST['nombre']);
            $primeraId=$juntas[1];
            $primeraNombre=$juntas[0];




                if(is_numeric($primeraId)){
                    $ID=$primeraId;
                    $mensaje.="Ok ID correcto".$ID;
    
                }else{
                    $mensaje="Ups....ID incorrecto".$ID;break;
    
                }
                if(is_string($primeraNombre)){
                    $NOMBRE=$primeraNombre;
                    $mensaje.="Ok Nombre correcto".$NOMBRE;
    
                }else{
                    $mensaje.="Ups....Nombre incorrecto".$ID;break;
                
                }
            
    
                 if(is_numeric($_POST['cantidad'])){
                    $CANTIDAD=$_POST['cantidad'];
                    $mensaje.="Ok Cantidad correcto".$CANTIDAD;
    
                }else{
                    $mensaje.="Ups....Cantidad incorrecto".$ID;break;
                
                }
              
                if(is_numeric($_POST['precio'])){
                    $PRECIO=$_POST['precio'];
                    $mensaje.="Ok Precio correcto".$PRECIO;
    
                }else{
                    $mensaje.="Ups....Precio incorrecto".$ID;break;
            
                }
                    
                if(!isset($_SESSION['CARRITOVENTA']))
                {
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITOVENTA'][0]=$producto;
                $mensaje="Producto Agregado al Carrito";
                }        
                else
                {
                    $idProductos=array_column($_SESSION['CARRITOVENTA'],"ID");
                    if(in_array($ID,$idProductos)){
                        echo "<script> alert('El Producto ya ha sido seleccionado.');</script>";
                    }
                else {        
                
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
    
                array_push($_SESSION['CARRITOVENTA'],$producto);
                $mensaje="Producto Agregado al Carrito";
            }
            }
            $mensaje= print_r( $_SESSION,true); 
               
            break; 



            case 'AgregarItemCompra':
                
                   
            $juntas = explode("-", $_POST['nombre']);
            $primeraId=$juntas[1];
            $primeraNombre=$juntas[0];




                if(is_numeric($primeraId)){
                    $ID=$primeraId;
                    $mensaje.="Ok ID correcto".$ID;
    
                }else{
                    $mensaje="Ups....ID incorrecto".$ID;break;
    
                }
                if(is_string($primeraNombre)){
                    $NOMBRE=$primeraNombre;
                    $mensaje.="Ok Nombre correcto".$NOMBRE;
    
                }else{
                    $mensaje.="Ups....Nombre incorrecto".$ID;break;
                
                }
            
    
                 if(is_numeric($_POST['cantidad'])){
                    $CANTIDAD=$_POST['cantidad'];
                    $mensaje.="Ok Cantidad correcto".$CANTIDAD;
    
                }else{
                    $mensaje.="Ups....Cantidad incorrecto".$ID;break;
                
                }
              
                if(is_numeric($_POST['precio'])){
                    $PRECIO=$_POST['precio'];
                    $mensaje.="Ok Precio correcto".$PRECIO;
    
                }else{
                    $mensaje.="Ups....Precio incorrecto".$ID;break;
            
                }
                    
                if(!isset($_SESSION['CARRITOCOMPRA']))
                {
  $NumeroProductos=count($_SESSION['CARRITOCOMPRA']+1);  
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITOCOMPRA'][0]=$producto;
                $mensaje="Producto Agregado al Carrito";
                }        
                else
                {
                    $idProductos=array_column($_SESSION['CARRITOCOMPRA'],"ID");
                    if(in_array($ID,$idProductos)){
                        echo "<script> alert('El Producto ya ha sido seleccionado.');</script>";
                    }
                else {        
                
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
    
                array_push($_SESSION['CARRITOCOMPRA'],$producto);
                $mensaje="Producto Agregado al Carrito";
            }
            }
            $mensaje= print_r( $_SESSION,true); 
                
               
            break; 





 case 'AgregarItemCobro':







            $juntas = explode("-", $_POST['nombre']);
            $primeraId=$juntas[1];
            $primeraNombre=$juntas[0];

                
                if(is_numeric($primeraId)){
                    $ID=$primeraId;
                    $mensaje.="Ok ID correcto".$ID;
    
                }else{
                    $mensaje="Ups....ID incorrecto".$ID;break;
    
                }
                if(is_string($primeraNombre)){
                    $NOMBRE=$primeraNombre;
                    $mensaje.="Ok Nombre correcto".$NOMBRE;
    
                }else{
                    $mensaje.="Ups....Nombre incorrecto".$ID;break;
                
                }
            
    
                 if(is_numeric($_POST['cantidad'])){
                    $CANTIDAD=$_POST['cantidad'];
                    $mensaje.="Ok Cantidad correcto".$CANTIDAD;
    
                }else{
                    $mensaje.="Ups....Cantidad incorrecto".$ID;break;
                
                }
              


                if(is_numeric($_POST['precio'])){
                    $PRECIO=$_POST['precio'];
                    $mensaje.="Ok Precio correcto".$PRECIO;
    
                }else{
                    $mensaje.="Ups....Precio incorrecto".$ID;break;
            
                }
                    
                if(!isset($_SESSION['CARRITOCOBRO']))
                {
    
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITOCOBRO'][0]=$producto;
                $mensaje="Producto Agregado al Carrito";
                }        
                else
                {
                    $idProductos=array_column($_SESSION['CARRITOCOBRO'],"ID");
                    if(in_array($ID,$idProductos)){
                        echo "<script> alert('El Producto ya ha sido seleccionado.');</script>";
                    }
                else {        
                $NumeroProductos=count($_SESSION['CARRITOCOBRO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
    
                $_SESSION['CARRITOCOBRO'][$NumeroProductos]=$producto;
                $mensaje="Producto Agregado al Carrito";
            }
            }
            $mensaje= print_r( $_SESSION,true); 
               
            break; 


            case 'IngresoCobro':


        $FechaRecibo=$_POST["FechaRecibo"];
        $Recibo=$_POST["Recibo"];
        $SOCIO=$_POST["SOCIO"];
        $Detalle=$_POST["Detalle"];
        $Pago=$_POST["Pago"];
        $Importe=$_POST["Importe"];
        $Caja=$_POST["Importe"];
        $Complejo=$_POST['Complejo'];

        $producto=array(
        'FechaRecibo'=>$FechaRecibo,
        'Recibo'=>$Recibo,
        'SOCIO'=>$SOCIO,
        'Detalle'=>$Detalle,
        'Pago'=>$Pago,
        'Importe'=>$Importe,
        'Caja'=>$Caja,
       'Complejo' =>$Complejo,
                );

$_SESSION['COBRO'][0]=$producto;







            header("Location:ingresos.php?"); 


            break; 


            
        case 'VerCuenta':

            
            $DNI=$_POST['DNI']; 
               
            $producto=array(
                'SOCIO'=>$DNI
    
                
            )    ;
            $_SESSION["CARRITO"][0]=$producto;
            $mensaje= print_r( $_SESSION,true); 
            header("Location:ctacte.php?"); 


            break;






            case 'VerCuentaP':

            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'SOCIO'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:ctacteP.php?"); 
    
    
                break;
            case 'VerVentas':

            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'SOCIO'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:movStock.php?"); 
    
    
                break;
                case 'VerCompras':

            
                    $DNI=$_POST['DNI']; 
                       
                    $producto=array(
                        'SOCIO'=>$DNI
            
                        
                    )    ;
                    $_SESSION["CARRITO"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                    header("Location:movStockCompras.php?"); 
        
        
                    break;
                case 'VerMovStock':

            
                    $DNI=$_POST['DNI']; 
                       
                    $producto=array(
                        'DNI'=>$DNI,
                        'TEL'=>$DNI
            
                        
                    )    ;
                    $_SESSION["CARRITO"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                      
                    header("Location:movStockArticulo.php?"); 
        
        
                    break;
                    case 'VerMovCuenta':

            
                        $DNI=$_POST['DNI']; 
                           
                        $producto=array(
                            'DNI'=>$DNI,
                            'TEL'=>$DNI
                
                            
                        )    ;
                        $_SESSION["CARRITO"][0]=$producto;
                        $mensaje= print_r( $_SESSION,true); 
                          
                        header("Location:movStockCuenta.php?"); 
            
            
                        break;


                        case 'VerMovCategoria':

            
                            $DNI=$_POST['DNI']; 
                               
                            $producto=array(
                                'DNI'=>$DNI,
                                'TEL'=>$DNI
                    
                                
                            )    ;
                            $_SESSION["CARRITO"][0]=$producto;
                            $mensaje= print_r( $_SESSION,true); 
                              
                            header("Location:movStockCategoria.php?"); 
                
                
                            break;





                    case 'VerMovStock1':

            
                        $DNI=$_POST['DNI']; 
                           
                        $producto=array(
                            'DNI'=>$DNI,
                            'TEL'=>$DNI
                
                            
                        )    ;
                        $_SESSION["CARRITO"][0]=$producto;
                        $mensaje= print_r( $_SESSION,true); 
                          
                        header("Location:movStockArticulo.php?"); 
            
            
                        break;

            case 'Modificar':

            
            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:formularioModificarCliente.php?"); 
                break;

                case 'ModificarProvee':

            
            
                    $DNI=$_POST['DNI']; 
                       
                    $producto=array(
                        'DNI'=>$DNI,
                        'TEL'=>$DNI
            
                        
                    )    ;
                    $_SESSION["CARRITO"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                    header("Location:formularioModificarProvee.php?"); 
                    break;
                case 'ModificarP':

                            
                            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:formularioModificarProveedor.php?"); 
                break;    


                case 'ModificarLead':

            
            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
                header("Location:formularioModificarLead.php?"); 


                break;




                case 'ModificarLead3':
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
            
                header("Location:formularioModificarLead2.php?"); 

                
                break;  


                case 'ModificarContactado':

            
            
                $DNI=$_POST['DNI']; 
                   
                $producto=array(
                    'DNI'=>$DNI,
                    'TEL'=>$DNI
        
                    
                )    ;
                $_SESSION["CARRITO"][0]=$producto;
                $mensaje= print_r( $_SESSION,true); 
              header("Location:formularioModificarContactado.php?"); 
                
                break;  





                case 'ModificarFoto':

            
            
                    $ID=$_POST['ID']; 
                       
                    $producto=array(
                        'ID'=>$ID,
                        'TEL'=>$ID
            
                        
                    )    ;
                    $_SESSION["CARRITO"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                    header("Location:upload.php?"); 
                    break;    

                case 'ModificarArticulos':

            
            
                    $DNI=$_POST['DNI']; 
                       
                    $producto=array(
                        'DNI'=>$DNI,
                        'TEL'=>$DNI
            
                        
                    )    ;
                    $_SESSION["CARRITO"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                    header("Location:formularioModificarArticulos.php?"); 
                    break;    


                    case 'ModificarMedios':

            
            
                    $DNI=$_POST['DNI']; 
                       
                    $producto=array(
                        'DNI'=>$DNI,
                        'TEL'=>$DNI
            
                        
                    )    ;
                    $_SESSION["MEDIOS"][0]=$producto;
                    $mensaje= print_r( $_SESSION,true); 
                    header("Location:formularioModificarMedios.php?"); 
                    break;    


                    case 'ModificarCuentas':

            
            
                        $DNI=$_POST['DNI']; 
                           
                        $producto=array(
                            'DNI'=>$DNI,
                            'TEL'=>$DNI
                
                            
                        )    ;
                        $_SESSION["MEDIOS"][0]=$producto;
                        $mensaje= print_r( $_SESSION,true); 
                        header("Location:formularioModificarCuentas.php?"); 
                        break;    





                        case 'ModificarCategorias':

            
            
                            $DNI=$_POST['DNI']; 
                               
                            $producto=array(
                                'DNI'=>$DNI,
                                'TEL'=>$DNI
                    
                                
                            )    ;
                            $_SESSION["MEDIOS"][0]=$producto;
                            $mensaje= print_r( $_SESSION,true); 
                            header("Location:formularioModificarCategorias.php?"); 
                            break;    
    


                    case 'ModificarImagen':

            
            
                        $DNI=$_POST['DNI']; 
                           
                        $producto=array(
                            'DNI'=>$DNI,
                            'TEL'=>$DNI
                
                            
                        )    ;
                        $_SESSION["CARRITO"][0]=$producto;
                        $mensaje= print_r( $_SESSION,true); 
                        header("Location:formularioModificarImagen.php?"); 
                        break;    
            case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY)))
            {
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach ($_SESSION['CARRITOVENTA'] as $indice => $producto) {
                    if($producto['ID']==$ID)
                    {
                    unset($_SESSION['CARRITOVENTA'][$indice]);
                    echo " <script>alert('Elemento Borrado...');</script>";
                    }
                }

            }else{
                $mensaje="Ups....ID incorrecto".$ID;break;

        }
        break;   



        case "EliminarCompra":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY)))
            {
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach ($_SESSION['CARRITOCOMPRA'] as $indice => $producto) {
                    if($producto['ID']==$ID)
                    {
                    unset($_SESSION['CARRITOCOMPRA'][$indice]);
                    echo " <script>alert('Elemento Borrado...');</script>";
                    }
                }

            }else{
                $mensaje="Ups....ID incorrecto".$ID;break;

        }
        break;   
        case "EliminarCobro":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY)))
            {
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach ($_SESSION['CARRITOCOBRO'] as $indice => $producto) {
                    if($producto['ID']==$ID)
                    {
                    unset($_SESSION['CARRITOCOBRO'][$indice]);
                    echo " <script>alert('Elemento Borrado...');</script>";
                    }
                }

            }else{
                $mensaje="Ups....ID incorrecto".$ID;break;

        }
        break;   
    


    }
}
?>