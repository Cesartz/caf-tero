// JavaScript Document
function creaAjax(){
	 var objetoAjax = false;
	 try {
	  /*Para navegadores distintos a internet explorer*/
	  objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
	  try {
			   /*Para explorer*/
			   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
			   }
			   catch (E) {
			   objetoAjax = false;
	  }
	 }	
	 if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
	  objetoAjax = new XMLHttpRequest();
	 }
	 return objetoAjax;
}

function peticion(url, aObjects, sCampo){
	var ajax = creaAjax();
	var divDestino = document.getElementById(sCampo);
	var valores = '';
	//Recorre los valores que se enviaran por POST		
	for(var i = 0;i < aObjects.length;i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	
	ajax.onreadystatechange = function(){
		if (ajax.readyState == 1){
			divDestino.innerHTML = '<br /><center><img src="loading.gif"><br /><br />Cargando, por favor espere... </center><br />';
		}
		
		if (ajax.readyState == 4){
			divDestino.innerHTML = ajax.responseText;
		} 
	}
	
	ajax.open ('POST', url, true);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(valores);
}

function peticion2(url, aObjects){
	var ajax = creaAjax();
	//var divDestino = document.getElementById(sCampo);
	var valores = '';
	//Recorre los valores que se enviaran por POST		
	for(var i = 0; i < aObjects.length; i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	
	/*ajax.onreadystatechange = function(){
		if (ajax.readyState == 1){
			divDestino.innerHTML = '<br /><center><img src="imgs/loading.gif"><br />Cargando, por favor espere... </center><br />';
		}
		
		if (ajax.readyState == 4){
			divDestino.innerHTML = ajax.responseText;
		} 
	}*/
	
	ajax.open ('POST', url, true);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(valores);
	/*var valores = '';
	var ajax = creaAjax();	
	//Recorre los valores que se enviaran por POST		
	for(var i=0;i < aObjects.length;i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		//Valida que no sea el último valor
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	//ajax.open ('POST', url, true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState==4){		
			if(ajax.status==404){
				alert("La direccion no existe");
			}
		}
	}
	
	ajax.open ('POST', url, true);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send(valores);*/
}

/*function peticion_(url, aObjects, aNames, nTipoLlenado){
	valores = '';
	var ajax = creaAjax();
	var divDestino = document.getElementById('divLoading');
	
	//Recorre los valores que se enviaran por POST		
	for(var i = 0; i < aObjects.length; i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		//Valida que no sea el último valor
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	
	ajax.open ('POST', url, true);
	
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4){
			if(ajax.status == 200){
				cargaDatosDeArray(ajax.responseText, aNames);
				document.getElementById('divLoading').innerHTML = '';
			}else if(ajax.status == 404){
				alert("La direccion no existe");
			}else{
				alert("Error: ".ajax.status);
			}
		}else{
			document.getElementById('divLoading').innerHTML = '<br /><center><img src="../css/images/loading.gif"><br>Buscando, por favor espere... </center><br />';
		}
	}
	
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send(valores);
}

function cargaDatosDeArray(AjaxRequest, aNames){	
	//Obtiene la respuesta del Request
	var str;
	var veces = 1;
	var response = AjaxRequest;
		
	//alert(response);
	//Valida si la respuesta es diferente de 0. La respuesta es asignada desde una consulta de base de datos la cual
	//devuelve una cadena separando los valores de los campos con el simbolo '|', la cadena es retornada al objeto 
	//XMLHttpRequest que hizo la petición a una página intermedia desde la cual se realiza la consulta.
		
	if(response.indexOf('|' != -1)) {
		
		update = response.split('|');
		//Recorre el arreglo con el nombre de los campos y les asigna los valores.
		for(var i = 0; i < aNames.length; i++){
			//Si el tipo de dato es numérico valida que el valor obtenido no contenga caracteres.					
			if(aNames[i][1] == "n"){
				if((update[i+1].match(/^\d+$/)) == null){														
					document.getElementById(aNames[i][0]).value = aNames[i][2];							
				}else if(update[i+1] != ""){							
					document.getElementById(aNames[i][0]).value = update[i+1];							
				}else{
					document.getElementById(aNames[i][0]).value = aNames[i][2];
				}
			 //Si el tipo de dato es una clave valida que no sea nulo en este caso asigna un valor default.
			}else if(aNames[i][1] == "c"){
				if(update[i+1] != ''){							
					document.getElementById(aNames[i][0]).value = update[i+1];
				}else{							
					document.getElementById(aNames[i][0]).value = aNames[i][2];							
				}
			}else if((aNames[i][1] == 'cb')){
				if(update[i+1] != ""){				
					if(veces == 1){
						str = update[i+1];
						veces = 2;
					}					
					if(str.indexOf(aNames[i][2]) != -1) {						
						document.getElementById(aNames[i][0]).checked = true;
					}else{						
						document.getElementById(aNames[i][0]).checked = false;
					}
				}
			//Si el tipo de dato es un string valida que no sea nulo en este caso asigna un valor default.
			}else if((aNames[i][1] == 'div')){						
				document.getElementById(aNames[i][0]).innerHTML = update[i+1];
							
			}else if((aNames[i][1] == 's')){
				if(update[i+1] != ""){
					document.getElementById(aNames[i][0]).value = update[i+1];														
				}else{
					document.getElementById(aNames[i][0]).value = aNames[i][2];							
				}							
			}										
		}
		//Si la respuesta es un cero se limpian los campos.
	}
}*/