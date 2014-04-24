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
			  	xmlhttp.open("GET","asoc_personal_unidad.php?c="+str,true);
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
			  	xmlhttp.open("GET","multiple_am.php?c=" + str + "&d=" + (document.getElementById('user').value) ,true);
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
				xmlhttp.open("GET","eliminar_am.php?c=" + (document.getElementById('eliminar').value) + "&d=" + (document.getElementById('user').value) ,true);
			  	//xmlhttp.open("GET","eliminar_am.php?c=" + (document.getElementById('eliminar').value),true);
				xmlhttp.send();
			}
			</script>

<body class="hoja">

<div class="container_16">
<?php encabezado() ?>
<?php echo '<br /><div class="grid_16" style="text-align:right; font-size:10px;">USUARIO:'; echo $nombre_usuario . "</div>";?>
<?php menu("editar_formulario.php","m_formulario.php"); ?>
	<div class="grid_16">
    	<form class="form margen" action="bd_acciones.php" method="post" name="formulario" id="formulario" onsubmit="return controles(this.value);">
        <br />
        	<fieldset><legend class="grid_7">Agregar Usuario</legend>
            	<br />
                <br />
                
            	<div class="grid_16 alpha">
                <label class="grid_5">Unidad:</label>               
                <select class="grid_6" name="unidad" id="unidad" onchange="showselect(this.value); unico(this);">
                	<option>Seleccione...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM unidades ORDER BY unidad";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["unidad"];
					$campo2=$row["codunidad"];
					echo '<option class="formulario" title="'. $campo2 .'" value="'. $campo2 .'">'. $campo1 .'</option>';
					}
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha" id="dependiente">
                <label class="grid_5">Personal:</label>               
                <select class="grid_6" name="personal" id="personal" onchange="unico(this);">
                	<option>Seleccione...</option>
                	<?php
					include('conexion/conexion.php');
					$sql="SELECT * FROM personal WHERE tipo='E' OR tipo='O' OR tipo='V' ORDER BY nombres";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["apellidos"];
					$campo2=$row["nombres"];
					$campo3=$row["cedula"];
					$campo4=$row["tipo"];
					echo '<option class="formulario" title="'. $campo3 . " -- ". $campo4 .'" value="'. $campo3 .'">'. $campo2 . ' ' . $campo1 .'</option>';
					}
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha" id="dependiente_2">
                <label class="grid_5">Nombre de Usuario:</label>               
                <input class="grid_6" name="usuario" id="usuario" type="text" value="Seleccione..." onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                
                
                
               
                <div class="clear"></div>
                <br />
                
                <div class="grid_2 alpha prefix_14">
                <button name="accion" id="accion" type="submit" value="a_usuario">Agregar</button>
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