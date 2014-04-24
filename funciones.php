<?php
// Funciones

function pie(){
	$pie = 'Ciudad Universitaria UCV, Los Chaguaramos, Caracas - República Bolivariana de Venezuela. Cod. 1041. Teléfonos (0058-0212) 219-1654 / 219-1622 RIF G-20000101-1';
	echo '<div class="grid_16 azul pie">'. $pie .'</div></div><div class="clear"></div>';
	
	}
function menu($atras,$siguiente){
	echo '<br />
	<div class="grid_16 fixed">
    	
        <ul class="grid_1 azul menu alpha omega">
            <li><a href="administrador.php" title="Menú Principal"><img style="margin:-7px 0px 0px 12px; padding: 8px 0px 0px 0px;" src="imagenes/principal.png" /></a>         
            
            </li>
        </ul>
        <ul class="grid_1 azul menu omega">
            <li><a style="font-size:30px;margin: -7px 0px -7px 10px;text-align:right; color:#FFFFFF;" href="'. $atras .'">&laquo;</a>
            </li>
        </ul>
    	<ul class=" grid_3 azul2 menu" onmouseover="'; echo "over('uno')";echo'" onmouseout="out';echo "('uno')";echo'">
            <li>Muestras
                <ul class="grid_3 alpha visibilidad2" id="uno">
                    <li><a href="formulario.php">&raquo; Agregar Muestra</a></li><br>
					<!--<li><a href="m_formulario.php">&raquo; Modificar</a></li>-->
					<li><a href="e_formulario.php">&raquo; Eliminar</a></li>
					<li><a href="c_formulario.php">&raquo; Consultar</a></li>
                </ul>
            </li>
        </ul>
        <ul class=" grid_3 azul2 menu" onmouseover="over';echo"('dos')";echo'" onmouseout="out';echo"('dos')";echo'">
            <li>Editar Formulario
                <ul class="grid_3 visibilidad2 alpha" id="dos">
					<li><a href="asociar_formulario.php">&raquo; Asociar Datos</a></li>
                    <li><a href="editar_formulario.php">&raquo; Editar</a></li>
					
                </ul>
            </li>
        </ul>
        <ul class=" grid_3 azul2 menu" onmouseover="over';echo"('tres')";echo'" onmouseout="out';echo"('tres')";echo'">
            <li>Creacion de Cuentas
                <ul class="grid_3 visibilidad2 alpha" id="tres">
                    <li><a href="a_usuario.php">&raquo; Agregar</a></li>
                   	<li><a href="#">&raquo; Modificar</a></li>
                    <li><a href="e_usuario.php">&raquo; Eliminar</a></li>
                    <li><a href="c_usuario.php">&raquo; Consultar</a></li>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="grid_3 azul2 menu" onmouseover="over';echo"('cuatro')";echo'" onmouseout="out';echo"('cuatro')";echo'">
            <li><a href="destruir.php?accion=destroy">&raquo; Cerrar Sesión</a>
            </li>
        </ul>
        <ul class="grid_1 azul menu omega">
            <li><a style="font-size:30px; margin: -7px 0px -7px 10px; color:#FFFFFF;text-align:right;" href="'. $siguiente .'">&raquo;</a>
            </li>
        </ul>
    	
    </div>
<div class="clear"></div>

<br />';

	
	}
	
function encabezado(){
	echo '<div class="grid_16 azul encabezado">Sistema para la Difusión de información a Centros de Salud</div>
<div class="clear"></div>';
	
	}
function consulta($var,$var2){
	echo '<div class="grid_16 alpha">
    <h2 class="grid_15 prefix_1 alpha">'. $var .':</h2><br><br>
    <p class="grid_15 prefix_1 alpha">'. $var2 .'</p>               
    </div><div class="clear"></div><br />';
	echo '<br>'; 
	
	}
?>