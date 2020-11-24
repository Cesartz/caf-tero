// JavaScript Document

$(function() {				   
	$.fn.delay = function(time, callback){
		jQuery.fx.step.delay = function(){};
		return this.animate({delay:1}, time, callback);
	}
});	
		
function setSelectionRange(input, selectionStart, selectionEnd) { //funciones que permiten mover la seleccion del instant
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  }
  else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}
function setCaretToPos (input, pos) {
  setSelectionRange(input, pos, pos);
}

var pasa,pasaaux,pasasyn; //para validar el string ingresado contra el diccionario
var nconta;  //contador de resultados
var $totalelementos=0;
var cadena;		//lo que se pegara en la caja hidden

//agrega/quita boton de busqueda
function agregarboton(totalelementos){
	if(totalelementos<=0){
		$("#button").html("");
	}
	else{
		$("#button").html("<a href='output.html?"+$("#cadena").val()+"'>Search with this criteria &#187;</a>");
	}
}

//funcion quitar globito
function quitar(elemento) {		//quitar globito
	$totalelementos=$totalelementos-1;
	$(elemento).remove();		//elimina el tag del search
	$("#busqueda").focus();
	if($totalelementos<=0){
		//$("#busqueda").css({"width":"200px"});
		$('.finder .texto').attr("placeholder","Give me a product specification");
		$totalelementos=0;
		$('.finder .texto').css({"width":"100%"});
	}
	cadena="";	//eliminar cadena de input hidden
	$tags=$("#resultados span"); //todos los globitos
	$("#viewer ul").html("");//limpiamos lista
	$tags.each(function(index){
		$elemento=$(this).attr("id");
		chain=$elemento.split(":");
		if (cadena==""){
			cadena=chain[0]+":"+chain[1];
		}
		else{
			cadena=cadena+"|"+chain[0]+":"+chain[1];
		}
		
		lista(chain[2]+":",chain[1]);
	});
	$("#cadena").attr("value",cadena);		//asignacion a cadena con cadena
	ajuste();
	agregarboton($totalelementos);
}

//funcion buscar atributo
function buscaratributo(atributo){
	$dominio=false;
	$elemento="";
	$tags=$("#resultados span");
	$tags.each(function(index){
		$elemento=$(this).attr("id");
		chain=$elemento.split(":");
		if (chain[0]==atributo){
			$dominio=true;
		}
	});
	return $dominio;
}

/*funcion gus*/
function webservice(){ 
	//strQuery=$('#cadena').val();
	strQuery="API";
	$( "#viewer p" ).html("");
	
	/*
	$.ajax({
		type: 'GET',
		url: 'http://tamp00031679:8080/RestHelloWorld/resources/queryDetail?text=API&jsoncallback=?',
		async: false,
		jsonpCallback: 'jsonCallback',
		contentType: "application/json",
		dataType: 'jsonp',
		success: function(data)
		{
			//$('#viewer p').html(JSON.stringify(data));
			console.log(data);
		},
		error: function(e)
		{
		   alert(e.message);
		}
	});
	*/
	/*
	$.getJSON("http://tamp00031679:8080/RestHelloWorld/resources/queryDetail?text=API&jsoncallback=?",
	{
	  tags: "jquery,javascript",
	  tagmode: "any",
	  format: "json"
	},
	function(data) {
		alert("si");
	  $.each(data.items, function(i,item){
		//$("< img/>").attr("src", item.media.m).appendTo("#flickrapi-results");
		//if ( i == 10 ) return false;
	  });
	});
	*/
}
	
//funcion impresion lista de valores seleccionados
function lista(alias,valor){ //funcion para imprimir en la lista
	//webservice();
	$("#viewer ul").stop().append("<li><span>"+alias+" <b>"+valor+"</b></span></li>");
}

//funcion cancelar busqueda
function nobuscar(){  //funcion que se ejecuta cuando el usuario cancela la acción de búsqueda, limpia busqueda
	$("#cancelar").css({"display":"none"});
	$("#mini").animate({"margin-top":"0px"},500);
	$(".display").hide();						
	$("#busqueda").val('');
	$("#cadena").attr("value","");	
	$("#viewer ul").html("");
	$("span.tag").remove();
	$('.finder .texto').attr("placeholder","Give me a product specification");
	$('.finder .texto').css({"width":"100%"});
	ajuste();
	agregarboton(0);
}

//funcion redimension caja de busqueda
function ajuste(){
	$("#buscador").css({"height":$("#resultados").height()});
}
//funcion window resize
$(window).resize(function() {
  ajuste();
});

//para redimensionar la caja de busqueda
function redimension(total){
	if(total==0){
		//le dejamos el tamaño default
	}
	else{
		//la crecemos en base a la cantidad de caracteres
		$("#busqueda").css({"width":(total*10)+"px","max-width":$("#resultados").width()-15});
		ajuste();
	}
}

