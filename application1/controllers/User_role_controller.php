<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Machine_model', 'Teacher_and_staff_model', 'Admin_model','Result_model','Account_model','User_role_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

		if ( !$this->Login_model->check_admin() ) 
		{
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	function index($page='user_role')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst($page);

	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page,compact("class_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	function student_search_role($page='user_role'){
		$this->form_validation->set_rules('class', 'Class', 'callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'callback_section_select');

		if ($this->form_validation->run() == FALSE){

		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	      }else{
	      	$post = $this->input->post();
	        $student_data = $this->User_role_model->student_search_role($post);
	        if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","student_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	      }
	}

	function class_select(){
		if ($this->input->post('class') === 'none')  {

            $this->form_validation->set_message('class_select', 'You have to select a class.');
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	function section_select(){
		if ($this->input->post('section') === 'none')  {

			$this->form_validation->set_message('section_select', 'You have to select a section.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function access_restore($id){
		$access_restore = $this->User_role_model->access_restore($id);

		if ($access_restore == true) {
			$this->session->set_flashdata('success', 'Password has been restored.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Error in restoring password.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
}