<?php session_start(); ?>

<?php
echo'<html><head>';
echo '<link rel="stylesheet" href="css/estilos.css"></head><body class="hoja">';

echo '<br><br><br>';
echo '<div class="grid_16 alpha center">';
// Variable Global:
	$accion=$_POST['accion'];

// Acceso al Sistema
if($accion == 'ingresar'){
	$usuario=$_POST['usuario'];
	$contrasenia=$_POST['contrasenia'];
	isset($usuario);
	isset($contrasenia);
	//minusculas
	$usuario = strtolower ($usuario);
	$contrasenia = strtoupper ($contrasenia);
	// encriptando la contraseña en md5
	$contrasenia = md5 ($contrasenia); 
	include ('conexion/conexion.php');
	//Validando Accesos para Administradores
	$sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
	$q=mysql_query($sql,$conexion);
	$cont=mysql_num_rows($q);
	if($cont>=1){
		
		while ($fila = mysql_fetch_array($q)){
		$usuario = $fila['usuario'];
		$privilegio = $fila['privilegio'];
		$nombre_usuario = $fila['nombre_usuario'];
			$_SESSION['usuario']= $usuario;
			$_SESSION['privilegio']= $privilegio;
			$_SESSION['nombre_usuario']= $nombre_usuario;
			echo '<html><head><meta http-equiv="REFRESH" content="0; url=administrador.php"></head></html>';
			/*?><script>alert("Espacio - Administraci\u00f3n");</script><?*/
	}
	}else{
	echo '<html><head><meta http-equiv="REFRESH" content="0; url=index.php"></head></html>';
		 /*?><script>alert("Datos No V\u00e1lidos");</script><?*/
	}
	exit();
}
/*
Acción: Modifica un campo de la tabla muestra.
Modulo: Editar formulario
Detalles: Si se modifica cualquier opción de los formularios que estan dentro de la opción (Editar), se actualizan el campo
correspondiente de todos los datos de la tabla muestra que utilizan dicha opción relacionada.
Tipo: Funcion()
*/
function update_muestra($accion_global,$variable,$campo_tabla,$id){
		echo $accion_global;echo "<br>";
		echo $variable;echo "<br>";
		echo $campo_tabla;echo "<br>";
		echo $id;echo "<br>";
			
			//$sql="UPDATE muestra SET $campo_tabla='$variable' WHERE $campo_tabla='$variable'";
			
		}
// Acciones para Editar el Formulario de Sintomas
function acciones($bd,$campo_muestra){
	$agregado=$_POST['agregado'];
	$accion_global=$_POST['accion_global'];
	$nuevo=$_POST['nuevo'];
	
		if($agregado=="Seleccione..."){
			echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';	
		}else{
			include ('conexion/conexion.php');
			if(($agregado=="n") && ($nuevo!="")){
				$sql = "INSERT INTO $bd ($bd) VALUE ('$nuevo')";
				$accion=mysql_query($sql,$conexion);
				echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
			}else {
				if($accion_global!=""){
					if($accion_global=='Seleccione...'){
						echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
						}
					if($accion_global=='UPDATE'){
						if($nuevo!=""){
							$sql="UPDATE $bd SET $bd='$nuevo' WHERE id='$agregado'";	
							$ingreso=mysql_query($sql,$conexion);
							update_muestra($accion_global,$nuevo,$campo_muestra,$agregado);
							//echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
						}else{
							echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
						}
					
					}
					if($accion_global=='DELETE'){
					$sql="DELETE FROM $bd WHERE id='$agregado'";
					$ingreso=mysql_query($sql,$conexion);
					echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
					}					
				}else{
					echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';
				}
			}
		}
	}
