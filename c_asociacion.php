<?php session_start(); ?>
<?php 
// Variables de sesión
$usuario =$_SESSION['usuario'];
$nombre_usuario =$_SESSION['nombre_usuario'];
$privilegio = $_SESSION['privilegio'];
	if($privilegio=="0"){
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/estilos.css">
<script src="js/funciones.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/960/960.css">
<link rel="stylesheet" href="css/960/text.css">
<link rel="stylesheet" href="css/960/reset.css">
<?php include ('funciones.php'); ?>
<title>Sistema para la difusión de información a centros de salud</title>
</head>

<body class="hoja">
<div class="container_16">
<?php encabezado() ?>
<?php echo '<br /><div class="grid_16" style="text-align:right; font-size:10px;">USUARIO:'; echo $nombre_usuario . "</div>";?>
<?php menu("administrador.php","formulario.php"); ?>
<?php
// Variable Global:
	$consulta=$_GET['consulta'];
	if($consulta!=""){
		if($consulta=="asoc_dp_s"){
			echo '<div class="grid_16">
			<h2 class="grid_16 alpha">Listado Diagnostico(s) Presuntivo(s) asociado(s) a un sindrome</h2><br><br>
    		<table class="grid_16 alpha">';
			  		
			
			 include('conexion/conexion.php');
										
					$sql2="SELECT * FROM sindrome ORDER BY sindrome";
					$seleccion2=mysql_query($sql2,$conexion);
					while ($row2 = mysql_fetch_array($seleccion2)){
					$maestro=$row2["sindrome"];
					$cod_maestro=$row2["id"];
					
					echo '<td class="grid_16 azul3 alpha left">&raquo; '. $maestro .'</td>';
					
						$sql3="SELECT * FROM asoc_dp_s WHERE cod_maestro='$cod_maestro'";
						$seleccion3=mysql_query($sql3,$conexion);
						$cont=mysql_num_rows($seleccion3);
						
						
						
						if($cont==0){
							echo '<td class="grid_16 blanco alpha left">&raquo; Aun no existe un Diagnóstico Presuntivo Asociado</td>';
							echo '<td class="grid_16 blanco alpha right">Total de asociaciones: '. $cont .' </td>';
						}else{
							while ($row3 = mysql_fetch_array($seleccion3)){
							$cod_asociado=$row3["cod_asociado"];
							//echo '<td class="grid_16 blanco alpha left">'. $cod_asociado .'</td>';
								$sql4="SELECT * FROM diagnostico_presuntivo WHERE id='$cod_asociado'";
								$seleccion4=mysql_query($sql4,$conexion);
																
								while ($row4 = mysql_fetch_array($seleccion4)){
								$asociado=$row4["diagnostico_presuntivo"];
								echo '<td class="grid_16 blanco alpha left">&raquo; '. $asociado .'</td>';
								
								}
								
							}
							echo '<td class="grid_16 blanco alpha right">Total de asociaciones: '. $cont .'</td>';
						}
					
					}
			
			echo '</table></div><div class="clear"></div><br><br>';
			}
		if($consulta=="asoc_tm_dp"){
			echo '<div class="grid_16">
			<h2 class="grid_16 alpha">Listado de Tipo(s) de Muestra(s) asociado(s) a un Diagnostico Presuntivo</h2><br><br>
    		<table class="grid_16 alpha">';
			  		
			
			 include('conexion/conexion.php');
										
					$sql2="SELECT * FROM diagnostico_presuntivo ORDER BY diagnostico_presuntivo";
					$seleccion2=mysql_query($sql2,$conexion);
					while ($row2 = mysql_fetch_array($seleccion2)){
					$maestro=$row2["diagnostico_presuntivo"];
					$cod_maestro=$row2["id"];
					
					echo '<td class="grid_16 azul3 alpha left">&raquo; '. $maestro .'</td>';
					
						$sql3="SELECT * FROM asoc_tm_dp WHERE cod_maestro='$cod_maestro'";
						$seleccion3=mysql_query($sql3,$conexion);
						$cont=mysql_num_rows($seleccion3);
						
						
						
						if($cont==0){
							echo '<td class="grid_16 blanco alpha left">&raquo; Aun no existe un Tipo de Muestra Asociado</td>';
							echo '<td class="grid_16 blanco alpha right">Total de asociaciones: '. $cont .' </td>';
						}else{
							while ($row3 = mysql_fetch_array($seleccion3)){
							$cod_asociado=$row3["cod_asociado"];
							//echo '<td class="grid_16 blanco alpha left">'. $cod_asociado .'</td>';
								$sql4="SELECT * FROM tipo_muestras WHERE id='$cod_asociado'";
								$seleccion4=mysql_query($sql4,$conexion);
																
								while ($row4 = mysql_fetch_array($seleccion4)){
								$asociado=$row4["tipo_muestras"];
								echo '<td class="grid_16 blanco alpha left">&raquo; '. $asociado .'</td>';
								
								}
								
							}
							echo '<td class="grid_16 blanco alpha right">Total de asociaciones: '. $cont .'</td>';
						}
					
					}
			
			echo '</table></div><div class="clear"></div><br><br>';
			}
			
		
		}else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}
?>

   
<?php pie(); ?>
</div>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>