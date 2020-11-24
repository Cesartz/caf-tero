<?PHP
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LoginTero extends CI_Controller {
		private $cUser = 'admin';
		private $cPassword = 'secret';
		
		public function index(){
			$this->load->view('administrador/login/formulario_view');
		}
		
		public function autenticar(){
			$user = $this->input->post('enter_login');
			$password = $this->input->post('enter_password');
			
			if(isset($user) && isset($password)){
				if(($this->cUser === $user) && ($this->cPassword === $password)){
					$this->session->set_userdata(
												array(
													'idUsuario_Tero' => 1,
													'usuario_Tero' => TRUE,
													'nombreUser_Tero' => 'Administrador'
												)
											);
					
					redirect(base_url('administrador/productos'), 'refresh');
				}
			}
			
			$data = array(
							'cClassMsj' => 'alert-danger',
							'cMsj' => '<strong>Error!</strong> Usuario o password incorrectos' 
						);
			
			$this->session->set_flashdata($data);
			
			redirect(base_url('administrador'), 'refresh');
		}
		
		public function cerrarsesion(){
			$this->session->sess_destroy();
			
			redirect(base_url('administrador'), 'refresh');
		}
	}
?>