// Llamadas de la funcion acciones($bd);
if($accion == 'agregar_s'){acciones("sindrome","sindrome");exit();} // Agregar Sindrome
if($accion == 'agregar_dp'){acciones("diagnostico_presuntivo","diagnostico_presuntivo");exit();} // Agregar Diagnóstico Presuntivo
if($accion == 'agregar_t'){acciones("tipo_muestras","tipo");exit();} // Agregar Tipo de Muestra
if($accion == 'agregar_tt'){acciones("tiempo_toma_muestras","tiempo");exit();} // Agregar Tiempo para la Toma
if($accion == 'agregar_aa'){acciones("analisis_muestras","");exit();} // Agregar Análisis a Realizar
if($accion == 'agregar_cm'){acciones("conservacion_muestras","conservacion");exit();} // Agregar Conservación de la muestra
if($accion == 'agregar_tm'){acciones("transporte_muestras","transporte");exit();} // Agregar Transporte de la muestra

function asociar($bd_final){
	//Variables
	$maestro=$_POST['maestro'];
	$asociacion=$_POST['asociacion'];
	if(($maestro=="Seleccione...") || ($asociacion=="Seleccione...")){
	echo '<a class="azul2" href="editar_formulario.php">Volver al Formulario</a>';	
	}else{
		include ('conexion/conexion.php');
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
	}
	
}
// Llamadas de la funcion asociar($bd_final);
if($accion == 'asoc_dp_s'){asociar($accion);exit();} // Asociar Diagnóstico Presuntivo a Síndrome
if($accion == 'asoc_tm_dp'){asociar($accion);exit();} // Asociar Toma de Muestra a Diagnóstico Presuntivo

// Agregar una Muestra
if($accion == 'agregar_m'){
	
	$sindrome=$_POST['sindrome'];
	$diagnostico_presuntivo=$_POST['diagnostico_presuntivo'];
	$tipo=$_POST['tipo'];
	$tiempo=$_POST['tiempo'];
	$conservacion=$_POST['conservacion'];
	$transporte=$_POST['transporte'];
	$observaciones=$_POST['observaciones'];
	$user=$_POST['user'];
			
		function texto($tabla,$campo,$texto){
				include ('conexion/conexion.php');
				$sql = "SELECT * FROM $tabla WHERE id='$campo'";
				$seleccion=mysql_query($sql,$conexion);
				while ($fila = mysql_fetch_array($seleccion)){
					$campo_3 = $fila[$texto];
					return $campo_3;
				}
		}
		
		$sindrome = texto("sindrome",$sindrome,"sindrome");
		$diagnostico_presuntivo = texto("diagnostico_presuntivo",$diagnostico_presuntivo,"diagnostico_presuntivo");
		$tipo = texto("tipo_muestras",$tipo,"tipo_muestras");
		$tiempo = texto("tiempo_toma_muestras",$tiempo,"tiempo_toma_muestras");
		$conservacion = texto("conservacion_muestras",$conservacion,"conservacion_muestras");
		$transporte = texto("transporte_muestras",$transporte,"transporte_muestras");
	// Validando un dato similar en la tabla muestra, de los contrario no se almacenará
		include('conexion/conexion.php');
		$sql10 = "SELECT * FROM muestra WHERE sindrome='$sindrome' AND diagnostico_presuntivo='$diagnostico_presuntivo' AND tipo='$tipo' AND tiempo='$tiempo' AND conservacion='$conservacion' AND transporte='$transporte'";
		$q2=mysql_query($sql10,$conexion);
		$cont2=mysql_num_rows($q2);
		if($cont2>=1){
			echo '<a class="rojo" href="formulario.php">Muestra Existente en el Sistema - Ingrese otra información</a>';
		}else{
				
	
	
	$sql = "INSERT INTO muestra (sindrome, diagnostico_presuntivo, tipo, tiempo, conservacion, transporte, observaciones) VALUE ('$sindrome', '$diagnostico_presuntivo','$tipo','$tiempo','$conservacion','$transporte', '$observaciones')";
	$accion=mysql_query($sql,$conexion);
	// Verificando el id de la muestra ingresada
	$rs = mysql_query("SELECT MAX(id) AS id FROM muestra");
		if ($row = mysql_fetch_row($rs)) {
			$cod_muestra = trim($row[0]);
		}
	// Ingresando Analisis de Muestra(s)
	$sql = "SELECT * FROM tmp_analisis_muestras WHERE usuario='$user'";
	$q=mysql_query($sql,$conexion);
	while ($fila = mysql_fetch_array($q)){
			$analisis_muestras = $fila['analisis_muestras'];
			$sql = "INSERT INTO opc_analisis_muestras (cod_muestra , analisis_muestras) VALUE ('$cod_muestra', '$analisis_muestras')";
			$accion=mysql_query($sql,$conexion);
	}
/*			
echo "<pre>";
print_r($_POST);
echo "</pre>"; 
*/
echo '<a class="azul2" href="formulario.php">Volver al Formulario</a>';
		}
exit();
}
// Modificar Muestra

