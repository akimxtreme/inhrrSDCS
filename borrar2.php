<?php
$codigo = $_GET['b'];
$muestra = $_GET['d'];
include('conexion/conexion.php');
$sql="DELETE FROM opc_muestra WHERE id='$codigo'";
$ingreso=mysql_query($sql,$conexion);


					$sql="SELECT * FROM opc_muestra WHERE cod_muestra='$muestra'";
					$seleccion=mysql_query($sql,$conexion);
					while ($row = mysql_fetch_array($seleccion)){
					$id_opc=$row["id"];
					$campo2=$row["info_interes"];
					//echo '<input class="grid_6" name="clave" type="hidden" value="'. $muestra .'"/>';
					echo '<input class="grid_6" name="text[]" type="text" value="'. $campo2 .'" onblur="unico(this);" />';
					echo '<button type="button" value="'. $id_opc .'" title="'. $id_opc .'"onclick="borrar2('.$id_opc.','. $muestra .')">Eliminar</button>';
					echo '<br>';
					echo '<br>';
					}

?>