<?PHP
	defined('BASEPATH') OR exit('No direct script access allowed');

	class WebSite extends CI_Controller {
		public function index(){
			$data['listadoproductos'] = $this->productos->get()['registros'];

			$this->load->view("website/index_view", $data);
		}

		public function SendContacto(){
			$this->form_validation->set_rules("txtEmailContact", "Email", "required|trim|xss_clean");
			$this->form_validation->set_rules("txtSubjectContact", "Email", "required|trim|xss_clean");
			$this->form_validation->set_rules("txtNameContact", "Nombre", "required|trim|min_length[2]|max_length[100]|xss_clean");
			$this->form_validation->set_rules("txtMsgContact", "Mensaje", "required|trim|min_length[10]|max_length[255]|xss_clean");

			$this->form_validation->set_message("required", "El campo %s es requerido");
			$this->form_validation->set_message("valid_email", "El campo %s no tiene un formato válido");
			$this->form_validation->set_message("min_length", "El campo %s no puede tener menos de %s caracteres");
			$this->form_validation->set_message("max_length", "El campo %s no puede tener más de %s caracteres");

			if($this->form_validation->run() === FALSE){
				return $this->output->set_content_type('application/json')
									->set_status_header(500)
									->set_output(json_encode(array(
										'text' => validation_errors()
									)));
			}else{
				$this->load->library("email");
				
				//$filename = 'assets/img/logo.png';
				//$this->email->attach($filename);
				//$cid = $this->email->attachment_cid($filename);
				$cNombre = $this->input->post('txtNameContact');
				$cEmail = $this->input->post('txtEmailContact');
				$cMensaje = $this->input->post('txtMsgContact');
				$cSubject = $this->input->post('txtSubjectContact');
					
				$this->email->from("no-reply@gonzalezsalum.mx", "Café Tero");
				$this->email->to('contacto@arkanmedia.com');
					
				$this->email->subject("Comentario desde sitio web");
				$this->email->message("	<div style=\"width:100%; background:#fff; padding:0px; color:#333; font-family:Arial,'Century Gothic',Tahoma; margin-bottom:10px; font-size:12px;max-width:647px; margin:0 auto\">
											<center>
												<h1 style=\"font-size:18px\">$cNombre</h1>
												<h2 style=\"font-weight:normal\">Email: $cEmail</h2>
												<h2 style=\"font-weight:normal\">Asunto: $cSubject</h2>
												<p>$cMensaje</p>
											</center>
										</div>");
					
				if($this->email->send()){///ENVIADO CON ÉXITO
					return $this->output->set_content_type('application/json')
										->set_status_header(200)
										->set_output(json_encode(array(
												'text' => 'Mensaje enviado satisfactoriamente'
										)));
				}else{	///OCURRIÓ UN ERROR
					return $this->output->set_content_type('application/json')
										->set_status_header(500)
										->set_output(json_encode(array(
												'text' => 'Ocurrió un error de envío'
										)));
				}
			}
		}
	}
?>