
<?php

$codigo = $_GET['c'];
$cod_muestra = $_GET['d'];

function div($condicion){
	if($condicion=="inicio"){
		echo '<label class="grid_5">Seleccionados:</label>'; 
		echo '<select class="grid_6" name="multiple[]" multiple="multiple" id="" onchange="unico(this);">';
	}
	if($condicion=="fin"){
		echo '</select>';
		echo '<input type="button" value="Eliminar Selección" onclick="showselect_4(this.value)">';
		}
	}

function analisis($dato,$dato2){
	div("inicio");
		include('conexion/conexion.php');
		$sql = "SELECT * FROM $dato2 WHERE cod_muestra='$dato'";
		
		$seleccion=mysql_query($sql,$conexion);
		while ($row = mysql_fetch_array($seleccion)){
		$campo1=$row["id"];
		$campo2=$row["analisis_muestras"];
		echo  '<option value="'. $campo1 .'" selected="selected" onclick="eliminar(this);">'. $campo2 .'</option>';
		}
		
	div("fin");
	}

include('conexion/conexion.php');
	$sql="DELETE FROM opc_analisis_muestras WHERE id='$codigo'";
	$seleccion=mysql_query($sql,$conexion);
	analisis($cod_muestra,'opc_analisis_muestras');

?>