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

	<div class="grid_16">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Asociar Diagnóstico Presuntivo a Síndrome</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Síndrome:</label>               
                <select class="grid_4" name="maestro" id="maestro" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM sindrome ORDER BY sindrome";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["sindrome"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div class="grid_8 alpha">
                <label class="grid_3">Diag. Presuntivo:</label>               
                <select class="grid_4" name="asociacion" id="asociacion" onchange="acciones(this);">
                	<option>Seleccione...</option>
                   	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM diagnostico_presuntivo ORDER BY diagnostico_presuntivo";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["diagnostico_presuntivo"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                           
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_12">
                <button class="grid_3" name="accion" id="asoc_dp_s" type="submit" value="asoc_dp_s">Asociar</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_16 alpha">
    	<td class="grid_14 azul3 alpha">Listado Diagnostico(s) Presuntivo(s) asociado(s) a un sindrome</td>
        <?php echo '<td class="grid_2 blanco alpha"><a class="verde grid_2 alpha omega" style="margin:-10px 0px -10px 0px; color:#FFF; text-shadow: 0px 0px 2px #000;" href="c_asociacion.php?consulta=asoc_dp_s">Consultar &raquo;</a></td> ';?>
        </table>
    </div>
    <div class="clear"></div>
    <br /><br />
    <div class="grid_16">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Asociar Toma de Muestra a Diagnóstico Presuntivo</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Diag. Presuntivo:</label>               
                <select class="grid_4" name="maestro" id="maestro" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM diagnostico_presuntivo ORDER BY diagnostico_presuntivo";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["diagnostico_presuntivo"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div class="grid_8 alpha">
                <label class="grid_3">Tipo de Muestra:</label>               
                <select class="grid_4" name="asociacion" id="asociacion" onchange="acciones(this);">
                	<option>Seleccione...</option>
                   	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM tipo_muestras ORDER BY tipo_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tipo_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                           
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_12">
                <button class="grid_3" name="accion" id="asoc_tm_dp" type="submit" value="asoc_tm_dp">Asociar</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_16 alpha">
    	<td class="grid_14 azul3 alpha">Listado de Tipo(s) de Muestra(s) asociado(s) a un Diagnostico Presuntivo</td>
        <?php echo '<td class="grid_2 blanco alpha"><a class="verde grid_2 alpha omega" style="margin:-10px 0px -10px 0px; color:#FFF; text-shadow: 0px 0px 2px #000;" href="c_asociacion.php?consulta=asoc_tm_dp">Consultar &raquo;</a></td> ';?>
        </table>
    </div>
<div class="clear"></div>
<br /><br />
<?php pie(); ?>
</div>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>