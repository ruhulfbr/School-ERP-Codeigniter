<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class School_admin_roll_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Student_model','Teacher_and_staff_model','Sms_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}
	
	public function school_admin_dashboard($page = 'school_admin_dashboard')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst(humanize($page));

			$this->load->view('school_admin/includs/header_link', $title);
	        $this->load->view('school_admin/includs/navigation', $title);
	        $this->load->view('school_admin/includs/header', $title);
	        $this->load->view('school_admin/'.$page , compact(""));
	        $this->load->view('school_admin/includs/footer', $title);
	        $this->load->view('school_admin/includs/footer_link', $title);
	}
}
