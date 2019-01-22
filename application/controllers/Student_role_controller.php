<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_role_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Student_role_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

		// if ( !$this->Login_model->check_admin() ) 
		// {
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }

	}
	
	public function index($page='student_dashboard')
	{
		if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $this->load->view('student/includs/header_link', $data);
	        $this->load->view('student/includs/navigation', $data);
	        $this->load->view('student/includs/header', $data);
	        $this->load->view('student/'.$page);
	        $this->load->view('student/includs/footer', $data);
	        $this->load->view('student/includs/footer_link', $data);
	}
	
	public function dashboard($page = 'dashboard')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $Teacher_num = $this->Teacher_and_staff_model->teacher_num();
			$Student_num = $this->Student_model->student_num();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page,compact("Teacher_num","Student_num","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}
	
	public function student_class_routine($page = 'class_routine')
	{
		if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('student/'.$page);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}
	
	public function student_report_card($page = 'report_card')
	{
		if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $term_data = $this->Student_role_model->term_data();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('student/includs/navigation', $data);
	        $this->load->view('student/includs/header', $data);
	        $this->load->view('student/'.$page, compact('term_data'));
	        $this->load->view('student/includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function student_report_card_search($page = 'report_card'){
		$term = $this->input->post('term');
		if ($term=="none") {
			$this->session->set_flashdata('error_term', 'You have to select a term.');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$student_result = $this->Student_role_model->student_result($term);
			if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $term_data = $this->Student_role_model->term_data();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('student/includs/navigation', $data);
	        $this->load->view('student/includs/header', $data);
	        $this->load->view('student/'.$page, compact('term_data','student_result'));
	        $this->load->view('student/includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}
	}
	
	public function student_daily_logs($page = 'daily_logs')
	{
		// if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
	 //        {
	 //            redirect('404_override');
	 //        }

	 //        $data['title'] = ucfirst(humanize($page)); 

	 //        $this->load->view('includs/header_link', $data);
	 //        $this->load->view('includs/navigation', $data);
	 //        $this->load->view('includs/header', $data);
	 //        $this->load->view('student/'.$page);
	 //        $this->load->view('includs/footer', $data);
	 //        $this->load->view('includs/footer_link', $data);
		$this->Student_role_model->student_result();
	}
}
