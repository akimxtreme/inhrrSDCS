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
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/960/960.css">
<link rel="stylesheet" href="css/960/text.css">
<link rel="stylesheet" href="css/960/reset.css">
<script src="js/funciones.js" type="text/javascript"></script>
<?php include ('funciones.php'); ?>
<title>Sistema para la difusión de información a centros de salud</title>
</head>
<body class="hoja">
<div class="container_16">
<?php encabezado() ?>
<?php echo '<br /><div class="grid_16" style="text-align:right; font-size:10px;">USUARIO:'; echo $nombre_usuario . "</div>";?>
<?php menu("c_formulario.php","formulario.php"); ?>
<?php
$muestra=$_GET['muestra'];
isset($muestra);

include('conexion/conexion.php');
					$sql="SELECT * FROM muestra WHERE id='$muestra'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["id"];
					$campo2=$row["sindrome"];
					$campo3=$row["diagnostico_presuntivo"];
					$campo4=$row["tipo"];
					$campo5=$row["tiempo"];
					$campo6=$row["conservacion"];
					$campo7=$row["transporte"];
					$campo8=$row["observaciones"];
					}

?>
	<div class="grid_16 blanco">
    	
        <h1 class="grid_15 prefix_1 verde alpha" style="color:#FFF;font-size:20px;text-shadow: 1px 1px 4px #000000;">Consultar Muestra</h1>
        	<div class="clear"></div>
            	<br />
                <br />
                <?php
				consulta("Síndrome",$campo2);
				
				consulta("Diagnostico Presuntivo",$campo3);
				 
				consulta("Tipo de Muestra",$campo4);
				consulta("Tiempo para la Toma",$campo5);
				
				// Análisis a realizar
				echo '<div class="grid_16 alpha">';
				echo '<h2 class="grid_15 prefix_1 alpha">Análisis a realizar:</h2><br><br>';
				
				
				
					$sql="SELECT * FROM opc_analisis_muestras WHERE cod_muestra='$campo1'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
						$analisis_muestras=$row["analisis_muestras"];
						
    					echo '<p class="grid_15 prefix_1 alpha list" style="list-style:disc;">&raquo; '. $analisis_muestras .'</p>';
						 echo '<br>';echo '<br>';          
    					
						}
				
				echo' </div><div class="clear"></div><br />';
				echo '<br>';
				//consulta("Análisis a realizar",$campo6);
				consulta("Conservación de la muestra",$campo6);
				consulta("Transporte de la muestra",$campo7);
				if($campo8!=""){
				consulta("Observaciones",$campo8);
				}
				//echo '<h2 class="grid_15 prefix_1 alpha">Información de Interés:</h2>';
				//echo '<br>'; 
				?>
            	
                              
                
                      
                <?php
				include('conexion/conexion.php');
					$sql="SELECT * FROM opc_muestra WHERE cod_muestra='$muestra'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo2=$row["info_interes"];
					echo '<br>'; 
					echo '<p class="grid_15 prefix_1 alpha ">'. $campo2 .'</p>'; 
					echo '<br>'; 
										
					
					}
				?>
               
                
                
                <div class="clear"></div>
   </div>
<div class="clear"></div>
<br />
<?php pie(); ?>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>