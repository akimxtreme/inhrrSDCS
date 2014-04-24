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



	<div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Síndrome</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Síndrome:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
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
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_s" type="submit" value="agregar_s">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Sindromes</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM sindrome ORDER BY sindrome";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["sindrome"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Diagnóstico Presuntivo</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Diag. Presuntivo:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
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
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_dp" type="submit" value="agregar_dp">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Diagnósticos Presuntivos</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM diagnostico_presuntivo ORDER BY diagnostico_presuntivo";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["diagnostico_presuntivo"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        <br />
        	<fieldset><legend class="grid_7">Agregar Tipo de Muestra</legend>
            <br />
            	<br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Tipo de Muestra:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
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
                <div class="grid_8 alpha visibilidad" id="accion_t_div">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div class="grid_8 alpha visibilidad" id="nuevo_t_div">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="nuevo_t" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_t" type="submit" value="agregar_t">Ejecutar Acción</button>
                
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Tipos de Muestras</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM tipo_muestras ORDER BY tipo_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tipo_muestras"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Tiempo para la Toma</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Tiempo:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM tiempo_toma_muestras ORDER BY tiempo_toma_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tiempo_toma_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_tt" type="submit" value="agregar_tt">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Tiempos para las Tomas</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM tiempo_toma_muestras ORDER BY tiempo_toma_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tiempo_toma_muestras"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Análisis a Realizar</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Análisis a Realizar:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM analisis_muestras ORDER BY analisis_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["analisis_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_aa" type="submit" value="agregar_aa">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Análisis a Realizar</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM analisis_muestras ORDER BY analisis_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["analisis_muestras"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Conservación de la Muestra</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Conservación:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM conservacion_muestras ORDER BY conservacion_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["conservacion_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_cm" type="submit" value="agregar_cm">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Conservaciónes de la Muestra</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM conservacion_muestras ORDER BY conservacion_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["conservacion_muestras"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    
    <div class="grid_8">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" onsubmit="">
        		<br />
            <fieldset><legend class="grid_7">Agregar Transporte de la muestra</legend>
            	<br />
                <br />
            	<div class="grid_8 alpha">
                <label class="grid_3">Transporte:</label>               
                <select class="grid_4" name="agregado" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="n">Agregar Nuevo...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM transporte_muestras ORDER BY transporte_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["transporte_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                </div>
                <div id="div_s1" class="grid_8 alpha visibilidad">
                <label class="grid_3">Acción:</label>               
                <select class="grid_4" name="accion_global" id="" onchange="acciones(this);">
                	<option>Seleccione...</option>
                    <option value="UPDATE">Modificar</option>
                    <option value="DELETE">Eliminar</option>
                </select>
                </div>
                <div class="clear"></div>
                <div id="div_s2" class="grid_8 alpha visibilidad">
                <label class="grid_3">Ingrese:</label>               
                <input class="grid_4" type="text" name="nuevo" id="" />
                </div>
                <div class="clear"></div>
                <br />
                <div class="grid_4 alpha prefix_4">
                <button class="grid_3" name="accion" id="agregar_tm" type="submit" value="agregar_tm">Ejecutar Acción</button>
                </div>
                
            </fieldset>
        
        </form>
        <table class="grid_8 alpha" style="background:#000000;">
    	
    	<td class=" grid_8 azul3 alpha">Listado de Transportes de la muestra</td>
        <td class="grid_8 blanco alpha">
        <select class="grid_8 alpha" style="background:none; margin:0px; border:none; border-radius:0px;" multiple="multiple">
                <?php
					include('conexion/conexion.php');
					$i=0;
					$sql="SELECT * FROM transporte_muestras ORDER BY transporte_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["transporte_muestras"];
					$campo2=$row["id"];
					$i++;
					echo '<option class="formulario" value="'. $campo2 .'">'. $i .') '. $campo1 .'</option>';
					}
					?>
          </select></td>
          </table>
    </div>
    <div class="clear"></div>
    <br /><br />
    
    

<?php pie(); ?>
</div>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>