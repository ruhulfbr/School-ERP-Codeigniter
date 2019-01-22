<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_attendance_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Machine_model'));
		$this->load->helper(array('download'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}
	
	public function index()
	{
		
	}

	public function entry_logs($page = 'entry_logs')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);

        $entry_logs = $this->Machine_model->entry_logs();

        $this->load->view('includs/header_link', $title);
        $this->load->view('includs/navigation', $title);
        $this->load->view('includs/header', $title);
        $this->load->view('admin/entry_logs',compact("entry_logs"));
        $this->load->view('includs/footer', $title);
        $this->load->view('includs/footer_link', $title);
	}

	public function daily_logs($page = 'daily_logs')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);

        $this->load->view('includs/header_link', $title);
        $this->load->view('includs/navigation', $title);
        $this->load->view('includs/header', $title);
        $this->load->view('admin/daily_logs');
        $this->load->view('includs/footer', $title);
        $this->load->view('includs/footer_link', $title);
	}

	public function daily_logs_search($page = 'daily_logs')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);

        $post = $this->input->post();
		$daily_logs = $this->Machine_model->daily_logs_search($post);

        $this->load->view('includs/header_link', $title);
        $this->load->view('includs/navigation', $title);
        $this->load->view('includs/header', $title);
        $this->load->view('admin/daily_logs',compact("daily_logs"));
        $this->load->view('includs/footer', $title);
        $this->load->view('includs/footer_link', $title);
	}

	public function attendence($page = 'attendence')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);
        $class_data = $this->Class_model->getClass();

        $this->load->view('includs/header_link', $title);
        $this->load->view('includs/navigation', $title);
        $this->load->view('includs/header', $title);
        $this->load->view('admin/'.$page, compact('class_data'));
        $this->load->view('includs/footer', $title);
        $this->load->view('includs/footer_link', $title);
	}

	public function attendence_search($page = 'attendence')
	{
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('month', 'Month', 'required|callback_month_select');
		$this->form_validation->set_rules('year', 'Month', 'required|callback_year_select');
		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('class_data'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);

    	}else{

			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);

	        $post = $this->input->post();

	        $student_model_view = $this->Student_model;
	        $machine_model_view = $this->Machine_model;

  		    
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('student_model_view','machine_model_view','class_data','post'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);
	  //       $this->load->library('Pdf');
			// $this->load->view('admin/attendence_search', compact('student_model_view','machine_model_view','class_data','post'));
    	}
    }

	public function class_select(){
		if ($this->input->post('class') === 'none')  {

			$this->form_validation->set_message('class_select', 'You have to select a class.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function section_select(){
		if ($this->input->post('section') === 'none')  {

			$this->form_validation->set_message('section_select', 'You have to select a section.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function month_select(){
		if ($this->input->post('month') === 'none')  {

			$this->form_validation->set_message('month_select', 'You have to select a month.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function year_select(){
		if ($this->input->post('year') === 'none')  {

			$this->form_validation->set_message('year_select', 'You have to select a year.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function attendence_find($page = 'single_attendence'){
		$s_id = $this->input->get('s_id');
		$from_date = $this->input->get('from_date').' '."00:00:00";
		$to_date = $this->input->get('to_date').' '."23:59:00";

		$attendence_data = $this->Machine_model->attendence_find($s_id,$from_date,$to_date);
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('attendence_data'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);
	}

	public function today_attendence($page = 'today_attendence'){
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
        	$class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('class_data'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);
	}

	public function today_attendence_search($page = 'today_attendence'){

		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('class_data'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);

    	}else{

			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
        	$class_data = $this->Class_model->getClass();
        	$post = $this->input->post();
        	$Student_model_view = $this->Student_model;
        	$Machine_model_view = $this->Machine_model;

	        $this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page, compact('class_data','post','Student_model_view','Machine_model_view'));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);
    	}
    }
}
