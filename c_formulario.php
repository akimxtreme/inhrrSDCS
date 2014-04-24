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
<?php menu("formulario.php","#"); ?>
	<div class="grid_16 azul">
    	<form class="margen" action="" method="post" name="" id="">
        	<fieldset><legend class="grid_7">Busqueda de Muestras</legend>
            	<br />
                <br />
                
            	<div class="grid_16 alpha">
                <label class="grid_5">Síndrome:</label>               
                <select class="grid_6" name="sindrome" id="sindrome" onchange="unico(this);">
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
                
                <div class="grid_16 alpha">
                <label class="grid_5">Tipo de Muestra:</label>               
                <select class="grid_6" name="tipo" id="tipo" onchange="unico(this);">
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
                <div class="grid_2 alpha prefix_10">
                <button name="accion" id="agregar" type="submit" value="">Buscar</button>
                <br />
                <br />
                </div>
            </fieldset>
        </form>
    </div>
    <div class="grid_16">
    <br />
    <table class="grid_16 alpha">
    <td class=" grid_1 azul3 alpha omega">nº</td>
    <td class=" grid_5 azul3 alpha omega">Sindrome</td>
    <td class=" grid_5 azul3 alpha omega">Diagnóstico Presuntivo</td>
    <td class=" grid_4 azul3 alpha omega">Tipo de Muestra</td>
    <td class=" grid_2 azul3 alpha omega">Ver todo</td>
    <?php
	include('conexion/conexion.php');
	$i=0;
					$sql="SELECT * FROM muestra ORDER BY id DESC";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["id"];
					$campo2=$row["sindrome"];
					$campo3=$row["diagnostico_presuntivo"];
					$campo4=$row["tipo"];
					
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
					echo '<td class="grid_1 blanco alpha omega">' . $i .'</td> ';
					echo '<td class="grid_5 blanco alpha omega">' . $campo2 . '</td>';
					echo '<td class="grid_5 blanco alpha omega">' . $campo3 . '</td>';
					echo '<td class="grid_4 blanco alpha omega">' . $campo4 . '</td>';
					echo '<td class="grid_2 blanco alpha omega"><a class="verde grid_2 alpha omega" style="margin:-10px 0px -10px 0px; color:#FFF; text-shadow: 0px 0px 2px #000;" href="c_formulario2.php?muestra=' .$campo1 . '">Consultar &raquo;</a></td> ';
					}
	?>
    </table>
    </div>
    
<div class="clear"></div>
<br />
<?php pie(); ?>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>