var cmatch=0;
var cadenano="";
var novalida="";
var counter=0;
//funcion busqueda pegada
function especial(searcher,data){
	$.each(data, function(j,item){
		for (i=searcher.length;i>=1;i--){
			cadenarecortada=searcher.substring(0,i);
			for(var val in item.values){
				if(item.values[val].toUpperCase()==cadenarecortada.toUpperCase()){
					buscaratributo(item.name);		//ver si ya tenemos un elemento con ese dominio
					if($dominio==false){		//si no encontro el elemento quiere decir que podemos buscar de ese dominio
						cmatch=cmatch+1;
						searcher=searcher.substring(i+1,searcher.length);
						var $clave=item.name+":";
						var $alias=item.alias;
						var $texto=item.values[val];
						$("#busqueda").stop().before("<span class='tag' id='"+$clave+$texto+":"+$alias+"' onclick='javascript:quitar(this);'>"+$texto+"<i>x</i></span>");
						$("#busqueda").css({"width":"100px"});
						$("#busqueda").val(searcher);
						$("#busqueda").focus();
						$totalelementos=$totalelementos+1;	//ponemos valores en la caja
						if ($totalelementos<=1) {
							$("#cadena").attr("value",$clave+$texto);
						}
						else{		
							$("#cadena").attr("value",$("#cadena").val()+"|"+$clave+$texto);
						}
						lista($alias,$texto); //lo ponemos en la lista   
						$('.finder .texto').attr("placeholder","");	//limpiamos el texto de la caja de texto
						ajuste();					
						especial(searcher,data);
						return false;
					}
				}
			}
		}
	});
	//cadena no valida
	if(searcher.length>0){
		novalida=searcher.substring(0,1);
		cadenano=cadenano+novalida;
		searcher=searcher.substring(1,searcher.length);
		especial(searcher,data);
		return;
	}
	else{
		if(searcher.length==0){
			counter=counter+1;
			//alert(counter);
			if (counter==1) {
				$('#busqueda').val(cadenano);
				return;
			}
		}
	}
}

