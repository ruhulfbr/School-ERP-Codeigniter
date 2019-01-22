<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Login_model'));

		
		
	}

	public function index($page = 'login')
	{
		if ( $this->Login_model->is_user_logged_in() ) 
		{
			$this->rederect(); 
		}
		else
		{
			if ( ! file_exists(APPPATH.'views/login/'.$page.'.php'))
	        {
	                redirect('404_override');
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $this->load->view('login/header', $data);
	        $this->load->view('login/'.$page, $data);
	        $this->load->view('login/footer', $data);
		}
		
	}

	public function login($page = 'login'){

			$this->form_validation->set_rules('u_name', 'User name', 'trim');
			$this->form_validation->set_rules('pass', 'Password', 'trim');

			if ($this->form_validation->run() == FALSE){
				if ( ! file_exists(APPPATH.'views/login/'.$page.'.php'))
		        {
		                redirect('404_override');
		        }

		        $data['title'] = ucfirst($page); // Capitalize the first letter

		        $this->load->view('login/header', $data);
		        $this->load->view('login/'.$page, $data);
		        $this->load->view('login/footer', $data);
			}else{
				$post = $this->input->post();
				$return = $this->Login_model->login_check($post); //Was (Login) model

				if ( $return ) {
					$this->rederect();
				}else{
					$data['title'] = ucfirst($page);
					$data['error'] = 'Username or Passowrd is invalid';
					$this->load->view('login/header', $data);
			        $this->load->view('login/'.$page, $data);
			        $this->load->view('login/footer', $data);
				}
				
			}
		
	}

	public function rederect(){
		$ses_data = $this->session->all_userdata('user_data');
		$user_roll = @$ses_data['user_roll'];
		
		if ($user_roll == 1) {
			redirect ('dashboard');
		} elseif ($user_roll == 2) {
			redirect ('teacher_dashboard');
		} elseif ($user_roll == 3) {
			redirect ('student_dashboard');
		} elseif ($user_roll == 4) {
			redirect ('account_dashboard');
		} elseif ($user_roll == 5) {
			redirect ('school_admin_dashboard');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ('?logout=success');
	}
}