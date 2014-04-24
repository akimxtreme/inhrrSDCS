<?php
$codigo = $_GET['c'];

echo '<label class="grid_5">Diagnóstico Presuntivo:</label>               
      <select class="grid_6" name="diagnostico_presuntivo" id="diagnostico_presuntivo" onchange="showselect_2(this.value); unico(this);">
      <option>Seleccione...</option>';
       include('conexion/conexion.php');
				$sql="SELECT * FROM asoc_dp_s WHERE cod_maestro='$codigo'";
				$seleccion=mysql_query($sql,$conexion);
				while ($row = mysql_fetch_array($seleccion)){
				$campo1=$row["cod_asociado"];
					
					$sql="SELECT * FROM diagnostico_presuntivo WHERE id='$campo1'";
					$seleccion2=mysql_query($sql,$conexion);
					while ($row2 = mysql_fetch_array($seleccion2)){
					$campo2=$row2["diagnostico_presuntivo"];
					echo '<option class="formulario" value="'. $campo1 .'" title="'. $campo2.'">'. $campo2.'</option>';
					}
				
				}
echo'</select>';
echo '<strong class="strong">*</strong>';

?>