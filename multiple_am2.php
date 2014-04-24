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
//analisis($user,'tmp_analisis_muestras');
	if(($codigo!="Seleccione...")){
		if($codigo!="Ninguno"){
		include('conexion/conexion.php');
				
		$sql = "SELECT * FROM opc_analisis_muestras WHERE analisis_muestras='$codigo' AND cod_muestra='$cod_muestra'";
		$seleccion=mysql_query($sql,$conexion);
		$cont=mysql_num_rows($seleccion);
			if($cont>=1){
				analisis($cod_muestra,'opc_analisis_muestras');
			}else{
				$sql = "INSERT INTO opc_analisis_muestras (cod_muestra, analisis_muestras) VALUE ('$cod_muestra', '$codigo')";
				$accion=mysql_query($sql,$conexion);
				
				analisis($cod_muestra,'opc_analisis_muestras');
				
				}
			
		
		
		}else{analisis($cod_muestra,'opc_analisis_muestras');}
	}else { analisis($cod_muestra,'opc_analisis_muestras');}
	
/*
$sql = "SELECT * FROM $bd_final WHERE cod_maestro='$maestro' AND cod_asociado='$asociacion'";
		$q=mysql_query($sql,$conexion);
		$cont=mysql_num_rows($q);
		if($cont>=1){
			echo '<a class="azul2" href="asociar_formulario.php">Volver al Formulario</a>';
		}else{		
				$sql = "INSERT INTO $bd_final (cod_maestro, cod_asociado) VALUE ('$maestro', '$asociacion')";
				$accion=mysql_query($sql,$conexion);
				echo '<a class="azul2" href="asociar_formulario.php">Volver al Formulario</a>';
		}
if(($codigo!="Seleccione....") || ($codigo=="")){
	include('conexion/conexion.php');
	$sql="SELECT * FROM analisis_muestras WHERE id='$codigo'";
		$seleccion2=mysql_query($sql,$conexion);
		while ($row = mysql_fetch_array($seleccion2)){
				$analisis_muestras=$row["analisis_muestras"];
				$sql = "INSERT INTO tmp_analisis_muestras (usuario, analisis_muestras) VALUE ('$usuario', '$analisis_muestras')";
				$seleccion=mysql_query($sql,$conexion);
		}
		
	echo '<label class="grid_5">SelecCCCcionados:</label>               
      	<select autofocus="autofocus"class="grid_6" name="multiple[]" multiple="multiple" id="" onchange="unico(this);">';
		$sql="SELECT * FROM tmp_analisis_muestras WHERE usuario='$usuario'";
		$seleccion=mysql_query($sql,$conexion);
		while ($row = mysql_fetch_array($seleccion)){
				$campo1=$row["id"];
				$campo3=$row["analisis_muestras"];	
		echo  '<option selected="selected" value="'. $id .'">'. $campo3 .'</option>';	
		}
	echo  '</select>
    <input type="button" value="Eliminar Selección" onclick="crear(this)">';
		
	}else {
		echo '<label class="grid_5">Seleccionados:</label>               
      	<select class="grid_6" name="analisis" multiple="multiple" id="" onchange="unico(this);">';
		echo  '</select>
        <input type="button" value="Eliminar Selección" onclick="crear(this)">';
		}

*/
/*echo '<label class="grid_5">Tipo de Muestra:</label>               
      <select class="grid_6" name="tipo" id="tipo" onchange="unico(this);">
      <option>Seleccione...</option>';
       include('conexion/conexion.php');
				$sql="SELECT * FROM asoc_tm_dp WHERE cod_maestro='$codigo'";
				$seleccion=mysql_query($sql,$conexion);
				while ($row = mysql_fetch_array($seleccion)){
				$campo1=$row["cod_asociado"];
					
					$sql="SELECT * FROM tipo_muestras WHERE id='$campo1'";
					$seleccion2=mysql_query($sql,$conexion);
					while ($row2 = mysql_fetch_array($seleccion2)){
					$campo2=$row2["tipo_muestras"];
					echo '<option class="formulario" value="'. $campo1 .'" title="'. $campo2.'">'. $campo2 .'</option>';
					}
				
				}
echo'</select>';
echo '<strong class="strong">*</strong>';
*/
?>