<?php
class Login extends CI_Controller{

	public function index(){
		$this->load->model('login_model');
		$result = $this->login_model->session_check();
		if($result){
			$this->load->view('head');
			$this->load->view('navigation_top');
			$this->load->view('upload_content');
		}
		else{
			$this->load->view('login');
		}
	}

	public function login_validation_check(){
		$this->form_validation->set_rules('username','User Name','trim|xss_clean|min_length[4]');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[4]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('login'); 
		}
		else{
			$this->load->model('login_model');
			$result = $this->login_model->validation();
			if($result){

				$this->load->view('head');
				$this->load->view('navigation_top');
				$this->load->view('upload_content');
			}
			else{
				$data['errorLogin'] = "Username and Password is Invalid!!!";
				$this->load->view('login',$data);
			}				
		}
	} 

	public function logout(){
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('login/?logout=success');
	}   
}
?>