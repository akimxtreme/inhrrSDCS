<?php
$codigo = $_GET['c'];

echo '<label class="grid_5">Tipo de Muestra:</label>               
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

?>