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
<script type="text/javascript">
			// Diagnotico(s) Presuntivo(s) Asociado(s) a un(a) Síndrome
			function showselect(str){
				var xmlhttp; 
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					 {
					 document.getElementById("dependiente").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","asoc_dp_s.php?c="+str,true);
				xmlhttp.send();
			}
			// Tipo(s) de Muestra(s) Asociado(s) a un(os) Diagnóstico(s) Presuntivo(s)
			function showselect_2(str){
				var xmlhttp; 
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					 {
					 document.getElementById("dependiente_2").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","asoc_tm_dp.php?c="+str,true);
				xmlhttp.send();
			}
			// Seleccionar un(os) Análisis a Realizar
			function showselect_3(str){
				var xmlhttp; 
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					 {
					 document.getElementById("dependiente_3").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","multiple_am2.php?c=" + str + "&d=" + (document.getElementById('cod_muestra').value) ,true);
				//xmlhttp.open("GET","multiple_am.php?c=" + str,true);
				xmlhttp.send();
			}
			// Elimina analisis seleccionado
			function showselect_4(str){
				var xmlhttp; 
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					 {
					 document.getElementById("dependiente_3").innerHTML=xmlhttp.responseText;
					 }
				  }
				xmlhttp.open("GET","eliminar_am2.php?c=" + (document.getElementById('eliminar').value) + "&d=" + (document.getElementById('cod_muestra').value) ,true);
			  	//xmlhttp.open("GET","eliminar_am.php?c=" + (document.getElementById('eliminar').value),true);
				xmlhttp.send();
			}
			</script>
            
            <script type="text/javascript">
 				icremento =0;
				function crear(obj) {
				  icremento++;
				  
				  field = document.getElementById('field'); 
				  contenedor = document.createElement('div'); 
				  contenedor.className = 'prefix_5'; 
				  contenedor.id = 'div'+icremento; 
				  field.appendChild(contenedor); 
				 
				  boton = document.createElement('input');
				  boton.type = 'text';
				  boton.onchange = '';
				  boton.className = 'grid_6';
				  boton.onblur = function (){ unico(this);}
				  boton.name = 'text'+'[]'; 
				  contenedor.appendChild(boton); 
				 
				   
				  boton = document.createElement('input'); 
				  boton.type = 'button'; 
				  boton.value = 'Eliminar'; 
				  boton.name = 'div'+icremento;
				  boton.onclick = function () {borrar(this.name)} 
				  contenedor.appendChild(boton); 
				}
				function borrar(obj) {
				  field = document.getElementById('field'); 
				  field.removeChild(document.getElementById(obj)); 
				}
				</script>
<body class="hoja">

<div class="container_16">
<?php encabezado() ?>
<?php echo '<br /><div class="grid_16" style="text-align:right; font-size:10px;">USUARIO:'; echo $nombre_usuario . "</div>";?>
<?php menu("editar_formulario.php","m_formulario.php"); ?>
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


<?php 
// Vaciando Datos del $usuario en la tabla tmp_analisis_muestras
include('conexion/conexion.php');
$sql="DELETE FROM tmp_analisis_muestras WHERE usuario='$usuario'";
$seleccion=mysql_query($sql,$conexion);
mysql_close(); 
?>
	<div class="grid_16">
    	<form class="form margen" action="bd_acciones.php" method="post" name="" id="formulario" onsubmit="return controles(this.value);">
        <br />
        	<fieldset><legend class="grid_7">Agregar una Muestra</legend>
            	<br />
                <br />
                
            	<div class="grid_16 alpha">
                <label class="grid_5">Síndrome:</label>               
                <select class="grid_6" name="sindrome" id="sindrome" onchange="showselect(this.value); unico(this);">
                	<option><?php echo $campo2; ?></option>
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
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha" id="dependiente">
                <label class="grid_5">Diagnóstico Presuntivo:</label>               
                <select class="grid_6" name="diagnostico_presuntivo" id="diagnostico_presuntivo" onchange="unico(this);">
                	<option><?php echo $campo3; ?></option>
                	<option>Seleccione...</option>
                	<?php
					/*include('conexion/conexion.php');
					$sql="SELECT * FROM diagnostico_presuntivo ORDER BY diagnostico_presuntivo";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["diagnostico_presuntivo"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}*/
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha" id="dependiente_2">
                <label class="grid_5">Tipo de Muestra:</label>               
                <select class="grid_6" name="tipo" id="tipo" onchange="unico(this);">
                	<option><?php echo $campo4; ?></option>
                    <option>Seleccione...</option>
                	<?php
					/*
					include('conexion/conexion.php');
					$sql="SELECT * FROM tipo_muestras ORDER BY tipo_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tipo_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					*/
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Tiempo para la Toma:</label>               
                <select class="grid_6" name="tiempo" id="tiempo" onchange="unico(this);">
                	<option><?php echo $campo5; ?></option>
                	<option>Seleccione...</option>
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
                <strong class="strong">*</strong>
                </div>
                <!--                
                <div class="grid_16 alpha">
                <label class="grid_5">Cantidades Mínimas de la muestra:</label>
                <input class="grid_6" name="cantidad_minima" id="cantidad_minima" type="text" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                -->
                <div class="grid_16 alpha">
                <label class="grid_5">Análisis a realizar:</label>               
                <select class="grid_6" name="analisis" id="analisis" onchange="showselect_3(this.value); unico(this);">
                	<option>Seleccione...</option>
                    <option>Ninguno</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM analisis_muestras ORDER BY analisis_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["analisis_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo1 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                <input type="hidden" name="cod_muestra" id="cod_muestra" value="<?php echo $muestra; ?>" />
                <input type="hidden" id="eliminar"/>
                <div class="grid_16 alpha" id="dependiente_3">
         		
                <label class="grid_5">Seleccionados:</label>               
                <select class="grid_6" name="multiple[]" multiple="multiple" onchange="unico(this);">
                <?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM opc_analisis_muestras WHERE cod_muestra='$muestra' ORDER BY analisis_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["analisis_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                <input type="button" value="Eliminar Selección" onclick="showselect_4(this.value)">                
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Conservación de la muestra:</label>               
                <select class="grid_6" name="conservacion" id="conservacion" onchange="unico(this);">
                	<option><?php echo $campo6; ?></option>
                    <option>Seleccione...</option>
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
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Transporte de la muestra:</label>               
                <select class="grid_6" name="transporte" id="transporte" onchange="unico(this);">
                	<option><?php echo $campo7; ?></option>
                	<option>Seleccione...</option>
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
                <strong class="strong">*</strong>
                </div>
                                
                <div class="grid_16 alpha">
                <label class="grid_5">Observaciones:</label>
                <textarea class="grid_10 textarea" name="observaciones"><?php if($campo8!=""){echo $campo8; } ?></textarea>
                </div>
                <!--
                <div class="grid_16 alpha" id="field">
                <label class="grid_5">Información de Interés:</label>
                <input class="grid_6" name="link" id="link" type="text" onblur="unico(this);" /><input type="button" value="+" onclick="crear(this)">
                </div>
                -->
                
                <div class="clear"></div>
                <br />
                
                <div class="grid_2 alpha prefix_14">
                <button name="accion" id="modificar" type="submit" value="modificar_m">Modificar</button>
                <br />
                <br />
                </div>
               
				            
                
            </fieldset>
        
        </form>
    </div>
<div class="clear"></div>
<?php pie(); ?>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>