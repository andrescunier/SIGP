<?php include("header.php");

$query_sliders_productos = "SELECT * FROM sliders_productos order by orden asc";
$sliders_productos = mysql_query($query_sliders_productos, $ceofic) or die(mysql_error());
$row_sliders_productos = mysql_fetch_assoc($sliders_productos);
if(mysql_num_rows($sliders_productos)){ 

?>
        <div class="hidden-xs">
        <ul class="bxslider"><!-- slider -->   

<?php do{ ?>                     
		<li><img src="img_sliders_productos/<?php echo $row_sliders_productos['foto']; ?>" alt="<?php echo $row_sliders_productos['foto']; ?>"></li>
<?php } while ($row_sliders_productos = mysql_fetch_assoc($sliders_productos)); ?>             
		
        		</ul><!-- slider -->
		</div>
<?php } ?>        

<?php
$query_sliders_productos = "SELECT * FROM sliders_productos order by orden asc";
$sliders_productos = mysql_query($query_sliders_productos, $ceofic) or die(mysql_error());
$row_sliders_productos = mysql_fetch_assoc($sliders_productos);
if(mysql_num_rows($sliders_productos)){ 

?>
        
        		<div class="hidden-md hidden-sm hidden-lg slidemobile">
		<ul class="bxslider3"><!-- slider -->
<?php do{ ?>                     
		<li><img src="img_sliders_productos/<?php echo $row_sliders_productos['foto_mobile']; ?>" alt="<?php echo $row_sliders_productos['foto_mobile']; ?>"></li>
<?php } while ($row_sliders_productos = mysql_fetch_assoc($sliders_productos)); ?>     
				</ul><!-- slider -->
		</div>
<?php } ?> 		
		
		
		
		<div class="texto1">
			<div class="container">
				<h1>MUEBLES MET&Aacute;LICOS</h1>
				<p>En CEOFIC S.A. te ayudamos a elegir la mejor opción en mobiliarios para tu empresa. <br>Te ofrecemos una amplia variedad de tamaños, formatos y materialidades
en cada uno de nuestros productos, logrando asídar respuesta a proyectos heterogenos como instalaciones hospitalarias, edificios públicos, sucursales bancarias, entornos de oficinas, cadenas hoteleras,etc.</p>
			</div>
		</div>
		
<?php
$query_subcategorias = "SELECT * FROM subcategorias order by orden asc";
$subcategorias = mysql_query($query_subcategorias, $ceofic) or die(mysql_error());
$row_subcategorias = mysql_fetch_assoc($subcategorias);
$totalRows_subcategorias = mysql_num_rows($subcategorias);	           
?>        
        
		<div class="productos" id="prods">
        
<?php do{ ?>        
			<!--  -->
			<div class="titulo"><span></span> <?php echo $row_subcategorias['nombre']; ?></div>
			<div class="carousel1" id="carousel1">
			
<?php 
$query_productos = "SELECT * FROM productos where id_subcategoria = ".intval($row_subcategorias['Id'])." order by orden";
$productos = mysql_query($query_productos, $ceofic) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);
if(mysql_num_rows($productos)){
	do{
?>            
            
				<div class="item">
				<a href="detalle/<?php echo re_texto($row_productos['nombre']); ?>-<?php echo re_texto($row_productos['art']); ?>/<?php echo $row_productos['Id']; ?>"><img src="img_productos/<?php echo $row_productos['foto']; ?>"></a>
					<div class="pad">		
						<h2>Artículo <?php echo $row_productos['art']; ?></h2>
					</div>				
				</div>
            
<?php } while ($row_productos = mysql_fetch_assoc($productos)); } ?>            
            

		</div>
			<!--  -->
			
 <?php } while ($row_subcategorias = mysql_fetch_assoc($subcategorias)); ?>			
		
			<div class="clear"></div>
		</div>
		
		
		<?php include("footer.php");?>