function sortByKey(array, key) { //funcion ordenar
    return array.sort(function(a, b) {
		//alert("no");
		var x = a[key];		
		var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}
	
	
$(window).load(function() {	//window load
	
	var data;
	$.getJSON( "dictionary.json",function (json){
		data=sortByKey(json,'priority'); //ordenamos
	});
	
	//función pegado
	$("#busqueda").bind('paste', function() {
		var cmatch=0;
		var cadenarecortada="";
		setTimeout(function () {
			var searcher = $('#busqueda').val();
			$(".display").html("");		//limpiamos resultados antiguos
			especial(searcher,data); //funcion cadena y datos de busqueda
			agregarboton($totalelementos); //agregamos boton de output
			searcher = $('#busqueda').val(); //variable searcher tiene ahora el valor de la cadena no valida
			redimension(searcher.length); //redimensionamos en base a la cadena no valida
			ajuste();
			cadenano="";
			counter=0;
		}, 100);
	});
	
	$('#busqueda').focus(function(){		//dimons click en caja de busqueda					
		$("#mini").animate({"margin-top":"-160px"},500);
		$("#cancelar").css({"display":"inline"});
		$("span.tag").removeClass("selected");
	}).blur(function() { //cuando se quita el foco de la caja de texto
		$("#resultados span.selected").removeClass("selected");
	});					
	$("#cancelar").click(function(){ //ya no buscamos, boton cancelar
		nobuscar();
	});
	$("#buscador").submit(function(){
		return false;
	});
		
	$('#resultados').click(function(){		//dimons click en caja de busqueda				
		$("#busqueda").focus();
	});
	
	$(".finder .texto").keydown(function(evento)   //cuando tecleas letra borrar
	{
		var searchbox = $(this).val();
		if(searchbox==''){
			if(evento.keyCode==8){
					quitar($("#resultados span:last-of-type"));
			}
			if(evento.keyCode==46){
					quitar($("#resultados span.selected"));
			}
		}
	});
	
	$(".finder .texto").keyup(function(evento)    //cuando tecleas cualquier letra menos borrar
	{	
		var searchbox = $(this).val();		//searchbox obtiene el valor de la caja de búsqueda
		if(searchbox==''){
			$(".display").hide();
			if((evento.keyCode==37)||(evento.keyCode==39)){		//si con teclas left,right				
				if(evento.keyCode==37){
					if($("#resultados span").hasClass("selected")){
						$anterior = $("#resultados span.selected").prev();
					}
					else{
						$anterior = $("#resultados span:last-of-type");
					}
					$("#resultados span.selected").removeClass("selected");
					if($anterior.length){					
						$anterior.addClass("selected");	
					}
					else{
						$("#resultados span:first-of-type").addClass("selected");	
					}
				}
				if(evento.keyCode==39){	
					if($("#resultados span").hasClass("selected")){
						$siguiente = $("#resultados span.selected").next();
					}
					
					$("#resultados span.selected").removeClass("selected");
					if($siguiente.length){					
						$siguiente.addClass("selected");	
					}
				}
			}
		}
		else{
			if((evento.keyCode==38)||(evento.keyCode==40)||(evento.keyCode==13)){		//si con teclas up,down,enter o backspace				
				if(evento.keyCode==38){		//evento tecla up
					var tama=$(".finder .texto").val().length;				
					setCaretToPos(document.getElementById("busqueda"), tama);
					var $anterior = $(".display div.selected").prev();				
					$(".display div.selected").removeClass("selected");
					if($anterior.length){					
						$anterior.addClass("selected");	
					}
					else{
						$(".display div:last-child").addClass("selected");
					}
				}
				if(evento.keyCode==40){		//evento tecla down		
					var $siguiente = $(".display div.selected").next();
					$(".display div.selected").removeClass("selected");
					if($siguiente.length){					
						$siguiente.addClass("selected");
					}
					else{
						$(".display div:first-child").addClass("selected");
					}
				}
				if(evento.keyCode==13){		//evento tecla enter
					$('.display_box.selected').click();
				}
			}
			else{		//si son teclas de texto
				$("#resultados span.selected").removeClass("selected");
				//$.getJSON( "dictionary.json",  function( data ) { 
					$(".display").html("");		//limpiamos resultados antiguos
					nconta=0;
					aux=0;
					$.each(data, function(i,item){ 		//llenamos la caja de resultados
						buscaratributo(item.name);		//ver si ya tenemos un elemento con ese dominio	
						//alert(item[values]);
						if($dominio==false){		//si no encontro el elemento quiere decir que podemos buscar de ese dominio
							for(var val in item.values){		//por cada tipo de elemento, sacamos sus items	
								//alert(item.values[val]);
								pasa=item.values[val].search(new RegExp(searchbox, "i"));		//funcion que nos indica si encuentra lo que se esta escribiendo dentro del valor del item (case insensitive)														
								pasaaux=item.alias.search(new RegExp(searchbox, "i"));
								pasasyn=item.synonym.search(new RegExp(searchbox, "i"));
								if (((pasa>-1)||(pasaaux>-1)||(pasasyn>-1))&&(nconta<6)){		//si lo encontro y el total de resultados es menor a 6
									$("<div/>").attr("id", i).attr("class","display_box").html("<span id='"+item.name+"'>"+item.alias+":</span><p>"+item.values[val]+"</p>").appendTo(".display");
									nconta=nconta+1;
									aux=aux+1;
								}
							}
						}
					});
					
					$('.display_box').stop().click(function() {		//definicion evento click en una sugerencia
						var $clave=$(this).find("span").attr("id");
						var $alias=$(this).find("span").html();
						var $texto=$(this).find("p").html();
						$("#busqueda").stop().before("<span class='tag' id='"+$clave+":"+$texto+":"+$alias+"' onclick='javascript:quitar(this);'>"+$texto+"<i>x</i></span>");
						$("#busqueda").css({"width":"100px"});
						$("#busqueda").val('');
						$("#busqueda").focus();
						$(".display").hide();
						$totalelementos=$totalelementos+1;	//ponemos valores en la caja
						if ($totalelementos==1) {
							$("#cadena").attr("value",$clave+":"+$texto);
						}
						else{		
							//alert("pasele");
							$("#cadena").attr("value",$("#cadena").val()+"|"+$clave+":"+$texto);
						}
						lista($alias,$texto); //lo ponemos en la lista   
						$('.finder .texto').attr("placeholder","");		//limpiamos el texto de la caja de texto
						ajuste();
						agregarboton($totalelementos);
					});
					
					if((aux==1)&&($(".display_box").find("p").text().toUpperCase()==searchbox.toUpperCase())){
						$('.display_box').click();
						$('.display').html("").hide();
					}
										
					if (aux>0){
						$(".display").show();		//mostramos los resultados
						$(".display div:first-child").addClass("selected");		//al primer resultado le damos clase seleccionada
					}
					
					$('.display_box').hover(function() {	  //definicion evento pasamos el mouse por una sugerencia
						$('.display_box').removeClass("selected");
							$(this).addClass("selected");
						},function(){
							$(this).removeClass("selected");
						$('.display_box:first-child').addClass("selected");
					}).blur();
				//});
			}				  
		}
	});
	
});