if($accion == 'modificar_m'){
/*			
echo "<pre>";
print_r($_POST);
echo "</pre>"; 
*/
	$sindrome=$_POST['sindrome'];
	$diagnostico_presuntivo=$_POST['diagnostico_presuntivo'];
	$cod_muestra=$_POST['cod_muestra'];
	$tipo=$_POST['tipo'];
	//echo $tipo;
	//echo "<br>";
	//echo $cod_muestra;
	/*
	
	
	$tiempo=$_POST['tiempo'];
	$conservacion=$_POST['conservacion'];
	$transporte=$_POST['transporte'];
	$observaciones=$_POST['observaciones'];
	$cod_muestra=$_POST['cod_muestra'];
	*/
	function texto2($tabla,$campo,$texto){
				include ('conexion/conexion.php');
				$sql = "SELECT * FROM $tabla WHERE id='$campo'";
				$seleccion=mysql_query($sql,$conexion);
				while ($fila = mysql_fetch_array($seleccion)){
					global $campo_3;
					$campo_3 = $fila[$texto];
					echo $tabla;
					return $campo_3;
				}
		}
	function compara($campo,$comparacion,$variable,$tabla){
				$camp = $tabla;
				
				echo $igual;
				include ('conexion/conexion.php');
				$sql = "SELECT * FROM muestra WHERE id='$campo'";
				$seleccion=mysql_query($sql,$conexion);
				while ($fila = mysql_fetch_array($seleccion)){
					$campo_4 = $fila[$comparacion];
					if($campo_4==$variable){
						
						return $variable; // Ej: 1 = 1 
									
						}else { // Ej: 1 != 20
						
							texto2($camp,$variable,$comparacion);
							}
					//return $campo_3;
				}
		}
	
	$sindrome = compara($cod_muestra,"sindrome",$sindrome,"sindrome");
	$sindrome = $campo_3;
	echo "<h1>";echo $sindrome;echo "</h1>";
	
	$diagnostico_presuntivo = compara($cod_muestra,"diagnostico_presuntivo",$diagnostico_presuntivo,"diagnostico_presuntivo");
	$diagnostico_presuntivo = $campo_3;
	echo "<h1>";echo $diagnostico_presuntivo;echo "</h1>";
	
	$tipo = compara($cod_muestra,"tipo",$tipo,"tipo_muestras");
	$tipo = $campo_3;
	echo "<h1>";echo $tipo;echo "</h1>";
	
	/*
	$sindrome=$_POST['sindrome'];
	$diagnostico_presuntivo=$_POST['diagnostico_presuntivo'];
	$tipo=$_POST['tipo'];
	$tiempo=$_POST['tiempo'];
	$conservacion=$_POST['conservacion'];
	$transporte=$_POST['transporte'];
	$observaciones=$_POST['observaciones'];
	$cod_muestra=$_POST['cod_muestra'];
	*/
	
	/*
	$clave=$_POST['clave']; // id
	$sindrome=$_POST['sindrome'];
	$tipo=$_POST['tipo'];
	$tiempo=$_POST['tiempo'];
	$cantidad_minima=$_POST['cantidad_minima'];
	$analisis=$_POST['analisis'];
	$conservacion=$_POST['conservacion'];
	$transporte=$_POST['transporte'];
	$observaciones=$_POST['observaciones'];
	$text=$_POST['text']; // Array
	$contador_text = count($text);
	$contador_text = $contador_text -1;
	
	
	
	include ('conexion/conexion.php');
	
	// Actualizando Datos de la Muestra con el id = $clave
	$sql="UPDATE muestra SET sindrome='$sindrome', tipo='$tipo', tiempo='$tiempo', cantidad_minima='$cantidad_minima', analisis='$analisis', conservacion='$conservacion', transporte='$transporte', observaciones='$observaciones'  WHERE id='$clave'";
	$ingreso=mysql_query($sql,$conexion);
	
	// Eliminando Información de interés de la Muestra con el cod_muestra = $clave
	$sql="DELETE FROM opc_muestra WHERE cod_muestra='$clave'";
	$ingreso=mysql_query($sql,$conexion);
	// Ingresando Nueva información de interes de la Muestra con el cod_muestra = $clave
			if ($contador_text!="")	{		
			for ($i=0;$i<=$contador_text;$i++) {
				$sql = "INSERT INTO opc_muestra (cod_muestra , info_interes) VALUE ('$clave', '$text[$i]')";
				$accion=mysql_query($sql,$conexion);
							
    			}
			}
			echo '<a class="azul2" href="m_formulario.php">Volver al Formulario</a>';
	
*/
exit();
}
// ELiminar una Muestra
if($accion=="eliminar_m"){
	$cod_muestra=$_POST['muestra'];
	include ('conexion/conexion.php');
	
	
	$sql="DELETE FROM muestra WHERE id='$cod_muestra'";
	$accion=mysql_query($sql,$conexion);
	
	$sql="DELETE FROM opc_analisis_muestras WHERE cod_muestra='$cod_muestra'";
	$accion=mysql_query($sql,$conexion);
	mysql_close($conexion);
	echo '<a class="amarillo" href="e_formulario.php" style="color:#000000;">Dato Eliminado Exitosamente &raquo;</a>';
exit();
}

