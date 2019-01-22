<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_admission_controller extends CI_Controller 
{
	# ISMAIL START
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model', 'Online_admission_model'));

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

	public function index()
	{
		if ( $this->Login_model->is_user_logged_in() ) 
		{
			redirect ('admin_controller/dashboard');
		}
		else
		{
			$this->load->view('login');
		}
	}

	# Admission_time_date Start
	public function admission_time_date($page = 'admission_time_date')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	       	$data['ad_t_data'] = $this->Online_admission_model->admission_test_data();

	       	$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, $data);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function admission_time_date_insert()
	{

		$this->form_validation->set_rules('exam_title', 'Exam Title', 'required');
		$this->form_validation->set_rules('application_start_date', 'Application Start Date', 'required');
		$this->form_validation->set_rules('admission_date', 'Admission Date', 'required');
		$this->form_validation->set_rules('application_end_date', 'Application End Date', 'required');
		$this->form_validation->set_rules('admission_time', 'Admission Time', 'required');
		$this->form_validation->set_rules('admission_test_details', 'Admission Test Details');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('admin/admission_time_date');

		}else{
			$post = $this->input->post();
			$this->Online_admission_model->admission_time_date_insert($post);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		
		$data = array();
        $data['class_name'] = $this->input->post('class_name', true);
        $data['admission_date'] = $this->input->post('admission_date', true);
        $data['admission_time_start'] = $this->input->post('admission_time_start', true);
        $data['admission_time_end'] = $this->input->post('admission_time_end', true);

        $this->online_admission_model->admission_time_date_insert($data);

        $data['success'] = 'Registration Successful.';
        redirect("online_admission_controller/admission_time_date", $data);
	}

	public function admission_time_date_view($id = NULL)
	{
		$this->load->model('online_admission_model');
        $data['date_time_data_view'] = $this->online_admission_model->get_admission_time_date($id);

        if (empty($data['date_time_data_view']))
        {
                show_404();
        }
        
		$this->load->view('admin/admission_time_date_view', $data);
	}

	public function admission_time_date_delete($id = NULL)
	{
		$this->load->model('online_admission_model');

        if ( $this->online_admission_model->admission_time_date_delete($id) ) {
        	redirect ('online_admission_controller/admission_time_date');
        }
        else
        {
        	redirect ('dashboard');
        }
	}

	public function admission_time_date_update($id = NULL)
	{
		# This load Online_admission_model page
		$this->load->model('online_admission_model'); // First load the model

	    if( $this->online_admission_model->admission_time_date_update($id) ) // call the method from the controller
	    {
	        $this->load->model('online_admission_model');
			$data['date_time_data_view'] = $this->online_admission_model->get_admission_time_date();
			$this->load->view('admin/admission_time_date_view', $id);
	    }
	    else
	    {
        	$data['success'] = 'Update Successful.';
        	redirect("online_admission_controller/admission_time_date", $id);
	    }
	}
	# Admission_time_date End

	# Admission_exam_date Start
	public function admission_exam_date()
	{
		$this->load->model('online_admission_model');
		$data['exam_date_data'] = $this->online_admission_model->get_admission_exam_date();
		$this->load->view('admin/admission_exam_date', $data);
	}

	public function admission_exam_date_insert()
	{
		# This load Online_admission_model page
		$this->load->model('online_admission_model');
		
		$data = array();
        $data['class_name'] = $this->input->post('class_name', true);
        $data['admission_exam_date'] = $this->input->post('admission_exam_date', true);
        $data['admission_exam_time_start'] = $this->input->post('admission_exam_time_start', true);
        $data['admission_exam_time_end'] = $this->input->post('admission_exam_time_end', true);

        $this->online_admission_model->admission_exam_date_insert($data);

        $data['success'] = 'Add Successfully';
        redirect("online_admission_controller/admission_exam_date", $data);
	}

	public function admission_exam_date_view($id = NULL)
	{
		$this->load->model('online_admission_model');
        $data['exam_date_data_view'] = $this->online_admission_model->get_admission_exam_date($id);

        if (empty($data['exam_date_data_view']))
        {
                show_404();
        }
        
		$this->load->view('admin/admission_exam_date_view', $data);
	}

	public function admission_exam_date_delete($id = NULL)
	{
		$this->load->model('online_admission_model');

        if ( $this->online_admission_model->admission_exam_date_delete($id) ) {
        	redirect ('online_admission_controller/admission_exam_date');
        }
        else
        {
        	redirect ('dashboard');
        }
	}

	public function admission_exam_date_update($id = NULL)
	{
		# This load Online_admission_model page
		$this->load->model('online_admission_model'); // First load the model

	    if( $this->online_admission_model->admission_exam_date_update($id) ) // call the method from the controller
	    {
	        $this->load->model('online_admission_model');
			$data['exam_date_data_view'] = $this->online_admission_model->get_admission_exam_date();
			$this->load->view('admin/admission_exam_date_view', $id);
	    }
	    else
	    {
        	$data['success'] = 'Update Successful.';
        	redirect("online_admission_controller/admission_exam_date", $id);
	    }
	}
	# Admission_exam_date End

	# New_application Start
	public function new_application($page = 'new_application')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	                redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	       	$data['applicant_data'] = $this->Online_admission_model->get_applicant_data();

	       	$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, $data);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}
	# New_application End

	# Applicant Information Start
	public function applicant_information($id, $page = 'applicant_information')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $applicant_data = $this->Online_admission_model->applicant_data_view($id);
	        $data['title'] = ucfirst(humanize($page));

	       	$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact("applicant_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function approved_application($page = 'approved_application')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	        	redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	       	$approved_application = $this->Online_admission_model->get_approved_application();

	       	$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact("approved_application"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}
	# Accept_application End

	# ISMAIL END

	public function applicant_decision()
    {
        $this->Online_admission_model->applicant_decision();
        redirect("new_application");
    }

    public function confirm_applicants(){
    	$post = $this->input->post('checkbox_id');
    	$count = count($post);
    	if ($count!=0) {
    		$this->Online_admission_model->notified($post);
    		redirect("final_application");
    	} else {
    		$this->session->set_flashdata('error_mes', 'You must have to select minimum one.');
    		redirect($_SERVER['HTTP_REFERER']);
    	}
    }

    public function final_application($page = 'final_application')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	       	$final_application = $this->Online_admission_model->get_final_application();

	       	$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact("final_application"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}
	
}