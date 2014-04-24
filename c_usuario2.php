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
$usuario=$_GET['usuario'];
isset($usuario);

include('conexion/conexion.php');
					$sql="SELECT * FROM usuario WHERE id='$usuario'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["id"];
					$campo2=$row["usuario"];
					$campo3=$row["nombre_usuario"];
					$campo4=$row["cedula"];
					$campo5=$row["cod_unidad"];
					$campo6=$row["privilegio"];
					
					}

?>
	<div class="grid_16 blanco">
    	
        <h1 class="grid_15 prefix_1 verde alpha" style="color:#FFF;font-size:20px;text-shadow: 1px 1px 4px #000000;">Consultar Usuario</h1>
        	<div class="clear"></div>
            	<br />
                <br />
                <?php
				echo '<div style=" text-align:right; width:98%;"><img src="imagenes/foto/'. $campo4 .'.jpg" style="border: #CCCCCC solid 2px;"/></div>';
				consulta("Nombre Completo",$campo3);
				consulta("Cédula de Identidad",$campo4);
				consulta("Usuario",$campo2);
				
				
				 
				if($campo6!="0"){
					$campo6='Privilegios Limintados';
					}else{ $campo6='Todos los Privilegios';}
				consulta("Privilegio",$campo6);
				
				
				?>
            	
              
                <div class="clear"></div>
   </div>
   
<div class="clear"></div>
<br />
<?php pie(); ?>
</body>
</html>
<?php }else {echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';}?>