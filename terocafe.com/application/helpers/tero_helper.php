<?PHP
	function paginacion_config($base_url, $query = NULL, $total, $limite){
		//https://stackoverflow.com/questions/31292415/codeigniter-3-0-pagination-with-get-parameter		
		$config['base_url']   = $base_url;
		$config['total_rows'] = $total;
		$config['per_page']   = $limite;
		
		if(isset($query)){
			$config['suffix'] = "?search=$query";
			$config['use_global_url_suffix'] = FALSE;
			$config['first_url'] = $config['base_url'].$config['suffix'];
		}
		
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$config['full_tag_open'] = '<ul class="pagination col-xs-12 col-sm-12 col-md-12 col-lg-12">';//'<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		return $config;
	}

	function set_upload_options_images(){   
		//upload an image options
		$options = array();
		$options['upload_path'] = 'imgWeb';
		$options['allowed_types'] = 'gif|jpg|jpeg|png';
		$options['max_size']      = '0';
		$options['overwrite']     = FALSE;
		$options['file_ext_tolower'] = TRUE;
		
		return $options;
	}

	function obtenerfechaformateada($cFch){
		$mesC = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
		$dias = array('Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado');
		$mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		
		return array(
						'dia' => date('d', strtotime($cFch)),
						'mes' => date('m', strtotime($cFch)),
						'ano' => date('Y', strtotime($cFch)),
						'diatexto' => $dias[date('N', strtotime($cFch))],
						'meslargo' => $mes[(date('n', strtotime($cFch))) - 1],
						'mescorto' => $mesC[(date('n', strtotime($cFch))) - 1]
					);
	}
?>