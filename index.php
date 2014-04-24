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
	<div class=" suffix_3 grid_10 prefix_3">
    	<form class="form margen" action="bd_acciones.php" method="post" name="formulario" id="formulario" onsubmit="return controles(this.value);">
        <br />
        	<fieldset><legend class="grid_7">Acceso al Sistema</legend>
            	<br />
                <br />
                
            	               
                                
                <div class="grid_10 alpha">
                <label class="grid_4">Usuario:</label>
                <input class="grid_5" name="usuario" id="usuario" type="text" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                
                <div class="grid_10 alpha">
                <label class="grid_4">Contraseña:</label>
                <input class="grid_5" name="contrasenia" id="contrasenia" type="password" onblur="unico(this);" />
                <strong class="strong">*</strong>
                </div>
                            
                <div class="clear"></div>
                <br />
                
                <div class="grid_2 alpha prefix_8">
                <button name="accion" id="ingresar" type="submit" value="ingresar">Ingresar</button>
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