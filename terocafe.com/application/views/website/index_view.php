<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tero</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tero Café de Paso Mexicano" />
        <meta name="keywords" content="tero, café, mexico, mexicano, cafe de paso" />	
                
        <!-- Animate.css -->
        <link rel="stylesheet" href="<?PHP echo base_url('assets/css/animate.css') ?>">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="<?PHP echo base_url('assets/css/bootstrap.css') ?>">
        <!-- Flexslider -->
        <link rel="stylesheet" href="<?PHP echo base_url('assets/css/flexslider.css') ?>">
        <!-- Theme style  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="<?PHP echo base_url('assets/css/style.css') ?>">
        <!-- Modernizr JS -->
        <script src="<?PHP echo base_url('assets/js/modernizr-2.6.2.min.js') ?>"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="<?PHP echo base_url('assets/js/respond.min.js') ?>"></script>
        <![endif]-->
    	<style type="text/css">
        	.table>tbody>tr>td.text-left{ padding-left:20px!important}
			@media screen and (max-width: 480px){
			.table>tbody>tr>td.text-left{ font-size:12px; padding-left:0px!important; padding-right:0px!important}
			.table>tbody>tr>td.text-right{ font-size:12px}
			}
        </style>
    </head>
    
	<body>	
        <div class="tero-loader"></div>

        <div id="page">
        <nav class="tero-nav" role="navigation">
            <div class="tero-container">
                <div class="row">                        	                                                                
                    <div class="col-sm-2 col-xs-12 logo-nav">
                        <div id="tero-logo"><a href="#" data-nav-section="home"><img src="<?PHP echo base_url('assets/images/logo.jpg') ?>"></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1 main-nav">                                
                        <ul class="main-ul">
                            <li><a href="#" data-nav-section="nosotros">Nosotros</a></li>		
                            <li><a href="#" data-nav-section="menu">Menú</a></li>	
                            <li><a href="#" data-nav-section="sucursales">Sucursales</a></li>										                            
                            <li><a href="#" data-nav-section="terograms">Terograms</a></li>      
                            <li><a href="#" data-nav-section="contact-us">Contacto</a></li> 
                        </ul>                    
                    </div>
                </div>        
            </div>
        </nav>

        <div id="tero-hero" data-section="home">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image:url('<?PHP echo base_url('assets/images/bgslider.jpg') ?>')">
                        <div class="tero-container">
                        	<img src="<?PHP echo base_url('assets/images/logo-emblema.png') ?>" class="animate-box" data-animate-effect="fadeInDown">                                                
                        </div>                            
                    </li>                                                            
                </ul>
            </div>
        </div>
    
        <div class="tero-section-overflow">
                <div class="tero-section" id="story" data-section="nosotros">
                	<div class="tero-container">
                    	<div class="row">
                        	<div class="col-md-12 col-sm-12 col-xs-12 animate-box text-center" data-animate-effect="fadeInUp">
                            	<h1>Nuestro café</h1>
                                <p>Café de mundo,<br>alma de barrio</p>
                            </div>
                            <div class="col-md-6 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
                            	<span>Somos de aquí: Café de Barrio, Café de
                  Especialidad y Café de Paso, 100%
                            Mexicano. Utilizamos granos seleccionados
