<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title>Panel Administrador | Tero</title>
		<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assetsAdmin/css/reset.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assetsAdmin/css/style.css') ?>" />
		<!--bootstrap-->
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/bootstrap.css') ?>">
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/bootstrap-theme.min.css') ?>">
		<!--tabs-->
		<link rel="stylesheet" href="<?PHP echo base_url('assetsAdmin/css/easy-responsive-tabs.css') ?>">
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
		
		<script type="text/javascript" src="<?PHP echo base_url('assetsAdmin/js/jAjax.js') ?>"></script>
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
                    <li><a href="<?PHP echo site_url('administrador/login/logout') ?>">Cerrar Sesión</a></li>
                </ul>
            </div>
            
			<div class="containers" id="home">
           		<div class="inside">
                    <div class="row">
                    	<?PHP
							$cMsj = $this -> session -> flashdata('cMsj');
							$cClassMsj = $this -> session -> flashdata('cClassMsj');

							if(isset($cMsj) && isset($cClassMsj)){
								echo '	<div class="alert '.$cClassMsj.' " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											'.$cMsj.'
										</div>';
							}
						?>
							
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1 class="white">Productos</h1>
         				</div>
          				
          				<div class="supertop">
           					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<form class="form-inline" role="form" id="formulario">  								                                                               
									<div class="form-group">
										<a href="<?PHP echo site_url('administrador/productos/formulario') ?>" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Nuevo Producto</a>
									</div>
								</form>
                 			
								<div class="panel panel-primary" id="listado">
									<div class="panel-heading">
										<h3 class="panel-title">Listado Productos</h3>
									</div>
                             
                              		<div class="panel-body" style="padding-top:8px">
										<div class="form-group" style="margin-bottom:8px">
											<?PHP echo form_open(base_url('administrador/productos'), ['name' => 'frmPrincipal', 'id' => 'frmPrincipal', 'role' => 'form', 'class' => 'form-inline']); ?>
												<input type="hidden" name="hidId" id="hidId" />
												<?PHP if(isset($pagi_page)){ if(!empty($pagi_page)) echo form_input(array('type' => 'hidden', 'name' => 'pagi_page', 'id' => 'pagi_page', 'value' => $pagi_page)); } ?>
												<?PHP if(isset($pagi_page2)){ if(!empty($pagi_page2)) echo form_input(array('type' => 'hidden', 'name' => 'pagi_page2', 'id' => 'pagi_page2', 'value' => $pagi_page2)); } ?>

												<div class="input-group">
													<span class="input-group-addon">Búsqueda</span>
													<input type="text" class="form-control" id="Productos_txtSearch" name="Productos_txtSearch" <?PHP if(isset($Productos_txtSearch)){ if(!empty($Productos_txtSearch)) echo 'value="'.$Productos_txtSearch.'"'; } ?> placeholder="Por título del producto" />
													<span class="input-group-btn">
														<button class="btn btn-default" type="submit">Buscar</button>
													</span>
												</div>
											<?PHP echo form_close(); ?>
										</div>
                            	  	
                            	  		<div>
											<ul class="list-group nomargin">
												<?PHP
													if(count($listar) > 0){
														$nConta = 0;
														
														foreach($listar as $ls): 
															$nConta++; ?>
															<li class="list-group-item list-group-item-info listacut">
                                                                <div class="col-xs-7">
																	<span class="ellipsis"><b><?PHP echo $ls->TITULO ?></b></span>
																	<span class="ellipsis"><b>P.Chico $<?PHP echo $ls->PRECIO_C ?></b></span>
																	<span class="ellipsis"><b>P.Mediano $<?PHP echo $ls->PRECIO_M ?></b></span>
																	<span class="ellipsis"><b>P.Grande $<?PHP echo $ls->PRECIO_G ?></b></span>
																</div>
                                                                <div class="col-xs-3" style=" padding-top:12px">
                                                                    <a href="javascript:removeElement(<?PHP echo $ls->IDPRODUCTO ?>, '<?PHP echo site_url("administrador/productos/delete") ?>')" class="btn btn-danger pull-right">
                                                                        <span class="glyphicon glyphicon-remove"></span> <!--<p>Eliminar</p>-->
                                                                    </a>
                                                                    <a href="javascript:editElement(<?PHP echo $ls->IDPRODUCTO ?>, '<?PHP echo site_url("administrador/productos/formulario") ?>')" class="btn btn-default pull-right editar">
                                                                        <span class="glyphicon glyphicon-pencil"></span> <!--<p>Editar</p>-->
                                                                    </a>
                                                                </div>
															</li>
												<?PHP
														endforeach; 
													}else{
												?>
														<li class="list-group-item list-group-item-info listacut">No se encontraron registros</li>
												<?PHP
													}
												?>
											</ul>
										</div>
                            	  		
                            	  		<?PHP //echo $this -> pagination -> create_links(); ?>
                              </div>
                            </div>
                   		</div>                																		
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