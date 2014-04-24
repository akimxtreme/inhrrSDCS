
function unico(elemento){
var variable = elemento.value;
/////////////////////////////////////////////////////////////////////////////////////////////
	
					if (elemento.value=="" || elemento.value=="Seleccione...") { 
					elemento.style.background="#FFF000";elemento.style.color="#000000";
					valida = false; //break;
					}else{elemento.style.background="white";elemento.style.color="#000000";}
				
/////////////////////////////////////////////////////////////////////////////////////////////

}

function controles(obj){
var valida = true;
/////////////////////////////////////////////////////////////////////////////////////////////
	function validar(tag){
			fi = document.getElementById('formulario').getElementsByTagName(tag); 
			for ( i=0; i<fi.length; i++){ 
				control = fi[i]; 
				if (control){ 
					if (control.value=="Seleccione...") { 
					control.style.background="#FFF000";control.style.color="#000000";
					valida = false; //break;
					}else{control.style.background="white";control.style.color="#000000";}
				}
		
			}
	}
/////////////////////////////////////////////////////////////////////////////////////////////
validar('input');
validar('select');
//validar('textarea');
return valida;
}

/////////////////////////////////////////////////////////////////////////////////////////////
function over(subm){
var submenu = document.getElementById(subm);
	submenu.style.visibility="visible";
	submenu.style.position="static";
}
function out(subm){
var submenu = document.getElementById(subm);
	submenu.style.visibility="hidden";
	submenu.style.position="fixed";
}
/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////
function eliminar(elemento){
var value;
value = elemento.value;
document.getElementById('eliminar').value=value;

}

/////////////////////////////////////////////////////////////////////////////////////////////

