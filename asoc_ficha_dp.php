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
			  	xmlhttp.open("GET","ajax.php?c="+str,true);
				xmlhttp.send();
			}
			
			function borrar2(str,muestra){
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
					 document.getElementById("borrar2").innerHTML=xmlhttp.responseText;
					 }
				  }
			  	xmlhttp.open("GET","borrar2.php?b="+str+"&d="+muestra,true);
				xmlhttp.send();
			}
			</script>
            
            <script type="text/javascript">
 				icremento =0;
				function crear(obj) {
				  icremento++;
				  
				  field = document.getElementById('field'); 
				  contenedor = document.createElement('div'); 
				  contenedor.className = 'grid_8 alpha omega suffix_1 prefix_1 azul'; 
				  contenedor.id = 'div'+icremento; 
				  field.appendChild(contenedor); 
				 
				  boton = document.createElement('input');
				  boton.type = 'text';
				  boton.onchange = '';
				  boton.className = 'grid_6 alpha';
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
<?php menu("m_formulario.php","#"); ?>
<?php
$muestra=$_GET['muestra'];
isset($muestra);

include('conexion/conexion.php');
					$sql="SELECT * FROM muestra WHERE id='$muestra'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["id"];
					$campo2=$row["sindrome"];
					$campo3=$row["tipo"];
					$campo4=$row["tiempo"];
					$campo5=$row["cantidad_minima"];
					$campo6=$row["analisis"];
					$campo7=$row["conservacion"];
					$campo8=$row["transporte"];
					$campo9=$row["observaciones"];
					$i++;
						$sql="SELECT * FROM sindrome WHERE id='$campo2'";
						$seleccion2=mysql_query($sql,$conexion);
						while ($row2 = mysql_fetch_array($seleccion2)){
						$sindrome=$row2["sindrome"];
						}
						$sql="SELECT * FROM tipo_muestras WHERE id='$campo3'";
						$seleccion3=mysql_query($sql,$conexion);
						while ($row3 = mysql_fetch_array($seleccion3)){
						$tipo_muestras=$row3["tipo_muestras"];
						}
					
					}

?>
	<div class="grid_16">
    	<form class="form margen" action="bd_acciones.php" method="post" name="formulario" id="formulario" onsubmit="return controles(this.value);">
        <br />
        	<fieldset><legend class="grid_7">Modificar Muestra</legend>
            	<br />
                <br />
                
            	<div class="grid_16 alpha">
                <label class="grid_5">Síndrome:</label>               
                <select class="grid_6" name="sindrome" id="sindrome" onchange="showselect(this.value); unico(this);">
                	<option value="<?php echo $campo2; ?>"><?php echo $sindrome; ?></option>
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
                <label class="grid_5">Tipo de Muestra:</label>               
                <select class="grid_6" name="tipo" id="tipo" onchange="unico(this);">
                	<option value="<?php echo $campo3; ?>"><?php echo $tipo_muestras; ?></option>
                	<option>Seleccione...</option>
                	<?php
					/*include('conexion/conexion.php');
					$sql="SELECT * FROM tipo_muestras ORDER BY tipo_muestras";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["tipo_muestras"];
					$campo2=$row["id"];
					echo '<option class="formulario" value="'. $campo2 .'">'. $campo1 .'</option>';
					}*/
					?>
                </select>
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Tiempo para la Toma:</label>
                <input class="grid_6" name="tiempo" id="tiempo" type="text" value="<?php echo $campo4; ?>" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Cantidades Mínimas de la muestra:</label>
                <input class="grid_6" name="cantidad_minima" id="cantidad_minima" type="text" value="<?php echo $campo5; ?>" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Análisis a realizar:</label>
                <input class="grid_6" name="analisis" id="analisis" type="text" value="<?php echo $campo6; ?>" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Conservación de la muestra:</label>
                <input class="grid_6" name="conservacion" id="conservacion" type="text" value="<?php echo $campo7; ?>" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Transporte de la muestra:</label>
                <input class="grid_6" name="transporte" id="transporte" type="text" value="<?php echo $campo8; ?>" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_16 alpha">
                <label class="grid_5">Observaciones:</label>
                <textarea class="grid_10 textarea" name="observaciones" onblur="unico(this);"><?php echo $campo9; ?></textarea>
                </div>
                <label class="grid_5">Información de Interés:</label>
                <?php echo '<input class="grid_6" name="clave" type="hidden" value="'.$muestra.'"/>'; ?>
                <div class="grid_10 prefix_5 alpha" id="borrar2">
                <?php
				include('conexion/conexion.php');
					$sql="SELECT * FROM opc_muestra WHERE cod_muestra='$muestra'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$id_opc=$row["id"];
					$campo2=$row["info_interes"];
					
					echo '<input class="grid_6" name="text[]" type="text" value="'. $campo2 .'" onblur="unico(this);" />';
					echo '<button type="button" value="'. $id_opc .'" title="'. $id_opc .'"onclick="borrar2('.$id_opc.','. $muestra .')">Eliminar</button>';
					echo '<br>';
					echo '<br>';
					
					}
				?>
                </div>
                <div class="grid_11 prefix_5 alpha" id="field">
                <input type="button" value="Agregar más" onclick="crear(this)">
                </div>
                
                <div class="clear"></div>
                <br />
                
                <div class="grid_2 alpha prefix_14">
                <button name="accion" id="modificar_m" type="submit" value="modificar_m">Modificar</button>
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