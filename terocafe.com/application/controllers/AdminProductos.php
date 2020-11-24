<?PHP
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminProductos extends CI_Controller {
		private function fieldSearch(){
			$data = NULL;
			
			$aFieldSearch = array(
								'hidId',
								'pagi_page',
								'pagi_page2',
								'Productos_txtSearch'
							);
			
			if($this->input->get()){
				if($this->input->get('search')){
					$cSearch = $this->input->get('search');
					$cSearch = base64_decode($cSearch);
					$aSearch = explode('&', $cSearch);
					
					if(count($aSearch) == 0)
						$aSearch[] = $cSearch;
					
					if(count($aSearch) > 0){
						foreach ($aSearch as $valor){
							$aSearch2 = explode('=', $valor);
							$data[$aSearch2[0]] = $aSearch2[1];
							
							unset($aSearch2);
						}
					}
				}
					
			}elseif($this->input->post()){
				foreach ($aFieldSearch as $valor){
					if($this->input->post($valor)){
						$data[$valor] = $this->input->post($valor);
					}
				}
			}
			
			return $data;
		}
		
		private function urlBase64($data = NULL){
			$cUrlGet = NULL;
			
			if(isset($data)){
				$cUrlGet = '';

				if(count($data) > 0){
					foreach ($data as $i => $valor){
						if(!empty($cUrlGet))
							$cUrlGet.= '&';

						$cUrlGet.= $i.'='.$valor;
					}

					$cUrlGet = base64_encode($cUrlGet);
				}
			}
			
			return $cUrlGet;
		}
		
		private function redireccionar($bDelete = NULL){
			$data = $this->fieldSearch();
			
			$cParametrosUrl = '';
			if(isset($data["pagi_page$bDelete"])){	//pagi_page2 Sólo aplica para eliminar
				if(!empty($data["pagi_page$bDelete"])){
					$cParametrosUrl = '/'.$data["pagi_page$bDelete"];
				}
			}
			
			if(isset($data['hidId']))
				unset($data['hidId']);
			
			if(isset($data['pagi_page']))
				unset($data['pagi_page']);
			
			if(isset($data['pagi_page2']))
				unset($data['pagi_page2']);
			
			if(isset($data)){
				if(count($data) > 0){
					$cParametrosUrl .= '?search='.$this->urlBase64($data);
				}
			}
			
			return $cParametrosUrl;
		}
		
		////////////////////////////CRUD////////////////////////////
		public function index($nP = 0){
			$nLimit = 30;
			
			/////////DESIGNAR USER DATA
			$data = $this->fieldSearch();
			
			$aQuery = $this->productos->get($data, $nLimit, $nP);
			 
			$this -> pagination -> initialize(
												paginacion_config(
																site_url('administrador/productos'),
																$this->urlBase64($data),
																$aQuery['totalregistros'],
																$nLimit
															)
											);
			/////PAGINADO
			$nPD = $nP; 
			if(count($aQuery['registros']) <= 1){
				if($nP > $nLimit)
					$nPD = $nP - $nLimit;
				else
					$nPD = 0;
			}
			
			$data['pagi_page'] = $nP;	 //PAGINADO ORIGINAL
			$data['pagi_page2'] = $nPD; //SE USA PARA DELETE
			/////////////////////////
			
			$data['listar'] = $aQuery['registros'];

			$this->load->view("administrador/productos/listado_view", $data);
		}
		
		public function insertar(){
			$aDatos = array(
							'TITULO' => $this->input->post('Productos_txtTitulo'),
							'PRECIO_C' => $this->input->post('Productos_txtPrecioc'),
							'PRECIO_M' => $this->input->post('Productos_txtPreciom'),
							'PRECIO_G' => $this->input->post('Productos_txtPreciog'),
							'CATEGORIA' => $this->input->post('Productos_cmbCategoria'),
							'CLASIFICACION' => $this->input->post('Productos_cmbClasificacion')
						);

			$this->productos->initialize($aDatos);
			
			if($nIdProducto = $this->productos->insert()){
				$data = array(
								'cClassMsj' => 'alert-success',
								'cMsj' => '<strong>Éxito!</strong> Registro editado con éxito' 
							);
			}else{
				$data = array(
								'cClassMsj' => 'alert-danger',
								'cMsj' => '<strong>Error!</strong> Ocurrió un error de inserción' 
							);
			}
			
			$this->session->set_flashdata($data);
			
			redirect(base_url("administrador/productos"), 'refresh');
		}
		
		public function editar(){
			$nIdProducto = $this->input->post('hidId');
			
			if(isset($nIdProducto)){
				if(!empty($nIdProducto)){
					$aDatos = array(
									'UPDATED_AT' => date("Y-m-d H:i:s"),
									'TITULO' => $this->input->post('Productos_txtTitulo'),
									'PRECIO_C' => $this->input->post('Productos_txtPrecioc'),
									'PRECIO_M' => $this->input->post('Productos_txtPreciom'),
									'PRECIO_G' => $this->input->post('Productos_txtPreciog'),
									'CATEGORIA' => $this->input->post('Productos_cmbCategoria'),
									'CLASIFICACION' => $this->input->post('Productos_cmbClasificacion')
								);

					$this->productos->initialize($aDatos);
					
					if($this->productos->update($nIdProducto)){
						$data = array(
										'cClassMsj' => 'alert-success',
										'cMsj' => '<strong>Éxito!</strong> Registro editado con éxito' 
									);
					}else{
						$data = array(
										'cClassMsj' => 'alert-danger',
										'cMsj' => '<strong>Error!</strong> Ocurrió un error de edición' 
									);
					}

					$this->session->set_flashdata($data);
				}

				redirect(base_url("administrador/productos".$this->redireccionar()), 'refresh');
			}
		}
		
		public function eliminar(){
			$nIdProducto = $this->input->post('hidId');
			
			if(isset($nIdProducto)){
				if(!empty($nIdProducto)){
					$oProducto = $this->productos->find($nIdProducto);
					//$oImagenes = $this->imagenes->get(array('Imagenes_searchIdProducto' => $nIdProducto))['registros'];
					
					if($this->productos->delete($nIdProducto)){
						/*$this->categorizacion->deleteporproyecto($nIdProducto);
						
						if(count($oImagenes) > 0){
							$this->imagenes->deleteporproyecto($nIdProducto);
							
							foreach($oImagenes as $valor){
								$cSrc = "./imgWeb/".$valor;

								if(file_exists($cSrc))
									unlink($cSrc);
							}
						}*/
						
						$data = array(
										'cClassMsj' => 'alert-success',
										'cMsj' => '<strong>Éxito!</strong> Registro elimando con éxito' 
									);
					}else{
						$data = array(
										'cClassMsj' => 'alert-danger',
										'cMsj' => '<strong>Error!</strong> Ocurrió un error' 
									);
					}
					
					$this -> session -> set_flashdata($data);
				}
			}
			
			redirect(base_url("administrador/productos".$this->redireccionar(2)), 'refresh');
		}
		
		public function guardar(){
			//if($this->input->post("save")){
			//$this->form_validation->set_rules("Productos_txtDescripcion", "descripcion", "required|trim|xss_clean");
			$this->form_validation->set_rules("Productos_txtTitulo", "titulo", "required|trim|min_length[2]|max_length[100]|xss_clean");
			
			$this->form_validation->set_message("required", "El campo %s es requerido");
			
			if($this->form_validation->run() === FALSE){
				$this->showFormulario();
			}else{
				if($this->input->post('hidMovimiento') == 1)
					$this->insertar();
				elseif($this->input->post('hidMovimiento') == 2)
					$this->editar();
			}
		}
		
		public function showFormulario($nMovimiento = FALSE, $bObtener = FALSE){
			if(!$nMovimiento)
				$nMovimiento = set_value('hidMovimiento');
			
			$aFormFields = array(
								'form_titulo' => array(
									'maxlength'		=> '80',
									'name'			=> 'Productos_txtTitulo',
									'id'            => 'Productos_txtTitulo',
									'class'         => 'form-control',
									'placeholder'	=> 'Título',
									'required'      => 'required',
									'value'         => set_value('Productos_txtTitulo')
								),
								'form_precioc' => array(
									'maxlength'		=> '80',
									'name'			=> 'Productos_txtPrecioc',
									'id'            => 'Productos_txtPrecioc',
									'class'         => 'form-control',
									'placeholder'	=> 'Precio chico',
									//'required'      => 'required',
									'value'         => set_value('Productos_txtPrecioc')
								),
								'form_preciom' => array(
									'maxlength'		=> '80',
									'name'			=> 'Productos_txtPreciom',
									'id'            => 'Productos_txtPreciom',
									'class'         => 'form-control',
									'placeholder'	=> 'Precio mediano',
									//'required'      => 'required',
									'value'         => set_value('Productos_txtPreciom')
								),
								'form_preciog' => array(
									'maxlength'		=> '80',
									'name'			=> 'Productos_txtPreciog',
									'id'            => 'Productos_txtPreciog',
									'class'         => 'form-control',
									'placeholder'	=> 'Precio grande',
									//'required'      => 'required',
									'value'         => set_value('Productos_txtPreciog')
								),
								'form_movimiento' => array(
									'hidMovimiento'	=> $nMovimiento//1.- INSERTAR, 2.- EDITAR //set_value('hidMovimiento')
								)
							);
			
			//1.- INSERTAR, 2.- EDITAR
			if($nMovimiento == 2){
				/////////RECUPERAR VALORES POST
				$data = $this->fieldSearch();
				
				if(isset($data)){
					if(count($data) > 0){
						foreach ($data as $clave => $valor){
							$aFormFields['form_movimiento'][$clave] = $valor;	
						}
					}
				}
			}
			
			if($bObtener){//OBTENER DATOS A PRESENTAR A EDICIÓN
				if($this->input->post('hidId')){
					$oProducto = $this->productos->find($this->input->post('hidId'));

					if(!empty($oProducto)){
						$aFormFields['form_titulo']['value'] = $oProducto->TITULO;
						$aFormFields['form_precioc']['value'] = $oProducto->PRECIO_C;
						$aFormFields['form_preciom']['value'] = $oProducto->PRECIO_M;
						$aFormFields['form_preciog']['value'] = $oProducto->PRECIO_G;
						$aFormFields['form_categoria']['select'] = $oProducto->CATEGORIA;
						$aFormFields['form_clasificacion']['select'] = $oProducto->CLASIFICACION;
					}
				}
			}

			$this->load->view("administrador/productos/formulario_view", $aFormFields);
		}
	}
?>