<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html, charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title>Panel Administrador | Tero</title>
		<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assetsAdmin/css/reset.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assetsAdmin/css/style.css') ?>" />
		
		<!--bootstrap-->
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/bootstrap.css') ?>">
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/bootstrap-theme.min.css') ?>">
		
		<!--tabs-->
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/easy-responsive-tabs') ?>">
		
		<!--menu-->
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.positioning.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.themes.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.labels.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.dragopen.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.searchfield.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/jquery.mmenu.widescreen.css') ?>" media="all and (min-width: 768px)" />
		
		<!--grafica-->
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/graph.css') ?>">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		
		<!--bootstrap-->
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/bootstrap.js') ?>"></script>
		
		<!--menu-->
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jquery.mmenu.js') ?>"></script>
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jquery.mmenu.labels.js') ?>"></script>
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jquery.mmenu.dragopen.js') ?>"></script>
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jquery.mmenu.searchfield.js') ?>"></script>
		
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jFunciones.js') ?>"></script>
		
		<!--tabs-->
		<script type="text/javascript">			
			$(function() {
				$("nav#menu").mmenu({
					position: "left",
					zposition: "back",
					classes: 'mm-light',
					slidingSubmenus: false,
					dragOpen: true,
					searchfield: false,
					labels		: {
						fixed		: !$.mmenu.support.touch
					}
				});
				$(".mm-fullsubopen").click(); //abre los submenus desde el principio								
			});
		</script>
	</head>
	
	<body class="interior">
		<div class="mini" id="mini">
			<div class="header">
				<div class="dtop">
					<a href="<?PHP echo site_url('administrador/productos') ?>" class="logo"><img src="<?PHP echo base_url('assetsAdmin/img/logo.jpg') ?>" style="width:120px; height:90px" /></a>					
				</div>

				<div class="crumb">
					<div class="bmenu">
						<a href="#menu" class="btn btn-default btn-xs" id="botonmenu">
							<span class="glyphicon glyphicon-list"></span> MENU
						</a>
					</div>
					
					<ol class="breadcrumb">
					  <li><a href="<?PHP echo site_url('administrador') ?>"><span class="glyphicon glyphicon-home"></span> Portada</a></li><li><span class="glyphicon glyphicon-tags"></span> Productos</li>
					  <!--<li class="active">Routes MTF</li>-->
					</ol>
				</div>
			</div>
            <div class="btn-group user">
                <button type="button" class="btn btn-default dropdown-toggle btn-me" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span> ADMINISTRADOR <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <!--<li><a href="#">Ver Perfil</a></li>-->							
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>
            
			<div class="containers" id="home">
            	<div class="inside">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1 class="white">Productos</h1>
							<a href="<?PHP echo site_url('administrador/productos') ?>"><h4 class="downwhite"><small>&laquo; Regresar a Listado</small></h4></a>
						</div>
                                 
                      <div class="supertop">
                      	<?PHP echo form_open(site_url("administrador/productos/storage"), ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form'], $form_movimiento) ?>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="panel panel-primary" >
                                    <div class="panel-heading" style="margin-bottom:20px">
                                        <h3 class="panel-title">Datos</h3>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <!--columna1-->
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="form-group">
												<?PHP echo form_label("Clasificación", "clasificacion", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label')) ?>
												<div class="col-sm-8">
													<select name="Productos_cmbClasificacion" id="Productos_cmbClasificacion" class="form-control" required>
														<option value="">Selecciona clasificación</option><!--1.- BEBIDAS, 2.- ALIMENTOS-->
														<option <?PHP if(isset($form_clasificacion)){ if($form_clasificacion['select'] == 1) echo 'selected="selected"'; } ?> value="1">Bebidas</option>
														<option <?PHP if(isset($form_clasificacion)){ if($form_clasificacion['select'] == 2) echo 'selected="selected"'; } ?> value="2">Alimentos</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<?PHP echo form_label("Categoría", "categoria", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label')) ?>
												<div class="col-sm-8">
													<select name="Productos_cmbCategoria" id="Productos_cmbCategoria" class="form-control" required>
														<option value="">Selecciona categoría</option><!--1.- CAFÉ, 2.- TÉ, 3.- DESAYUNO, 4.- COMIDA'-->
														<option <?PHP if(isset($form_categoria)){ if($form_categoria['select'] == 1) echo 'selected="selected"'; } ?> value="1">CAFÉ</option>
														<option <?PHP if(isset($form_categoria)){ if($form_categoria['select'] == 2) echo 'selected="selected"'; } ?> value="2">TÉ</option>
														<option <?PHP if(isset($form_categoria)){ if($form_categoria['select'] == 3) echo 'selected="selected"'; } ?> value="3">DESAYUNO</option>
														<option <?PHP if(isset($form_categoria)){ if($form_categoria['select'] == 4) echo 'selected="selected"'; } ?> value="4">COMIDA</option>
													</select>
												</div>
											</div>

                                            <div class="form-group">
                                                <!--<label for="inputEmail3" class="col-sm-4 control-label">Nombre(s)</label>-->
                                                <?PHP echo form_label("Título", "titulo", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label', 'required' => 'required')) ?>
                                                
                                                <div class="col-sm-8">
                                                    <?PHP echo form_input($form_titulo) ?>
                                                    <?PHP echo form_error("Productos_txtTitulo", "<p class='alert alert-danger'>", "</p>") ?>
                                                </div>
                                            </div>
										</div>

                                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                         	<div class="form-group">
                                                <?PHP echo form_label("Precio chico", "precio_c", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label', 'required' => 'required')) ?>
                                                
                                                <div class="col-sm-8">
                                                    <?PHP echo form_input($form_precioc) ?>
                                                    <?PHP echo form_error("Productos_txtPrecioc", "<p class='alert alert-danger'>", "</p>") ?>
                                                </div>
											</div>
											
											<div class="form-group">
                                                <?PHP echo form_label("Precio mediano", "precio_m", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label', 'required' => 'required')) ?>
                                                
                                                <div class="col-sm-8">
                                                    <?PHP echo form_input($form_preciom) ?>
                                                    <?PHP echo form_error("Productos_txtPreciom", "<p class='alert alert-danger'>", "</p>") ?>
                                                </div>
											</div>
											
											<div class="form-group">
                                                <?PHP echo form_label("Precio grande", "precio_g", array('for' => 'inputEmail3', 'class' => 'col-sm-4 control-label', 'required' => 'required')) ?>
                                                
                                                <div class="col-sm-8">
                                                    <?PHP echo form_input($form_preciog) ?>
                                                    <?PHP echo form_error("Productos_txtPreciog", "<p class='alert alert-danger'>", "</p>") ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float:left"> 
                                            <div class="form-group">
                                                <div class="col-xs-12 col-xs-offset-0 col-sm-9 col-sm-offset-3 col-md-offset-0 col-md-12 col-lg-offset-0 col-lg-12">
                                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        	                                               	                                                                                                                                                                                                        																		
                          </div>
                          
          				<?PHP echo form_close(); ?>
                    </div>
                </div>
				</div>
			</div>
			<div class="sign"><!--desarrollado por <b>Arkanmedia</b>--></div>
			<?PHP //include("menu.php") ?>
			
			<nav id="menu">
				<ul>
					<li class="Label">contenido del sitio</li>
					<li><a href="<?PHP echo site_url('administrador/productos') ?>"  class="selected"><span class="glyphicon glyphicon-tags"></span> Productos</a></li>
					<!--<li><a href="<?PHP echo site_url('administrador/categorias') ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a></li>
					<li><a href="<?PHP echo site_url('administrador/archivos') ?>"><span class="glyphicon glyphicon-tags"></span> Archivos</a></li>-->
				</ul>
			</nav>
		</div>
</body>
</html>