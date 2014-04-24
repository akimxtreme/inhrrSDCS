<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cerrar Sesión</title>
</head>

<body class="hoja">
<?php
// Cerrar la Sesión
$accion=$_GET['accion'];
if($accion == 'destroy'){
	
	session_destroy();

/*?><script>alert("Se ha cerrado la sesi\u00f3n");</script><?*/
echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';
 
}
?>
</body>
</html>