// Agregar un Usuario
if($accion == 'a_usuario'){
	
	$cod_unidad=$_POST['unidad'];
	$cedula=$_POST['personal'];
	$contrasenia = $cedula;
		$contrasenia = md5 ($contrasenia); // encriptando la contraseña en md5
	$usuario=$_POST['usuario'];
	$usuario = strtolower ($usuario);
	
	include('conexion/conexion.php');
	$sql="SELECT * FROM personal WHERE cedula='$cedula'";
	$seleccion=mysql_query($sql,$conexion);
	while ($row = mysql_fetch_array($seleccion)){
			$campo5=$row["apellidos"];
			$campo6=$row["nombres"];
		}
	$nombre_usuario= ($campo6) . ' ' . ($campo5);
	// Validando un dato similar en la tabla usuario, de los contrario no se almacenará
		
		$sql = "SELECT * FROM usuario WHERE usuario='$usuario'";
		$q=mysql_query($sql,$conexion);
		$cont=mysql_num_rows($q);
		if($cont>=1){
			echo '<a class="rojo" href="a_usuario.php">Usuario Existente en el Sistema - Ingrese otros Datos</a>';
		}else{
				
	
	
	$sql = "INSERT INTO usuario (usuario,  contrasenia , nombre_usuario, cedula, cod_unidad, privilegio) VALUE ('$usuario', '$contrasenia','$nombre_usuario','$cedula','$cod_unidad','0')";
	$accion=mysql_query($sql,$conexion);
	echo '<a class="azul2" href="a_usuario.php">Datos Almacenado Exitosamente - Volver &raquo;</a>';
		}
exit();	
}
// ELiminar un Usuario
if($accion=="e_usuario"){
	$cedula=$_POST['codigo'];
	include ('conexion/conexion.php');
	
	
	$sql="DELETE FROM usuario WHERE cedula='$cedula'";
	$accion=mysql_query($sql,$conexion);
	mysql_close($conexion);
	echo '<a class="amarillo" href="e_usuario.php" style="color:#000000;">Usuario Eliminado Exitosamente &raquo;</a>';
exit();
}



echo '</div></body></html>';

?>