cuidadosamente en conjunto con algunos de
los mejores tostadores de la ciudad para
llevar a tu taza el mejor café.</span>
                            </div>
                            <div class="col-md-6 col-sm-12 animate-box text-center rotatecontainer" data-animate-effect="fadeInRight">
                            	<rotate class="img-rotate1 animate-box" data-animate-effect="flipInY" style="background:url('<?PHP echo base_url('assets/images/icon-smiley.png') ?>')"></rotate>
                            </div>
                		</div>
                        <div class="row secondrow">                        	
                        	<div class="col-md-3 col-sm-12 col-xs-12 animate-box cafedelmundo" data-animate-effect="fadeInUp">
                            	<h2>Café del mundo para el barrio</h2>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12 animate-box" data-animate-effect="fadeInUp">                            	                          
                                <span><b>Tostado</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</span>
                                <small style="background-image:url(<?PHP echo base_url('assets/images/bg1.jpg') ?>)"></small>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12 animate-box" data-animate-effect="fadeInUp">                         	
                                <span><b>Baristas</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</span>
                                <small style="background-image:url(<?PHP echo base_url('assets/images/bg2.jpg') ?>)"></small>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12 animate-box" data-animate-effect="fadeInUp">
                                <span><b>Café de altura</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</span>
                                <small style="background-image:url(<?PHP echo base_url('assets/images/bg3.jpg') ?>)"></small>
                            </div>
                		</div>
                	</div>
                </div>
                
                <div class="tero-section testimonials" id="nosotros" data-section="menu">
                    <div class="tero-container">
                        <img src="<?PHP echo base_url('assets/images/icon-depaso.png') ?>" class="depaso animate-box" data-animate-effect="fadeInUp">
                    	<img src="<?PHP echo base_url('assets/images/icon-tetera.png') ?>" class="tetera  float1" >
                        <img src="<?PHP echo base_url('assets/images/icon-mundo.png') ?>" class="mundo float1" >
                        <img src="<?PHP echo base_url('assets/images/icon-estas.png') ?>" class="estas animate-box" data-animate-effect="fadeInUp">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 animate-box text-center" data-animate-effect="fadeInUp">
                                <h1>Menú</h1>
                                <p>Tenemos barrio y<br>buen café</p>
                                <a href="#bebidas" class="eleccion selected">Bebidas</a><a href="#alimentos" class="eleccion">Alimentos</a>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12 animate-box text-center col-sm-offset-1" data-animate-effect="fadeInUp">
                            	<div id="bebidas" class="contenido">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Café</th>
                                                <th class="text-right">C.</th>
                                                <th class="text-right">M.</th>
                                                <th class="text-right">G.</th>
                                            </tr>
                                        </thead>

                                        <?PHP
                                            if(isset($listadoproductos)){
                                                if(count($listadoproductos) > 0){
                                                    echo '	<tbody>';
                                                    foreach($listadoproductos as $i => $ls):
                                                        if($ls->CLASIFICACION == 1){
                                                            if($ls->CATEGORIA == 1){
                                                                echo '  <tr>
                                                                            <td class="text-left">'.$ls->TITULO.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_C.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_M.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_G.'</td>
                                                                        </tr>';
                                                            }
                                                        }
                                                    endforeach;
                                                    echo '  </tbody>';
                                                }
                                            }
                                        ?>

                                        <!--<tbody>
                                            <tr>
                                                <td class="text-left">Americano</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Latte</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Capuccino</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Espresso</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                        </tbody>-->
                                    </table>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Té</th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                            </tr>
                                        </thead>

                                        <?PHP
                                            if(isset($listadoproductos)){
                                                if(count($listadoproductos) > 0){
                                                    echo '	<tbody>';
                                                    foreach($listadoproductos as $i => $ls):
                                                        if($ls->CLASIFICACION == 1){
                                                            if($ls->CATEGORIA == 2){
                                                                echo '  <tr>
                                                                            <td class="text-left">'.$ls->TITULO.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_C.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_M.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_G.'</td>
                                                                        </tr>';
                                                            }
                                                        }
                                                    endforeach;
                                                    echo '  </tbody>';
                                                }
                                            }
                                        ?>
                                        <!--<tbody>
                                            <tr>
                                                <td class="text-left">Manzanilla</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Té Verde</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">45</td>
                                            </tr>                                        
                                        </tbody>-->
                                    </table>
                                	<strong>Todas las bebidas en frío +$5</strong>
                            	</div>
                                
                                <div id="alimentos" class="contenido">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Desayuno</th>
                                                <th class="text-right">G.</th>
                                            </tr>
                                        </thead>
                                        <?PHP
                                            if(isset($listadoproductos)){
                                                if(count($listadoproductos) > 0){
                                                    echo '	<tbody>';
                                                    foreach($listadoproductos as $i => $ls):
                                                        if($ls->CLASIFICACION == 2){
                                                            if($ls->CATEGORIA == 3){
                                                                echo '  <tr>
                                                                            <td class="text-left">'.$ls->TITULO.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_C.'</td>
                                                                        </tr>';
                                                            }
                                                        }
                                                    endforeach;
                                                    echo '  </tbody>';
                                                }
                                            }
                                        ?>
                                        <!--<tbody>
                                            <tr>
                                                <td class="text-left">Sandwich</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Cuernito</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Pambazo</td>
                                                <td class="text-right">18</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Otro</td>
                                                <td class="text-right">27</td>
                                            </tr>
                                        </tbody>-->
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Comida</th>
                                                <th class="text-right"></th>
                                            </tr>
                                        </thead>
                                        <?PHP
                                            if(isset($listadoproductos)){
                                                if(count($listadoproductos) > 0){
                                                    echo '	<tbody>';
                                                    foreach($listadoproductos as $i => $ls):
                                                        if($ls->CLASIFICACION == 2){
                                                            if($ls->CATEGORIA == 4){
                                                                echo '  <tr>
                                                                            <td class="text-left">'.$ls->TITULO.'</td>
                                                                            <td class="text-right">$'.$ls->PRECIO_C.'</td>
                                                                        </tr>';
                                                            }
                                                        }
                                                    endforeach;
                                                    echo '  </tbody>';
                                                }
                                            }
                                        ?>
                                        <!--<tbody>
                                            <tr>
                                                <td class="text-left">Bisteck</td>
                                                <td class="text-right">45</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Tacos de pastor</td>
                                                <td class="text-right">45</td>
                                            </tr>                                        
                                        </tbody>-->
                                    </table>
                            	</div>      
                            </div>
                        </div>
                    </div>   
                </div>
                
                <div class="pleca">
                	<div class="marqueecontainersub"><div class="marquee"><!--<span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span><span>pásale vecino·</span>--></div></div>
                </div>

                <div class="tero-section" data-section="sucursales" id="sucursales">    
                    <div class="tero-container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 animate-box text-center" data-animate-effect="fadeInUp">
                                <div class="fleft">
                                	<h1>Sucursales</h1>
                                	<p>Calle arriba,<br>calle abajo</p>  
                            	</div>
                                <div class="fleft">
                                	<div id="map"></div> 
                                </div>
                            </div>     
                            <div class="col-md-12 col-sm-12 col-xs-12 animate-box text-left formcontainer" data-animate-effect="fadeInUp">
                                <div class="col-md-6 col-sm-12 whitey">
                                	<div class="col-md-6 col-sm-6 whiteyleft">
                                    	<img src="<?PHP echo base_url('assets/images/icon-paloma.png') ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 whiteyright">
                                    	<h4>Sucursal Juarez</h4>
                                        <h5>Liverpool 165<br>Colonia Juárez<br><br>Del. Cuauhtémoc<br>Lunes - Domingo.<br><br>7:30am -7:00pm</h5>
                                    </div>
                                </div>
                                
                                <!--<div class="col-md-6 col-sm-12 whitey">
                                	<div class="col-md-6 col-sm-6 whiteyleft">
                                    	<img src="<?PHP echo base_url('assets/images/icon-manos.png') ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 whiteyright">
                                    	<h4>Condesa</h4>
                                        <h5>Alfonso Reyes 232 E<br>Condesa<br><br>Lunes - Sábado<br>7:30 a.m. - 8:30 p.m.<br><br>Domingo<br>9:00 a.m. - 6:30 p.m.</h5>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 whitey">
                                	<div class="col-md-6 col-sm-6 whiteyleft">
                                    	<img src="<?PHP echo base_url('assets/images/icon-car.png') ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 whiteyright">
                                    	<h4>Condesa</h4>
                                        <h5>Alfonso Reyes 232 E<br>Condesa<br><br>Lunes - Sábado<br>7:30 a.m. - 8:30 p.m.<br><br>Domingo<br>9:00 a.m. - 6:30 p.m.</h5>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 whitey">
                                	<div class="col-md-6 col-sm-6 whiteyleft">
                                    	<img src="<?PHP echo base_url('assets/images/icon-tacones.png') ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-6 whiteyright">
                                    	<h4>Condesa</h4>
                                        <h5>Alfonso Reyes 232 E<br>Condesa<br><br>Lunes - Sábado<br>7:30 a.m. - 8:30 p.m.<br><br>Domingo<br>9:00 a.m. - 6:30 p.m.</h5>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
               </div>
               
               <div class="tero-section" data-section="terograms" id="terograms">
                        <div class="row">
                        	
                            <div class="col-md-12 col-sm-12 col-xs-12 animate-box text-center" data-animate-effect="fadeInUp">
                                <div class="fleft">                                	
                                	<p>Terograms</p>  
                            	</div>
                            </div>     
                            <div class="col-md-12 col-sm-12 col-xs-12 animate-box text-center" data-animate-effect="fadeInUp">
                            	<ul id="instafeed"></ul>
                                <a href="#" class="siguenos">Síguenos</a>
                            </div>
                        </div>
               </div>
               
               <div class="tero-section" data-section="contact-us" id="contact-us">    
                    <div class="tero-container">
                        <div class="row">
                        	
                            <div class="col-md-6 col-sm-6 col-xs-12 animate-box text-left" data-animate-effect="fadeInUp">
                                <div class="fleft">
                                	<h1>Háblanos</h1>
                                	<p>Tenemos barrio y<br>buen café</p>  
                            	</div>
                                <div class="fleft helicoptercontainer">
                                	<h3>Contacto</h3>
                                    <span>Tonalá 92 Col. Roma, CDMX<br>
									T. 55 8210 1822<br>
									<a href="mailto:info@terocafe.com">info@terocafe.com</a></span>
                                    <img src="<?PHP echo base_url('assets/images/icon-carro.png') ?>" class="helicopter float1">
                                </div>
                            </div>     
                            <div class="col-md-6 col-sm-6 col-xs-12 animate-box text-left formcontainer" data-animate-effect="fadeInUp">
                                <form id="main-contact-form" name="main-contact-form" accept-charset="utf-8">
                                	<div class="col-sm-6 col-xs-12">
                                		<input type="text" name="txtNameContact" id="txtNameContact" required placeholder="Nombre" />
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                    	<input type="text" name="txtEmailContact" id="txtEmailContact" required placeholder="Email" />
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                    	<input type="text" name="txtSubjectContact" id="txtSubjectContact" required placeholder="Asunto" />
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                    	<textarea name="txtMsgContact" id="txtMsgContact" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="col-sm-12 text-center fleft">
                                    	<button type="submit">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
               </div>
            </div>

            <footer id="tero-footer" role="contentinfo">
                <div class="tero-container">
                    <div class="row copyright">
                    	<div class="col-md-5 col-sm-8 col-xs-12">
                        	<div class="fleft">                            
                            	<img src="<?PHP echo base_url('assets/images/logo.jpg') ?>">
                            </div>
                            <div class="fleft">
                            	<img src="<?PHP echo base_url('assets/images/icon-telefono.png') ?>" class="whiteimg">
                            </div>                                                                             
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12 links">                                                                                    
                            <div class="row">
                                <small class="block">
                                    <b>Horarios</b><br><br>
                                    Lunes — Sábado<br>
                                    7:30 a.m.  —  7:00 p.m.<br><br>
                                    Domingo<br>
                                    7:30 a.m.  —  7:00 p.m.<br><br>
   									<a href="#">Aviso de privacidad</a> 
                                </small>  
                            </div>                            
                        </div>
                        
                        <div class="col-md-3 col-sm-12 col-xs-12 siguenos">                            
                            <div class="row">
                                <small class="block">
                                    <b>Síguenos</b><br><br>
                                    <a href="#">Facebook</a><br> 
                                    <a href="#">Instagram</a><br> 
                                    <a href="#">Twitter</a> 
                                    <div class="redes">
                                    	<a href="#" class="red"><img src="<?PHP echo base_url('assets/images/icon-instagram.jpg') ?>"></a>
                                    	<a href="#" class="red"><img src="<?PHP echo base_url('assets/images/icon-facebook.jpg') ?>"></a>
                                    </div>
                                    <a href="#" class="facturacion">Click para facturación</a>
                                </small>                                                                              
                        	</div>                                                                            
                        </div>
                    </div>
        		</div>
            </footer>
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop">&uarr;</a>
        </div>
        
        <!-- jQuery -->
        <script src="<?PHP echo base_url('assets/js/jquery.min.js') ?>"></script>
        <!-- jQuery Easing -->
        <script src="<?PHP echo base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <!-- Waypoints -->
        <script src="<?PHP echo base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
        <!-- countTo -->
        <script src="<?PHP echo base_url('assets/js/jquery.countTo.js') ?>"></script>
        <!-- Flexslider -->
        <script src="<?PHP echo base_url('assets/js/jquery.flexslider-min.js') ?>"></script>
        <script src="<?PHP echo base_url('assets/js/slick.js') ?>"></script> 
        <script src="<?PHP echo base_url('assets/js/jquery.marquee.min.js') ?>"></script>     
        <!-- Main -->        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrhp48DqLCA7PynxqZmfOiJaoz57nuKf8&callback=initMap" async defer></script>
        <script>
            var urlBaseweb = '<?PHP echo base_url('assets/') ?>';
        </script>

        <script src="<?PHP echo base_url('assets/js/main.js') ?>"></script>
        
        <script>
            $('#main-contact-form').submit(function(evnt){
				evnt.preventDefault(); //Evitamos que el evento submit siga en ejecución, evitando que se recargue toda la página

				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "contacto/send",
					data: $('#main-contact-form').serialize(),
					success: function (data) {
						//resultado del success
                        $('#txtMsgContact').val('');
                        $('#txtNameContact').val('');
                        $('#txtEmailContact').val('');
                        $('#txtSubjectContact').val('');

						$('#main-contact-form').append(
							'<p class="alert alert-success">' + data.text + '</p>'
						)
					},
					error: function (data) {
						$('#main-contact-form').append(
							'<p class="alert alert-danger">' + data.responseJSON.text + '</p>'
						)
					}
				});
            });
            
		function initMap() {
			//ubicaciones y direcciones aqui
			var locations = [
				['Sucursal Juarez<br>Liverpool 165', 19.4069942,-99.1752021, 3],
				//['Datos de ubicación 2', 19.4352,-99.143394, 2],
				//['Datos de ubicación 3', 19.4286725,-99.1638622, 1]
			];
		
			window.map = new google.maps.Map(document.getElementById('map'), {
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				styles: [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]
			});
		
			var infowindow = new google.maps.InfoWindow();		
			var bounds = new google.maps.LatLngBounds();		
			for (i = 0; i < locations.length; i++) {
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map,
					icon: "<?PHP echo base_url('assets/images/icon-andamos-small.png') ?>"
				});		
				bounds.extend(marker.position);		
				google.maps.event.addListener(marker, 'click', (function (marker, i) {
					return function () {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}		
			map.fitBounds(bounds);		
			var listener = google.maps.event.addListener(map, "idle", function () {
				map.setZoom(13);
				google.maps.event.removeListener(listener);
			});
		}
		
		$(document).ready(function () {
			//token de instagram aqui
			var token = '1362124742.7b33a8d.6613a3567f0a425f9852055b8ef743b7',
			num_photos = 10;			 
			$.ajax({
				url: 'https://api.instagram.com/v1/users/self/media/recent',
				dataType: 'jsonp',
				type: 'GET',
				data: {access_token: token, count: num_photos},
				success: function(data){
					for( x in data.data ){
						$('#instafeed').append('<li><span><img src="'+data.data[x].images.low_resolution.url+'"></span></li>');
					}					
					$('#instafeed').slick({
					  dots: false,
					  arrows:false,
					  autoplay : true,
					  infinite: true,
					  speed: 300,
					  slidesToShow: 5,
					  slidesToScroll: 1,
					  responsive: 
					  [{breakpoint: 1099,settings: {slidesToShow: 4,slidesToScroll: 1}},{breakpoint: 992,settings: {slidesToShow: 3,slidesToScroll: 1}},{breakpoint: 530,settings: {slidesToShow: 2,slidesToScroll: 1}}]
					});
				},
				error: function(data){
					console.log(data);
				}
			});
		});
		</script>
	</body>
</html>