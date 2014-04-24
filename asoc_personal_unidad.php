<?php
$codigo = $_GET['c'];

echo '<label class="grid_5">Personal:</label>               
      <select class="grid_6" name="personal" id="personal" onchange="unico(this);">
      <option>Seleccione...</option>';
       include('conexion/conexion.php');
				$sql="SELECT * FROM personal WHERE codunifisica='$codigo' AND (tipo='E' OR tipo='O' OR tipo='V') ORDER BY nombres";
				$seleccion=mysql_query($sql,$conexion);
				while ($row = mysql_fetch_array($seleccion)){
					$campo1=$row["apellidos"];
					$campo2=$row["nombres"];
					$campo3=$row["cedula"];
					$campo4=$row["tipo"];
					echo '<option class="formulario" title="'. $campo3 . " -- ". $campo4 .'" value="'. $campo3 .'">'. $campo2 . ' ' . $campo1 .'</option>';
					
				}
				
				
echo'</select>';
echo '<strong class="strong">*</strong>';

?>